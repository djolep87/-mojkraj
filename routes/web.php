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
    // Get latest 6 news posts for preview
    $query = \App\Models\News::with(['user'])
        ->published()
        ->latest();
    
    // If user is logged in, filter by their location
    if (auth()->check()) {
        $user = auth()->user();
        $query->where(function($q) use ($user) {
            // Show user's own news
            $q->where('user_id', $user->id)
              // OR show news from same neighborhood and city
              ->orWhereHas('user', function($subQ) use ($user) {
                  $subQ->whereRaw('neighborhood COLLATE utf8mb4_unicode_ci = ?', [$user->neighborhood])
                       ->whereRaw('city COLLATE utf8mb4_unicode_ci = ?', [$user->city]);
              });
        });
    }
    
    $latestNews = $query->limit(6)->get();
    
    return view('welcome', compact('latestNews'));
})->name('home');

// Business info page
Route::get('/biznis-info', function () {
    return view('business-info');
})->name('business.info');

// News info page
Route::get('/vesti-info', function () {
    // Get latest news only if user is logged in
    $latestNews = collect();
    
    if (auth()->check()) {
        $user = auth()->user();
        $latestNews = \App\Models\News::with('user')
            ->where('city', $user->city)
            ->where('neighborhood', $user->neighborhood)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
    }
    
    return view('news-info', compact('latestNews'));
})->name('news.info');

// Offers info page
Route::get('/ponude-info', function () {
    return view('offers-info');
})->name('offers.info');

// Pets info page

// About page
Route::get('/o-nama', function () {
    return view('about');
})->name('about');

// Pets info page (public)
Route::get('/kucni-ljubimci', function () {
    $latestPets = collect(); // Default empty collection
    
    // Only show latest pets if user is logged in and from same area
    if (auth()->check()) {
        $user = auth()->user();
        $latestPets = \App\Models\PetPost::with(['user'])
            ->active()
            ->whereHas('user', function($q) use ($user) {
                $q->whereRaw('neighborhood COLLATE utf8mb4_unicode_ci = ?', [$user->neighborhood])
                  ->whereRaw('city COLLATE utf8mb4_unicode_ci = ?', [$user->city]);
            })
            ->latest()
            ->limit(6)
            ->get();
    }
    
    return view('pets-info', compact('latestPets'));
})->name('pets.info');

// Pets posts page (all posts from same area)
Route::middleware(['auth:web'])->group(function () {
    Route::get('/kucni-ljubimci/postovi', [App\Http\Controllers\PetPostController::class, 'index'])->name('pets.index');
});

// Pets posts routes (dashboard)
Route::middleware(['auth:web'])->group(function () {
    Route::get('/dashboard/kucni-ljubimci', [App\Http\Controllers\PetPostController::class, 'index'])->name('pets.dashboard');
    Route::get('/dashboard/kucni-ljubimci/kreiraj', [App\Http\Controllers\PetPostController::class, 'create'])->name('pets.create');
    Route::post('/dashboard/kucni-ljubimci', [App\Http\Controllers\PetPostController::class, 'store'])->name('pets.store');
    Route::get('/dashboard/kucni-ljubimci/{pet:id}', [App\Http\Controllers\PetPostController::class, 'show'])->name('pets.show');
    Route::get('/dashboard/kucni-ljubimci/{pet:id}/izmeni', [App\Http\Controllers\PetPostController::class, 'edit'])->name('pets.edit');
    Route::put('/dashboard/kucni-ljubimci/{pet:id}', [App\Http\Controllers\PetPostController::class, 'update'])->name('pets.update');
    Route::delete('/dashboard/kucni-ljubimci/{pet:id}', [App\Http\Controllers\PetPostController::class, 'destroy'])->name('pets.destroy');
    
    // AJAX routes
    Route::post('/dashboard/kucni-ljubimci/{pet:id}/like', [App\Http\Controllers\PetPostController::class, 'like'])->name('pets.like');
    Route::post('/dashboard/kucni-ljubimci/{pet:id}/komentar', [App\Http\Controllers\PetPostController::class, 'comment'])->name('pets.comment');
    Route::delete('/dashboard/kucni-ljubimci/{pet:id}/slika/{imageIndex}', [App\Http\Controllers\PetPostController::class, 'deleteImage'])->name('pets.delete-image');
    Route::delete('/dashboard/kucni-ljubimci/{pet:id}/video/{videoIndex}', [App\Http\Controllers\PetPostController::class, 'deleteVideo'])->name('pets.delete-video');
});

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

// Business routes (accessible by both regular users and business users)
Route::middleware('check.user.auth')->group(function () {
    Route::get('/biznisi', [BusinessController::class, 'index'])->name('businesses.index');
    Route::get('/biznisi/{businessUser}', [BusinessController::class, 'show'])->name('businesses.show');
    Route::get('/biznisi-lista', [BusinessController::class, 'listBusinesses'])->name('businesses.list');
});

// News routes (all protected)
Route::middleware('auth:web')->group(function () {
    Route::get('/vesti', [NewsController::class, 'index'])->name('news.index');
    Route::get('/vesti/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/vesti', [NewsController::class, 'store'])->name('news.store');
    Route::get('/vesti/{news}', [NewsController::class, 'show'])->name('news.show');
    Route::get('/vesti/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/vesti/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/vesti/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
    Route::post('/vesti/{news}/like', [NewsController::class, 'like'])->name('news.like');
    Route::post('/vesti/{news}/komentar', [NewsController::class, 'comment'])->name('news.comment');
});

// Offers routes (accessible by both regular users and business users)
Route::middleware('check.user.auth')->group(function () {
    Route::get('/ponude', [OfferController::class, 'index'])->name('offers.index');
    Route::get('/ponude/{offer}', [OfferController::class, 'show'])->name('offers.show');
    Route::post('/ponude/{offer}/like', [OfferController::class, 'like'])->name('offers.like');
});



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
    
    // Offers routes for business users (CRUD operations)
    Route::get('/business/ponude/create', [OfferController::class, 'create'])->name('offers.create');
    Route::post('/business/ponude', [OfferController::class, 'store'])->name('offers.store');
    Route::get('/business/ponude/{offer}/edit', [OfferController::class, 'edit'])->name('offers.edit');
    Route::put('/business/ponude/{offer}', [OfferController::class, 'update'])->name('offers.update');
    Route::delete('/business/ponude/{offer}', [OfferController::class, 'destroy'])->name('offers.destroy');
});
