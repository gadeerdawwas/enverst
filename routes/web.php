<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;





Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', [WorkController::class, 'dashboard'])->name('dashboard');

    Route::resource('works', WorkController::class);
Route::delete('/gallery/{id}',[WorkController::class,'deleteImage'])->name('gallery.deleteImage');
});
Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/portfolio', [FrontController::class, 'portfolio'])->name('portfolio');
Route::get('/portfolio/show/{id}', [FrontController::class, 'portfolio_show'])->name('portfolio.show');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::post('/contact', [FrontController::class, 'sendEmail'])->name('contact.send');
Route::get('/services/{slug}', [ServiceController::class, 'show'])

  ->name('services.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


require __DIR__.'/auth.php';
