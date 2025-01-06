<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route to display the upload form
Route::get('/upload-image', [ImageUploadController::class, 'showUploadForm'])->name('showUploadForm');

// Route to process the uploaded image
Route::post('/upload-image', [ImageUploadController::class, 'processImage'])->name('processImage');

require __DIR__ . '/auth.php';


