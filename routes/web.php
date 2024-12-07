<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Allow guest access to the dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// About page (accessible to everyone)
Route::get('/about', function () {
    return view('about.index');
})->name('about');

// Gallery (optional)
Route::get('/gallery', [\App\Http\Controllers\ArtController::class, 'view'])->name('gallery');

// Restrict profile and other user-specific routes to authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/image', [ProfileController::class, 'updateImage'])->name('profile.update_image');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/art', [\App\Http\Controllers\ArtController::class, 'index'])->name('art.index');
    Route::post('/art', [\App\Http\Controllers\ArtController::class, 'store'])->name('art.store');
    Route::delete('/art/{art}', [\App\Http\Controllers\ArtController::class, 'destroy'])->name('art.destroy');

    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home-list');
});

// Authentication routes
require __DIR__.'/auth.php';
