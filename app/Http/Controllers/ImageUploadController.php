<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use thiagoalessio\TesseractOCR\TesseractOCR;


class ImageUploadController extends Controller
{
    // Show the upload form
    public function showUploadForm()
    {
        return view('upload-image'); // Points to resources/views/upload-image.blade.php
    }

    // Process the uploaded image
    public function processImage(Request $request)
    {
        // Validate the uploaded image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload and save the image to storage/public/uploads
        $imagePath = $request->file('image')->store('uploads', 'public');

        // Extract text using Tesseract OCR
        try {
            $tesseract = new TesseractOCR(storage_path('app/public/' . $imagePath));
            $text = $tesseract->run();
        } catch (\Exception $e) {
            return back()->with('error', 'Error processing image: ' . $e->getMessage());
        }

        // Return the extracted text to the view
        return view('upload-image', [
            'text' => $text,
            'imagePath' => $imagePath,
        ]);
    }
}
