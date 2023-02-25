<?php

namespace App\Services;

use App\Exceptions\BookException;
use App\Models\Book;
use App\Repositories\BookRepository;

class BookService
{
    public function __construct(protected BookRepository $bookRepository)
    {}

    public function getBooks()
    {
        return $this->bookRepository->getAllBooks();
    }

    /**
     * @throws \Throwable
     */
    public function getBookById(string $id = null): Book | null
    {
        // Exception ?
        if (!isset($id)){
            return null;
        }

        $book = $this->bookRepository->getBookById($id);
        throw_if(!isset($book), BookException::couldNotGet($id));

        return $book;
    }
}
