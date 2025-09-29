<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\BusinessLoginController;
use App\Http\Controllers\Auth\BusinessRegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BusinessController;

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
});
