<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\BusinessUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BusinessController extends Controller
{
    use AuthorizesRequests;
    public function index(Request $request)
    {
        // Check if user is logged in (either regular user or business user)
        if (!Auth::check() && !Auth::guard('business')->check()) {
            return redirect()->route('login')->with('error', 'Morate biti ulogovani da biste videli biznise.');
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
        
        // Start with base query - show business users from same neighborhood and city
        $query = BusinessUser::where('neighborhood', $neighborhood)
            ->where('city', $city)
            ->where('is_active', true);
        
        // Apply search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('company_name', 'like', "%{$search}%")
                  ->orWhere('contact_person', 'like', "%{$search}%")
                  ->orWhere('business_type', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
        
        // Apply business type filter
        if ($request->filled('type')) {
            $query->where('business_type', $request->type);
        }
        
        // Apply sorting
        $sortBy = $request->get('sort', 'newest');
        switch ($sortBy) {
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'name_asc':
                $query->orderBy('company_name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('company_name', 'desc');
                break;
            case 'type':
                $query->orderBy('business_type', 'asc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }
        
        $businesses = $query->paginate(24)->withQueryString();
        
        // Get filter options
        $types = BusinessUser::distinct()->pluck('business_type')->filter();
        
        // Pass the current user info to view
        $currentUser = $user ?: $businessUser;
        
        return view('businesses.index', compact('businesses', 'currentUser', 'types'));
    }

    public function show(BusinessUser $businessUser)
    {
        // Check if user is logged in (either regular user or business user)
        if (!Auth::check() && !Auth::guard('business')->check()) {
            return redirect()->route('login')->with('error', 'Morate biti ulogovani da biste videli biznise.');
        }
        
        // Get user location - support both regular users and business users
        $user = Auth::user();
        $currentBusinessUser = Auth::guard('business')->user();
        
        $neighborhood = null;
        $city = null;
        
        if ($user) {
            // Regular user
            $neighborhood = $user->neighborhood;
            $city = $user->city;
        } elseif ($currentBusinessUser) {
            // Business user
            $neighborhood = $currentBusinessUser->neighborhood;
            $city = $currentBusinessUser->city;
        }
        
        // Check if business is from same neighborhood and city
        if (strcasecmp($neighborhood, $businessUser->neighborhood) !== 0 || strcasecmp($city, $businessUser->city) !== 0) {
            abort(403, 'Nemate dozvolu da vidite ovaj biznis. Biznis je iz drugog dela grada.');
        }
        
        // Increment views (if views field exists)
        if (isset($businessUser->views)) {
            $businessUser->increment('views');
        }
        
        return view('businesses.show', compact('businessUser'));
    }

    public function dashboard()
    {
        $businessUser = Auth::guard('business')->user();
        $businesses = Business::where('business_user_id', $businessUser->id)->orderBy('created_at', 'desc')->paginate(24);
        $offers = \App\Models\Offer::where('business_user_id', $businessUser->id)->orderBy('created_at', 'desc')->paginate(24);
        
        return view('business.dashboard', compact('businesses', 'offers', 'businessUser'));
    }

    public function create()
    {
        return view('businesses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
            'type' => ['required', 'string', 'in:reklama,dnevna_ponuda,promocija,ostalo'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'discount_percentage' => ['nullable', 'string', 'max:10'],
            'valid_from' => ['nullable', 'date'],
            'valid_until' => ['nullable', 'date', 'after_or_equal:valid_from'],
            'valid_time_from' => ['nullable', 'date_format:H:i'],
            'valid_time_until' => ['nullable', 'date_format:H:i', 'after:valid_time_from'],
        ]);

        $businessUser = Auth::guard('business')->user();

        $business = Business::create([
            'business_user_id' => $businessUser->id,
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'price' => $request->price,
            'discount_percentage' => $request->discount_percentage,
            'valid_from' => $request->valid_from,
            'valid_until' => $request->valid_until,
            'valid_time_from' => $request->valid_time_from,
            'valid_time_until' => $request->valid_time_until,
        ]);

        return redirect()->route('business.dashboard')->with('success', 'Biznis je uspešno kreiran!');
    }

    public function edit(Business $business)
    {
        $this->authorize('update', $business);
        
        return view('businesses.edit', compact('business'));
    }

    public function update(Request $request, Business $business)
    {
        $this->authorize('update', $business);

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
            'type' => ['required', 'string', 'in:reklama,dnevna_ponuda,promocija,ostalo'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'discount_percentage' => ['nullable', 'string', 'max:10'],
            'valid_from' => ['nullable', 'date'],
            'valid_until' => ['nullable', 'date', 'after_or_equal:valid_from'],
            'valid_time_from' => ['nullable', 'date_format:H:i'],
            'valid_time_until' => ['nullable', 'date_format:H:i', 'after:valid_time_from'],
            'is_active' => ['boolean'],
        ]);

        $business->update($request->all());

        return redirect()->route('business.dashboard')->with('success', 'Biznis je uspešno ažuriran!');
    }

    public function destroy(Business $business)
    {
        $this->authorize('delete', $business);
        
        $business->delete();

        return redirect()->route('business.dashboard')->with('success', 'Biznis je uspešno obrisan!');
    }

    public function listBusinesses(Request $request)
    {
        // Check if user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Morate biti ulogovani da biste videli biznise.');
        }
        
        $user = Auth::user();
        
        // Start with base query for business users
        $query = BusinessUser::whereRaw('neighborhood COLLATE utf8mb4_unicode_ci = ?', [$user->neighborhood])
            ->whereRaw('city COLLATE utf8mb4_unicode_ci = ?', [$user->city])
            ->where('is_active', true);
        
        // Apply search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('company_name', 'like', "%{$search}%")
                  ->orWhere('contact_person', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('business_type', 'like', "%{$search}%");
            });
        }
        
        // Apply business type filter
        if ($request->filled('business_type')) {
            $query->where('business_type', $request->business_type);
        }
        
        // Apply sorting
        $sortBy = $request->get('sort', 'newest');
        switch ($sortBy) {
            case 'name':
                $query->orderBy('company_name', 'asc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'newest':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }
        
        $businesses = $query->paginate(24)->withQueryString();
        
        // Get filter options
        $businessTypes = BusinessUser::distinct()->pluck('business_type')->filter();
        
        return view('businesses.list', compact('businesses', 'user', 'businessTypes'));
    }
}