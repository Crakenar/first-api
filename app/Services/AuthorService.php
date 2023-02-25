<?php

namespace App\Services;

use App\Repositories\AuthorRepository;

class AuthorService
{

    public function __construct(protected AuthorRepository $authorRepository)
    {}

    public function getAuthors()
    {
        return $this->authorRepository->getAllAuthors();
    }

    public function getAuthor(string $id): Author | null
    {
        // Exception ?
        if (!isset($id)){
            return null;
        }
        return $this->authorRepository->getAuthorById($id);
    }
}
