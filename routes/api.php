<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\AnnouncementController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:web')->get('/user', function (Request $request) {
    return $request->user();
});

// Stambene zajednice API rute
Route::middleware('auth:web')->prefix('buildings')->group(function () {
    // Building routes
    Route::get('/', [BuildingController::class, 'index']);
    Route::get('/{building}', [BuildingController::class, 'show']);
    Route::post('/', [BuildingController::class, 'store']);
    Route::put('/{building}', [BuildingController::class, 'update']);
    Route::delete('/{building}', [BuildingController::class, 'destroy']);
    
    // Building user management
    Route::post('/{building}/users', [BuildingController::class, 'addUser']);
    Route::delete('/{building}/users', [BuildingController::class, 'removeUser']);
    
    // Report routes
    Route::get('/{building}/reports', [ReportController::class, 'index']);
    Route::post('/{building}/reports', [ReportController::class, 'store']);
    Route::get('/{building}/reports/{report}', [ReportController::class, 'show']);
    Route::put('/{building}/reports/{report}', [ReportController::class, 'update']);
    Route::delete('/{building}/reports/{report}', [ReportController::class, 'destroy']);
    Route::patch('/{building}/reports/{report}/close', [ReportController::class, 'close']);
    
    // Expense routes
    Route::get('/{building}/expenses', [ExpenseController::class, 'index']);
    Route::post('/{building}/expenses', [ExpenseController::class, 'store']);
    Route::get('/{building}/expenses/{expense}', [ExpenseController::class, 'show']);
    Route::put('/{building}/expenses/{expense}', [ExpenseController::class, 'update']);
    Route::delete('/{building}/expenses/{expense}', [ExpenseController::class, 'destroy']);
    Route::get('/{building}/expenses-stats', [ExpenseController::class, 'stats']);
    
    // Vote routes
    Route::get('/{building}/votes', [VoteController::class, 'index']);
    Route::post('/{building}/votes', [VoteController::class, 'store']);
    Route::get('/{building}/votes/{vote}', [VoteController::class, 'show']);
    Route::put('/{building}/votes/{vote}', [VoteController::class, 'update']);
    Route::delete('/{building}/votes/{vote}', [VoteController::class, 'destroy']);
    Route::post('/{building}/votes/{vote}/vote', [VoteController::class, 'vote']);
    Route::get('/{building}/votes/{vote}/results', [VoteController::class, 'results']);
    
    // Announcement routes
    Route::get('/{building}/announcements', [AnnouncementController::class, 'index']);
    Route::post('/{building}/announcements', [AnnouncementController::class, 'store']);
    Route::get('/{building}/announcements/{announcement}', [AnnouncementController::class, 'show']);
    Route::put('/{building}/announcements/{announcement}', [AnnouncementController::class, 'update']);
    Route::delete('/{building}/announcements/{announcement}', [AnnouncementController::class, 'destroy']);
    Route::patch('/{building}/announcements/{announcement}/pin', [AnnouncementController::class, 'pin']);
    Route::patch('/{building}/announcements/{announcement}/unpin', [AnnouncementController::class, 'unpin']);
});
