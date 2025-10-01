<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\BusinessUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    public function index()
    {
        // Check if user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Morate biti ulogovani da biste videli biznise.');
        }
        
        $user = Auth::user();
        
        // Filter businesses by user's location (neighborhood and city)
        $businesses = Business::with('businessUser')
            ->whereHas('businessUser', function($query) use ($user) {
                $query->where('neighborhood', $user->neighborhood)
                      ->where('city', $user->city);
            })
            ->active()
            ->valid()
            ->orderBy('is_featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('businesses.index', compact('businesses', 'user'));
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
        $businesses = $businessUser->businesses()->orderBy('created_at', 'desc')->paginate(5);
        $offers = $businessUser->offers()->orderBy('created_at', 'desc')->paginate(5);
        
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
}