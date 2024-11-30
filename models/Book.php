<?php
require_once 'config/database.php';
require_once 'helpers/UploadHelper.php';

class Book
{
    private $conn;
    private $table = 'books';
    private $uploadHelper;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->uploadHelper = new UploadHelper();
    }

    public function search($query, $limit, $offset)
    {
        $query = '%' . $query . '%';
        $sql = "SELECT * FROM books WHERE title LIKE :query LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':query', $query, PDO::PARAM_STR);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSearchCount($query)
    {
        $query = '%' . $query . '%';
        $sql = "SELECT COUNT(*) AS total FROM books WHERE title LIKE :query";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':query', $query, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function getCount()
    {
        $query = "SELECT COUNT(*) AS total FROM books";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function getPaginated($limit, $offset)
    {
        $query = "SELECT *
                  FROM books
                  LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllBooks()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($title, $author)
    {
        try {
            $imageName = $this->uploadHelper->upload($_FILES['image'], 'book_image');

            $query = "INSERT INTO books (title, author, image) VALUES (:title, :author, :image)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':image', $imageName);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function update($id, $title, $author)
    {
        $query = "UPDATE " . $this->table . " SET title = :title, author = :author";
        $params = [
            ':id' => $id,
            ':title' => $title,
            ':author' => $author,
        ];

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            try {
                $newFileName = $this->uploadHelper->upload($_FILES['image'], 'book_image');
                $query .= ", image = :image";
                $params[':image'] = $newFileName;

                $this->deleteImageFile($id);
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

        $query .= " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        return $stmt->execute($params);
    }

    public function delete($id)
    {
        $this->deleteImageFile($id);

        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    private function deleteImageFile($id)
    {
        $book = $this->getById($id);
        if ($book && !empty($book['image']) && file_exists(__DIR__ . '/../uploads/book_image/' . $book['image'])) {
            $this->uploadHelper->delete($book['image'], 'book_image');
        }
    }
}
