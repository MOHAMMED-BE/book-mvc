<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
</head>

<body>
    <div class="container mt-5">
        <form action="/bookmvc/index.php?book/update&id=<?php echo $book['id']; ?>" method="POST" enctype="multipart/form-data" class="p-4 border rounded bg-light">
            <div class="mb-2">
                <label for="title" class="form-label">Auteur:</label>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($book['title']); ?>" class="form-control" required>
                <div id="titleHelp" class="form-text text-danger"></div>
            </div>
            <div class="mb-2">
                <label for="author" class="form-label">Auteur:</label>
                <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($book['author']); ?>" class="form-control" required>
                <div id="authorHelp" class="form-text text-danger"></div>
            </div>
            <div class="mb-2">
                <label for="image" class="form-label">Current Image:</label><br>
                <?php if (!empty($book['image'])): ?>
                    <img src="/bookmvc/uploads/book_image/<?php echo htmlspecialchars($book['image']); ?>" alt="Book Image" class="rounded" style="width: 100px; height: auto; margin-bottom: 10px;">
                <?php else: ?>
                    <p>No image available.</p>
                <?php endif; ?>
                <input type="file" id="image" name="image" class="form-control mt-2">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>

</body>

</html>