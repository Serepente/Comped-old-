<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FinanceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// Public Routes (No Authentication Required)
Route::get('/', function () { return view('index'); });
Route::get('/homepage', function () { return view('homepage'); })->name('homepage');

// Authentication Routes
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [UserController::class, 'register'])->name('register.submit');

Route::get('/create/{id}', [UserController::class, 'showCreateForm'])->name('create.form');
Route::post('/create/{id}', [UserController::class, 'updateUser'])->name('create.submit');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [UserController::class, 'login'])->name('login.submit');

// Google Authentication
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

// Logout Route
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login')->with('success', 'Logged out successfully!');
})->name('logout');

// Routes That Require Authentication
Route::middleware(['auth'])->group(function () {

    // User Profile & Social Media
    Route::get('/socmed/{id}', [UserController::class, 'showSocmedForm'])->name('socmed.form');

    // Inbox and Messaging
    Route::get('/inbox', [ChatController::class, 'showInbox'])->name('inbox');
    Route::get('/chat/{id}', [ChatController::class, 'fetchChat'])->name('chat.fetch');
    Route::post('/send-message', [ChatController::class, 'sendMessage'])->name('chat.send');

    // Event Management Routes
    Route::prefix('event-management')->group(function () {
        Route::get('/home', [EventController::class, 'home'])->name('event-management.home');
        Route::get('/calendar', [EventController::class, 'calendar'])->name('event-management.calendar');
        Route::get('/attendance', [EventController::class, 'attendance'])->name('event-management.attendance');

        // Borrow Management
        Route::get('/borrow', [BorrowController::class, 'index'])->name('event-management.borrow');
        Route::post('/borrow', [BorrowController::class, 'store'])->name('borrow.store');
        Route::patch('/borrow/{id}', [BorrowController::class, 'updateStatus'])->name('borrow.update');

        // Payments / Finance
        Route::get('/finance', [FinanceController::class, 'finance'])->name('event-management.finance');
    });
});
