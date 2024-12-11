<?php
use App\Http\Controllers\ImageUploadController;

// Route to display the upload form
Route::get('/upload-image', [ImageUploadController::class, 'showUploadForm'])->name('showUploadForm');

// Route to process the uploaded image
Route::post('/upload-image', [ImageUploadController::class, 'processImage'])->name('processImage');
