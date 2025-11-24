<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PetPost;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Eager load relations for better performance
        $news = $user->news()
            ->with('user:id,name')
            ->orderBy('created_at', 'desc')
            ->paginate(24);
        
        // Show only user's own pets posts with eager loading
        $pets = PetPost::where('user_id', $user->id)
            ->with('user:id,name')
            ->orderBy('created_at', 'desc')
            ->paginate(24);
        
        return view('dashboard', compact('news', 'pets'));
    }
}