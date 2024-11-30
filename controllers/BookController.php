<?php
require_once 'models/Book.php';

class BookController
{
    private $bookModel;

    public function __construct()
    {
        $this->bookModel = new Book();
    }

    public function index()
    {
        $itemsPerPage = 4;
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($currentPage - 1) * $itemsPerPage;

        $searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';

        $bookModel = new Book();

        if ($searchQuery !== '') {
            $totalItems = $bookModel->getSearchCount($searchQuery);
            $books = $bookModel->search($searchQuery, $itemsPerPage, $offset);
        } else {
            $totalItems = $bookModel->getCount();
            $books = $bookModel->getPaginated($itemsPerPage, $offset);
        }

        $baseUrl = 'index.php?book/index' . ($searchQuery !== '' ? '&search=' . urlencode($searchQuery) : '');
        $paginationHtml = PaginationHelper::paginate($totalItems, $itemsPerPage, $currentPage, $baseUrl);

        require 'views/books/index.php';
    }

    public function create()
    {

        require 'views/books/create.php';
    }

    public function store(string $title, string $author)
    {
        $this->bookModel->create($title, $author);

        header('Location: index.php?book/index');
        exit;
    }

    public function edit(int $id)
    {
        $book = $this->bookModel->getById($id);

        require 'views/books/edit.php';
    }

    public function update(int $id, string $title, string $author)
    {
        $this->bookModel->update($id, $title, $author);
        header('Location: index.php?book/index');
        exit;
    }

    public function delete(int $id)
    {
        $this->bookModel->delete($id);
        header('Location: index.php?book/index');
        exit;
    }
}
