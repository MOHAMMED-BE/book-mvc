<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row mb-3">
            <div class="col-8">
                <form method="GET" action="index.php" class="d-flex">
                    <input type="hidden" name="book/index" value="">
                    <input
                        type="text"
                        name="search"
                        class="form-control me-2"
                        placeholder="Search books..."
                        value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <button type="submit" class="btn btn-warning btn-search">Search</button>
                </form>
            </div>


        </div>

        <table class="table">
            <thead class="table-dark">
                <tr>
                    <!-- <th>Image</th> -->
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                    <tr class="bg-white">
                        <!-- <td>
                            <?php if (!empty($book['image'])): ?>
                                <img src="/bookmvc/uploads/book_image/<?php echo htmlspecialchars($book['image']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>" class="rounded" style="width: 65px; height: auto;">
                            <?php else: ?>
                                <span>No Image</span>
                            <?php endif; ?>
                        </td> -->
                        <td><?php echo htmlspecialchars($book['title']); ?></td>
                        <td><?php echo htmlspecialchars($book['author']); ?> MAD</td>
                        <td>
                            <a href="/bookmvc/index.php?book/edit&id=<?php echo $book['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/bookmvc/index.php?book/delete&id=<?php echo $book['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php echo $paginationHtml; ?>

    </div>

</body>

</html>