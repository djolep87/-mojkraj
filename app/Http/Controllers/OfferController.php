<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Notifications\NewOfferNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OfferController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        // Check if user is logged in (either regular user or business user)
        if (!Auth::check() && !Auth::guard('business')->check()) {
            return redirect()->route('login')->with('error', 'Morate biti ulogovani da biste videli ponude.');
        }
        
        // Get user location - support both regular users and business users
        $user = Auth::user();
        $businessUser = Auth::guard('business')->user();
        
        $neighborhood = null;
        $city = null;
        
        if ($user) {
            // Regular user
            $neighborhood = $user->neighborhood;
            $city = $user->city;
        } elseif ($businessUser) {
            // Business user
            $neighborhood = $businessUser->neighborhood;
            $city = $businessUser->city;
        }
        
        // Start with base query - show offers from same neighborhood and city
        $query = Offer::with('businessUser')
            ->whereHas('businessUser', function($q) use ($neighborhood, $city) {
                $q->whereRaw('neighborhood COLLATE utf8mb4_unicode_ci = ?', [$neighborhood])
                  ->whereRaw('city COLLATE utf8mb4_unicode_ci = ?', [$city]);
            })
            ->active()
            ->valid();
        
        // Filter by specific business user if requested
        if ($request->filled('business_user')) {
            $query->where('business_user_id', $request->business_user);
        }
        
        // Apply search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('businessUser', function($subQuery) use ($search) {
                      $subQuery->where('company_name', 'like', "%{$search}%");
                  });
            });
        }
        
        // Apply type filter
        if ($request->filled('type')) {
            $query->where('offer_type', $request->type);
        }
        
        // Apply price range filter
        if ($request->filled('price_min')) {
            $query->where('original_price', '>=', $request->price_min);
        }
        if ($request->filled('price_max')) {
            $query->where('original_price', '<=', $request->price_max);
        }
        
        // Apply featured filter
        if ($request->filled('featured')) {
            $query->where('is_featured', true);
        }
        
        // Apply sorting
        $sortBy = $request->get('sort', 'featured');
        switch ($sortBy) {
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'price_low':
                $query->orderBy('original_price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('original_price', 'desc');
                break;
            case 'views':
                $query->orderBy('views', 'desc');
                break;
            case 'featured':
            default:
                $query->orderBy('is_featured', 'desc')->orderBy('created_at', 'desc');
                break;
        }
        
        $offers = $query->paginate(24)->withQueryString();

        if ($user) {
            $this->trackActivity('view_page', 'oglasi');
        }

        // Get liked offers for current user
        $likedOfferIds = collect();
        if ($user) {
            $likedOfferIds = \App\Models\OfferLike::where('user_id', $user->id)
                ->whereIn('offer_id', $offers->pluck('id'))
                ->pluck('offer_id');
        } elseif ($businessUser) {
            $likedOfferIds = \App\Models\OfferLike::where('business_user_id', $businessUser->id)
                ->whereIn('offer_id', $offers->pluck('id'))
                ->pluck('offer_id');
        }
        
        // Get filter options
        $types = Offer::distinct()->pluck('offer_type')->filter();
        $priceRange = Offer::selectRaw('MIN(original_price) as min_price, MAX(original_price) as max_price')->first();
        
        // Get business user info if filtering by specific business
        $businessUser = null;
        if ($request->filled('business_user')) {
            $businessUser = \App\Models\BusinessUser::find($request->business_user);
        }

        // Pass the current user info to view
        $currentUser = $user ?: $businessUser;

        return view('offers.index', compact('offers', 'currentUser', 'types', 'priceRange', 'businessUser', 'likedOfferIds'));
    }

    public function show(Offer $offer)
    {
        // Check if user is logged in (either regular user or business user)
        if (!Auth::check() && !Auth::guard('business')->check()) {
            return redirect()->route('login')->with('error', 'Morate biti ulogovani da biste videli ponude.');
        }
        
        // Get user location - support both regular users and business users
        $user = Auth::user();
        $businessUser = Auth::guard('business')->user();
        $offerBusinessUser = $offer->businessUser;
        
        $neighborhood = null;
        $city = null;
        
        if ($user) {
            // Regular user
            $neighborhood = $user->neighborhood;
            $city = $user->city;
        } elseif ($businessUser) {
            // Business user
            $neighborhood = $businessUser->neighborhood;
            $city = $businessUser->city;
        }
        
        // Check if offer is from same neighborhood and city
        if (strcasecmp($neighborhood, $offerBusinessUser->neighborhood) !== 0 || strcasecmp($city, $offerBusinessUser->city) !== 0) {
            abort(403, 'Nemate dozvolu da vidite ovu ponudu. Ponuda je iz drugog dela grada.');
        }
        
        $offer->incrementViews();
        
        if ($user) {
            $this->trackActivity('open_post', 'oglas_' . $offer->id);
            
            // Mark notification as read if user came from notification
            $user->notifications()
                ->whereNull('read_at')
                ->where('data->offer_id', $offer->id)
                ->update(['read_at' => now()]);
        }
        
        // Check if current user has liked this offer
        $isLiked = false;
        if ($user) {
            $isLiked = $offer->likes()->where('user_id', $user->id)->exists();
        } elseif ($businessUser) {
            $isLiked = $offer->likes()->where('business_user_id', $businessUser->id)->exists();
        }
        
        return view('offers.show', compact('offer', 'isLiked'));
    }

    public function create()
    {
        return view('offers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
            'offer_type' => ['required', 'string', 'in:dnevna_ponuda,specijalna_ponuda,akcija,popust,ostalo'],
            'original_price' => ['nullable', 'numeric', 'min:0'],
            'discount_price' => ['nullable', 'numeric', 'min:0'],
            'discount_percentage' => ['nullable', 'string', 'max:10'],
            'valid_from' => ['nullable', 'date'],
            'valid_until' => ['nullable', 'date', 'after_or_equal:valid_from'],
            'valid_time_from' => ['nullable', 'date_format:H:i'],
            'valid_time_until' => ['nullable', 'date_format:H:i', 'after:valid_time_from'],
            'category' => ['required', 'string', 'in:hrana,usluge,proizvodi,opšte,ostalo'],
            'images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $businessUser = Auth::guard('business')->user();
        
        // Debug: Check if user is authenticated
        if (!$businessUser) {
            return redirect()->back()->with('error', 'Morate biti prijavljeni kao biznis korisnik da biste kreirali ponudu.');
        }
        
        $images = [];
        if ($request->hasFile('images')) {
            // Ensure images directory exists
            Storage::disk('public')->makeDirectory('offers/images');
            foreach ($request->file('images') as $image) {
                $path = $image->store('offers/images', 'public');
                $images[] = $path;
            }
        }

        $offer = Offer::create([
            'business_user_id' => $businessUser->id,
            'title' => $request->title,
            'description' => $request->description,
            'offer_type' => $request->offer_type,
            'original_price' => $request->original_price,
            'discount_price' => $request->discount_price,
            'discount_percentage' => $request->discount_percentage,
            'valid_from' => $request->valid_from,
            'valid_until' => $request->valid_until,
            'valid_time_from' => $request->valid_time_from,
            'valid_time_until' => $request->valid_time_until,
            'category' => $request->category,
            'images' => $images,
        ]);

        $offer->load('businessUser');
        
        $users = \App\Models\User::whereRaw('neighborhood COLLATE utf8mb4_unicode_ci = ?', [$businessUser->neighborhood])
            ->whereRaw('city COLLATE utf8mb4_unicode_ci = ?', [$businessUser->city])
            ->get();
        
        foreach ($users as $user) {
            $user->notify(new NewOfferNotification($offer));
        }

        return redirect()->route('business.dashboard')->with('success', 'Ponuda je uspešno kreirana!');
    }

    public function edit(Offer $offer)
    {
        $this->authorize('update', $offer);
        
        return view('offers.edit', compact('offer'));
    }

    public function update(Request $request, Offer $offer)
    {
        $this->authorize('update', $offer);

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
            'offer_type' => ['required', 'string', 'in:dnevna_ponuda,specijalna_ponuda,akcija,popust,ostalo'],
            'original_price' => ['nullable', 'numeric', 'min:0'],
            'discount_price' => ['nullable', 'numeric', 'min:0'],
            'discount_percentage' => ['nullable', 'string', 'max:10'],
            'valid_from' => ['nullable', 'date'],
            'valid_until' => ['nullable', 'date', 'after_or_equal:valid_from'],
            'valid_time_from' => ['nullable', 'date_format:H:i'],
            'valid_time_until' => ['nullable', 'date_format:H:i', 'after:valid_time_from'],
            'category' => ['required', 'string', 'in:hrana,usluge,proizvodi,opšte,ostalo'],
            'images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'is_active' => ['boolean'],
        ]);

        $images = $offer->images ?? [];
        if ($request->hasFile('images')) {
            // Delete old images
            foreach ($images as $image) {
                Storage::disk('public')->delete($image);
            }
            
            // Ensure images directory exists
            Storage::disk('public')->makeDirectory('offers/images');
            
            // Upload new images
            $images = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('offers/images', 'public');
                $images[] = $path;
            }
        }

        $offer->update([
            'title' => $request->title,
            'description' => $request->description,
            'offer_type' => $request->offer_type,
            'original_price' => $request->original_price,
            'discount_price' => $request->discount_price,
            'discount_percentage' => $request->discount_percentage,
            'valid_from' => $request->valid_from,
            'valid_until' => $request->valid_until,
            'valid_time_from' => $request->valid_time_from,
            'valid_time_until' => $request->valid_time_until,
            'category' => $request->category,
            'images' => $images,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('business.dashboard')->with('success', 'Ponuda je uspešno ažurirana!');
    }

    public function destroy(Offer $offer)
    {
        $this->authorize('delete', $offer);
        
        // Delete associated files
        if ($offer->images) {
            foreach ($offer->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        
        $offer->delete();

        return redirect()->route('business.dashboard')->with('success', 'Ponuda je uspešno obrisana!');
    }

    public function like(Offer $offer)
    {
        $user = Auth::user();
        $businessUser = Auth::guard('business')->user();
        
        if (!$user && !$businessUser) {
            return response()->json(['error' => 'Morate biti ulogovani da biste lajkovali ponude.'], 401);
        }
        
        // Check if user has already liked this offer
        $existingLike = $offer->likes()
            ->where(function($query) use ($user, $businessUser) {
                if ($user) {
                    $query->where('user_id', $user->id);
                }
                if ($businessUser) {
                    $query->orWhere('business_user_id', $businessUser->id);
                }
            })
            ->first();
        
        if ($existingLike) {
            // Unlike - remove the like
            $existingLike->delete();
            $offer->decrement('likes');
            $liked = false;
        } else {
            // Like - add the like
            $offer->likes()->create([
                'user_id' => $user ? $user->id : null,
                'business_user_id' => $businessUser ? $businessUser->id : null,
            ]);
            $offer->increment('likes');
            $liked = true;
        }
        
        return response()->json([
            'likes' => $offer->fresh()->likes,
            'liked' => $liked
        ]);
    }
}
