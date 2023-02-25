<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository extends BaseRepository
{

    public function __construct(Book $model)
    {
        parent::__construct($model);
    }

    public function getAllBooks(): Book
    {
        return parent::getAll();
    }

    public function getBookById($id): Book
    {
        return parent::getById($id);
    }
}
