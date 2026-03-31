<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('/hakkimda', [BlogController::class, 'about'])->name('about');
Route::get('/iletisim', [BlogController::class, 'contact'])->name('contact');
Route::get('/gizlilik-politikasi', [BlogController::class, 'privacy'])->name('privacy');
Route::get('/yazi/{slug}', [BlogController::class, 'show'])->name('post.show');
Route::get('/kesfet', [BlogController::class, 'random'])->name('post.random');

// Admin Routes (Protected)
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::resource('posts', PostController::class);
    Route::post('posts/bulk-image', [PostController::class, 'bulkImage'])->name('posts.bulk-image');
    Route::resource('categories', CategoryController::class);
    Route::resource('advertisements', \App\Http\Controllers\Admin\AdvertisementController::class);
});

// Profile Routes (from Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
