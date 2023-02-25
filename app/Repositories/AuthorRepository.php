<?php

namespace App\Repositories;

use App\Models\Author;

class AuthorRepository extends BaseRepository
{
    public function __construct(Author $model)
    {
        parent::__construct($model);
    }

    public function getAllAuthors()
    {
        return parent::getAll();
    }

    public function getAuthorById(string $id)
    {
        return parent::getById($id);
    }
}
