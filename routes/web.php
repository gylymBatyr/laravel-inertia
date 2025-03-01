<?php

use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//Route::get('/contacts', [ContactController::class,'index'])->middleware(['auth', 'verified'])->name('contacts');
Route::resource('/contacts', ContactController::class)->middleware(['auth', 'verified']) ->names(['index' => 'dashboard',]);;



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//    Route::get('/contacts', [ContactController::class,'index']);
//    Route::apiResources([
//        '/contacts' => ContactController::class
//    ]);
});



require __DIR__.'/auth.php';
