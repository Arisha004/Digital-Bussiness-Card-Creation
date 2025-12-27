<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;

use App\Http\Controllers\BusinessCardController;

use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('landing');
})->name('landing');


Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
// web.php
Route::get('/cards/create', [BusinessCardController::class, 'create'])
     ->name('cards.create')
     ->middleware('auth');

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');

Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/templates', function () {
    return view('templates.index');
});
Route::get('/about', function () {
    return view('about');
});
// web.php
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('cards', [AdminController::class, 'index'])->name('admin.cards');
    Route::get('cards/view/{id}', [AdminController::class, 'viewCard'])->name('admin.cards.view');
    Route::get('cards/delete/{id}', [AdminController::class, 'deleteCard'])->name('admin.cards.delete');
});
Route::get('/admin/users/{id}/cards', [AdminController::class, 'viewUserCards'])
     ->name('admin.users.cards');
Route::get('/admin/users/{id}/cards', [AdminController::class, 'viewUserCards'])->name('admin.users.cards');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/admin/dashboard', function () {
        // Only allow if admin session exists
        if (!session('is_admin') && auth()->user()->role != 'admin') {
            abort(403); // Forbidden
        }
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'viewUsers']);
Route::get('/admin/users/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteUser']);

Route::middleware(['auth'])->group(function () {
    Route::get('/cards', [BusinessCardController::class, 'index'])->name('cards.index');
    Route::get('/cards/create', [BusinessCardController::class, 'create'])->name('cards.create');
    Route::post('/cards', [BusinessCardController::class, 'store'])->name('cards.store');
    Route::get('/cards/{card}/edit', [BusinessCardController::class, 'edit'])->name('cards.edit');
    Route::put('/cards/{card}', [BusinessCardController::class, 'update'])->name('cards.update');
    Route::delete('/cards/{card}', [BusinessCardController::class, 'destroy'])->name('cards.destroy');
    Route::get('/cards/{card}', [BusinessCardController::class, 'show'])->name('cards.show');
});


Route::get('/admin/cards', [App\Http\Controllers\AdminController::class, 'allCards'])->name('admin.cards');
Route::get('/admin/cards/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteCard']);
Route::post('/admin/cards/update/{id}', [App\Http\Controllers\AdminController::class, 'updateCard']);


Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])
    ->name('admin.dashboard')
    ->middleware('auth');


    
Route::middleware(['auth'])->group(function () {
    // List all user cards
    Route::get('/cards', [BusinessCardController::class, 'index'])->name('cards.index');

    // Create new card from template
    Route::get('/cards/create', [BusinessCardController::class, 'create'])->name('cards.create');

    // Create using specific template
    Route::get('/cards/create/{template}', [BusinessCardController::class, 'createFromTemplate'])->name('cards.create.template');

    // Store card
    Route::post('/cards', [BusinessCardController::class, 'store'])->name('cards.store');

    // Edit card
    Route::get('/cards/{card}/edit', [BusinessCardController::class, 'edit'])->name('cards.edit');
    Route::put('/cards/{card}', [BusinessCardController::class, 'update'])->name('cards.update');

    // View card
    Route::get('/cards/{card}', [BusinessCardController::class, 'show'])->name('cards.show');

    // Delete card
    Route::delete('/cards/{card}', [BusinessCardController::class, 'destroy'])->name('cards.destroy');
});

// Templates page accessible to all logged-in users
Route::get('/templates', [BusinessCardController::class, 'templates'])->name('templates.index');
