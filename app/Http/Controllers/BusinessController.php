<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\BusinessUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    public function index(Request $request)
    {
        // Check if user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Morate biti ulogovani da biste videli biznise.');
        }
        
        $user = Auth::user();
        
        // Start with base query
        $query = Business::with('businessUser')
            ->whereHas('businessUser', function($q) use ($user) {
                $q->where('neighborhood', $user->neighborhood)
                  ->where('city', $user->city);
            })
            ->active()
            ->valid();
        
        // Apply search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('businessUser', function($subQuery) use ($search) {
                      $subQuery->where('company_name', 'like', "%{$search}%")
                               ->orWhere('contact_person', 'like', "%{$search}%");
                  });
            });
        }
        
        // Apply type filter
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
        
        // Apply price range filter
        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }
        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->price_max);
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
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'views':
                $query->orderBy('views', 'desc');
                break;
            case 'featured':
            default:
                $query->orderBy('is_featured', 'desc')->orderBy('created_at', 'desc');
                break;
        }
        
        $businesses = $query->paginate(24)->withQueryString();
        
        // Get filter options
        $types = Business::distinct()->pluck('type')->filter();
        $priceRange = Business::selectRaw('MIN(price) as min_price, MAX(price) as max_price')->first();
        
        return view('businesses.index', compact('businesses', 'user', 'types', 'priceRange'));
    }

    public function show(Business $business)
    {
        // Check if user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Morate biti ulogovani da biste videli biznise.');
        }
        
        $user = Auth::user();
        $businessUser = $business->businessUser;
        
        // Check if business is from same neighborhood and city
        if ($user->neighborhood !== $businessUser->neighborhood || $user->city !== $businessUser->city) {
            abort(403, 'Nemate dozvolu da vidite ovaj biznis. Biznis je iz drugog dela grada.');
        }
        
        $business->increment('views');
        
        return view('businesses.show', compact('business'));
    }

    public function dashboard()
    {
        $businessUser = Auth::guard('business')->user();
        $businesses = $businessUser->businesses()->orderBy('created_at', 'desc')->paginate(24);
        $offers = $businessUser->offers()->orderBy('created_at', 'desc')->paginate(24);
        
        return view('business.dashboard', compact('businesses', 'offers'));
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

        $business = $businessUser->businesses()->create([
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
        $query = BusinessUser::where('neighborhood', $user->neighborhood)
            ->where('city', $user->city)
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