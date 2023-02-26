<?php

namespace App\Repositories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookRepository extends BaseRepository
{

    public function __construct(Book $model)
    {
        parent::__construct($model);
    }

    public function getAllBooks(): Collection
    {
        return parent::getAll();
    }

    public function getBookById($id): Book
    {
        return parent::getById($id);
    }
}
