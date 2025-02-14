<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', [\App\Http\Controllers\ArtController::class, 'getTopLikedArtworks'])->name('dashboard');

Route::get('/about', function () {
    return view('about.index');
})->name('about');

Route::get('/gallery', [\App\Http\Controllers\ArtController::class, 'view'])->name('gallery');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/image', [ProfileController::class, 'updateImage'])->name('profile.update_image');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/art', [\App\Http\Controllers\ArtController::class, 'index'])->name('art.index');
    Route::post('/art', [\App\Http\Controllers\ArtController::class, 'store'])->name('art.store');
    Route::delete('/art/{art}', [\App\Http\Controllers\ArtController::class, 'destroy'])->name('art.destroy');
    Route::get('/art/{art}', [\App\Http\Controllers\ArtController::class, 'show'])->name('art.show');
    Route::get('art/{art}/edit', [\App\Http\Controllers\ArtController::class, 'edit'])->name('art.edit');
    Route::put('art/{art}', [\App\Http\Controllers\ArtController::class, 'update'])->name('art.update');
    Route::post('/art/{art}/like', [\App\Http\Controllers\ArtController::class, 'like'])->name('art.like');


    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home-list');
    Route::get('/user', [\App\Http\Controllers\UserController::class, 'index'])->name('user-list');
    Route::delete('/user/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('user-delete');
});

require __DIR__.'/auth.php';
