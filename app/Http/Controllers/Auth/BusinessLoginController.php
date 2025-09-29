<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.business-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('business')->attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('business.dashboard'))->with('success', 'Uspešno ste se prijavili!');
        }

        return back()->withErrors([
            'email' => 'Podaci za prijavu nisu ispravni.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('business')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Uspešno ste se odjavili!');
    }
}