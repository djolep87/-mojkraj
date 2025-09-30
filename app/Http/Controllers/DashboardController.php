<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $news = $user->news()->orderBy('created_at', 'desc')->paginate(5);
        
        return view('dashboard', compact('news'));
    }
}