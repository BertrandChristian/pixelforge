<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/about', function() {return view('about.index');})->name('about');
//Route::get('/gallery', function() {return view('gallery.index');})->name('gallery');

Route::middleware('auth')->group(function () {
    // Profile-related routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Art-related routes
    Route::get('/art', [\App\Http\Controllers\ArtController::class, 'index'])->name('art.index');
    Route::post('/art', [\App\Http\Controllers\ArtController::class, 'store'])->name('art.store');
    Route::delete('/art/{art}', [\App\Http\Controllers\ArtController::class, 'destroy'])->name('art.destroy');
    Route::get('/gallery', [\App\Http\Controllers\ArtController::class, 'view'])->name('gallery');

    // Other routes
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home-list');
});


require __DIR__.'/auth.php';
