<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>

<body>
    <h1>Image to Text Converter</h1>

    <!-- Image Upload Form -->
    <form action="{{ route('processImage') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image">Choose an Image:</label>
        <input type="file" name="image" id="image" required>
        <button type="submit">Upload & Extract Text</button>
    </form>

    @if (isset($text))
        <h2>Extracted Text:</h2>
        <pre>{{ $text }}</pre>

        <h3>Uploaded Image:</h3>
        <img src="{{ asset('storage/' . $imagePath) }}" alt="Uploaded Image" style="max-width:300px;">
    @endif
</body>

</html>