<?php

namespace App\Http\Controllers;

use App\Exceptions\AuthorException;
use App\Models\Author;
use App\Models\Helper;
use App\Services\AuthorService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private string $author_model = 'author';

    public function __construct(protected AuthorService $authorService)
    {}

    /**
     * @throws AuthorizationException
     * @throws AuthorException
     */
    public function create(Request $request, Author $author): JsonResponse
    {
        if ($request->user()->cannot('create', $author)) {
            throw AuthorException::notAllowed(Helper::NOT_ALLOWED_CREATE, $this->author_model);
        }
        $this->authorize('update', $author);
    }

    /**
     * @throws AuthorizationException
     * @throws AuthorException
     */
    public function update(Request $request, Author $author): JsonResponse
    {
        if ($request->user()->cannot('update', $author)) {
            throw AuthorException::notAllowed(Helper::NOT_ALLOWED_UPDATE, $this->author_model);
        }
        $this->authorize('update', $author);
    }

    /**
     * @throws AuthorizationException
     * @throws AuthorException
     */
    public function view(Request $request, Author $author): JsonResponse
    {
        if ($request->user()->cannot('view', $author)) {
            throw AuthorException::notAllowed(Helper::NOT_ALLOWED_GET, $this->author_model);
        }
        $this->authorize('update', $author);
    }

    public function getAll(): JsonResponse
    {
        $res = $this->authorService->getAuthors();
        return responseJsonController(true, $res);
    }

    public function getAuthor(string $id): JsonResponse
    {
        $res = $this->authorService->getAuthor($id);
        return responseJsonController(true, $res);
    }
}
