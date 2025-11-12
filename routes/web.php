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
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AnnouncementCommentController;
use App\Http\Controllers\BusinessRatingController;

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

// Buildings info page
Route::get('/stambene-zajednice-info', function () {
    return view('buildings-info');
})->name('buildings.info');

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
    
    // Business ratings routes
    Route::get('/biznisi/{businessUser}/recenzije', [BusinessRatingController::class, 'index'])->name('businesses.ratings.index');
    Route::post('/biznisi/{businessUser}/recenzije', [BusinessRatingController::class, 'store'])->name('businesses.ratings.store');
    Route::post('/biznisi/recenzije/{businessRating}/korisno', [BusinessRatingController::class, 'helpful'])->name('businesses.ratings.helpful');
    Route::post('/biznisi/recenzije/{businessRating}/odgovor', [BusinessRatingController::class, 'ownerReply'])->name('businesses.ratings.reply');
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

// Stambene zajednice rute
Route::middleware('auth')->group(function () {
    Route::get('/stambene-zajednice', [BuildingController::class, 'index'])->name('buildings.index');
    Route::get('/stambene-zajednice/{building}', [BuildingController::class, 'show'])->name('buildings.show');
    Route::post('/stambene-zajednice', [BuildingController::class, 'store'])->name('buildings.store');
    Route::put('/stambene-zajednice/{building}', [BuildingController::class, 'update'])->name('buildings.update');
    Route::delete('/stambene-zajednice/{building}', [BuildingController::class, 'destroy'])->name('buildings.destroy');
    
    // Reports routes
    Route::get('/stambene-zajednice/{building}/prijave', [ReportController::class, 'index'])->name('reports.index');
    Route::post('/stambene-zajednice/{building}/prijave', [ReportController::class, 'store'])->name('reports.store');
    Route::get('/stambene-zajednice/{building}/prijave/{report}', [ReportController::class, 'show'])->name('reports.show');
    Route::put('/stambene-zajednice/{building}/prijave/{report}', [ReportController::class, 'update'])->name('reports.update');
    Route::delete('/stambene-zajednice/{building}/prijave/{report}', [ReportController::class, 'destroy'])->name('reports.destroy');
    Route::patch('/stambene-zajednice/{building}/prijave/{report}/close', [ReportController::class, 'close'])->name('reports.close');
    
    // Expenses routes
    Route::get('/stambene-zajednice/{building}/troskovi', [ExpenseController::class, 'index'])->name('expenses.index');
    Route::post('/stambene-zajednice/{building}/troskovi', [ExpenseController::class, 'store'])->name('expenses.store');
    Route::get('/stambene-zajednice/{building}/troskovi/{expense}', [ExpenseController::class, 'show'])->name('expenses.show');
    Route::put('/stambene-zajednice/{building}/troskovi/{expense}', [ExpenseController::class, 'update'])->name('expenses.update');
    Route::delete('/stambene-zajednice/{building}/troskovi/{expense}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
    Route::get('/stambene-zajednice/{building}/troskovi-stats', [ExpenseController::class, 'stats'])->name('expenses.stats');
    
    // Votes routes
    Route::get('/stambene-zajednice/{building}/glasovanja', [VoteController::class, 'index'])->name('votes.index');
    Route::post('/stambene-zajednice/{building}/glasovanja', [VoteController::class, 'store'])->name('votes.store');
    Route::get('/stambene-zajednice/{building}/glasovanja/{vote}', [VoteController::class, 'show'])->name('votes.show');
    Route::put('/stambene-zajednice/{building}/glasovanja/{vote}', [VoteController::class, 'update'])->name('votes.update');
    Route::delete('/stambene-zajednice/{building}/glasovanja/{vote}', [VoteController::class, 'destroy'])->name('votes.destroy');
    Route::post('/stambene-zajednice/{building}/glasovanja/{vote}/vote', [VoteController::class, 'vote'])->name('votes.vote');
    Route::get('/stambene-zajednice/{building}/glasovanja/{vote}/rezultati', [VoteController::class, 'results'])->name('votes.results');
    
    // Announcements routes
    Route::get('/stambene-zajednice/{building}/objave', [AnnouncementController::class, 'index'])->name('announcements.index');
    Route::post('/stambene-zajednice/{building}/objave', [AnnouncementController::class, 'store'])->name('announcements.store');
    Route::get('/stambene-zajednice/{building}/objave/{announcement}', [AnnouncementController::class, 'show'])->name('announcements.show');
    Route::put('/stambene-zajednice/{building}/objave/{announcement}', [AnnouncementController::class, 'update'])->name('announcements.update');
    Route::delete('/stambene-zajednice/{building}/objave/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy');
    Route::patch('/stambene-zajednice/{building}/objave/{announcement}/pin', [AnnouncementController::class, 'pin'])->name('announcements.pin');
    Route::patch('/stambene-zajednice/{building}/objave/{announcement}/unpin', [AnnouncementController::class, 'unpin'])->name('announcements.unpin');
    
    // Join building routes
    Route::post('/stambene-zajednice/join', [BuildingController::class, 'join'])->name('buildings.join');
    Route::post('/stambene-zajednice/{building}/self-join', [BuildingController::class, 'selfJoin'])->name('buildings.selfJoin');
    Route::get('/stambene-zajednice/{building}/eligible-users', [BuildingController::class, 'getEligibleUsers'])->name('buildings.eligibleUsers');
    Route::post('/stambene-zajednice/{building}/add-resident', [BuildingController::class, 'addResident'])->name('buildings.addResident');
    
    // Join request routes
    Route::get('/stambene-zajednice/{building}/zahtevi', [BuildingController::class, 'getJoinRequests'])->name('buildings.joinRequests');
    Route::get('/stambene-zajednice/{building}/status-zahteva', [BuildingController::class, 'getJoinRequestStatus'])->name('buildings.joinRequestStatus');
    Route::post('/stambene-zajednice/{building}/zahtevi/{joinRequest}/odobri', [BuildingController::class, 'approveJoinRequest'])->name('buildings.approveJoinRequest');
    Route::post('/stambene-zajednice/{building}/zahtevi/{joinRequest}/odbij', [BuildingController::class, 'rejectJoinRequest'])->name('buildings.rejectJoinRequest');
    
    // Announcement comments routes
    Route::get('/stambene-zajednice/{building}/objave/{announcement}/komentari', [AnnouncementCommentController::class, 'index'])->name('announcements.comments.index');
    Route::post('/stambene-zajednice/{building}/objave/{announcement}/komentari', [AnnouncementCommentController::class, 'store'])->name('announcements.comments.store');
    Route::put('/stambene-zajednice/{building}/objave/{announcement}/komentari/{comment}', [AnnouncementCommentController::class, 'update'])->name('announcements.comments.update');
    Route::delete('/stambene-zajednice/{building}/objave/{announcement}/komentari/{comment}', [AnnouncementCommentController::class, 'destroy'])->name('announcements.comments.destroy');
});
