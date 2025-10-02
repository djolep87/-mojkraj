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
        $news = $user->news()->orderBy('created_at', 'desc')->paginate(5);
        
        // Show only user's own pets posts
        $pets = PetPost::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        
        return view('dashboard', compact('news', 'pets'));
    }
}