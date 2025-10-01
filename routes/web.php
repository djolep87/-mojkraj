<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\BusinessLoginController;
use App\Http\Controllers\Auth\BusinessRegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OfferController;

// Home route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Auth routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Business Auth routes
Route::get('/business/login', [BusinessLoginController::class, 'showLoginForm'])->name('business.login');
Route::post('/business/login', [BusinessLoginController::class, 'login']);
Route::post('/business/logout', [BusinessLoginController::class, 'logout'])->name('business.logout');

Route::get('/business/register', [BusinessRegisterController::class, 'showRegistrationForm'])->name('business.register');
Route::post('/business/register', [BusinessRegisterController::class, 'register']);

// Public business routes
Route::get('/biznisi', [BusinessController::class, 'index'])->name('businesses.index');
Route::get('/biznisi/{business}', [BusinessController::class, 'show'])->name('businesses.show');

// Public news routes
Route::get('/vesti', [NewsController::class, 'index'])->name('news.index');

// Public offers routes
Route::get('/ponude', [OfferController::class, 'index'])->name('offers.index');

// News routes for regular users (protected)
Route::middleware('auth')->group(function () {
    Route::get('/vesti/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/vesti', [NewsController::class, 'store'])->name('news.store');
    Route::get('/vesti/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/vesti/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/vesti/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
    Route::post('/vesti/{news}/like', [NewsController::class, 'like'])->name('news.like');
});

// Public news show route (must be after create route)
Route::get('/vesti/{news}', [NewsController::class, 'show'])->name('news.show');

// Public offers show route
Route::get('/ponude/{offer}', [OfferController::class, 'show'])->name('offers.show');

// Dashboard (protected routes)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Business dashboard (protected routes)
Route::middleware('auth:business')->group(function () {
    Route::get('/business/dashboard', [BusinessController::class, 'dashboard'])->name('business.dashboard');
    Route::get('/business/biznisi/create', [BusinessController::class, 'create'])->name('businesses.create');
    Route::post('/business/biznisi', [BusinessController::class, 'store'])->name('businesses.store');
    Route::get('/business/biznisi/{business}/edit', [BusinessController::class, 'edit'])->name('businesses.edit');
    Route::put('/business/biznisi/{business}', [BusinessController::class, 'update'])->name('businesses.update');
    Route::delete('/business/biznisi/{business}', [BusinessController::class, 'destroy'])->name('businesses.destroy');
    
    // Offers routes for business users
    Route::get('/business/ponude/create', [OfferController::class, 'create'])->name('offers.create');
    Route::post('/business/ponude', [OfferController::class, 'store'])->name('offers.store');
    Route::get('/business/ponude/{offer}/edit', [OfferController::class, 'edit'])->name('offers.edit');
    Route::put('/business/ponude/{offer}', [OfferController::class, 'update'])->name('offers.update');
    Route::delete('/business/ponude/{offer}', [OfferController::class, 'destroy'])->name('offers.destroy');
    Route::post('/ponude/{offer}/like', [OfferController::class, 'like'])->name('offers.like');
});
