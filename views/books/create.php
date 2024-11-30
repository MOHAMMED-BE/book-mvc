<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
</head>

<body>
    <div class="container mt-5">
        <form action="/bookmvc/index.php?book/store" method="POST" enctype="multipart/form-data" id="bookForm" class="p-4 border rounded bg-light">
            <div class="mb-2">
                <label for="title" class="form-label">Titre:</label>
                <input type="text" id="title" name="title" class="form-control" required>
                <div id="titleHelp" class="form-text">Enter the book Title (minimum 2 characters).</div>
            </div>
            <div class="mb-2">
                <label for="author" class="form-label">Auteur:</label>
                <input type="text" id="author" name="author" class="form-control" required>
                <div id="authorHelp" class="form-text">Enter the book auteur (minimum 2 characters).</div>
            </div>
            <div class="mb-2">
                <label for="image" class="form-label">Image:</label>
                <input type="file" id="image" name="image" class="form-control" required>
                <div id="imageHelp" class="form-text">Upload an image file (JPG, PNG, or WEBP).</div>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

</body>

</html>