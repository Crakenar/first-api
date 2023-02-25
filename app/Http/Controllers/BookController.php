<?php

namespace App\Http\Controllers;

use App\Exceptions\BookException;
use App\Models\Book;
use App\Models\Helper;
use App\Services\BookService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class BookController extends Controller
{
    private string $book_model = 'book';

    public function __construct(protected BookService $bookService)
    {}

    /**
     * @throws AuthorizationException
     * @throws BookException
     */
    public function create(Request $request, Book $book): JsonResponse
    {
        if ($request->user()->cannot('create', $book)) {
            throw BookException::notAllowed(Helper::NOT_ALLOWED_CREATE, $this->book_model);
        }
        $this->authorize('update', $book);
    }

    /**
     * @throws AuthorizationException
     * @throws BookException
     */
    public function update(Request $request, Book $book): JsonResponse
    {
        if ($request->user()->cannot('update', $book)) {
            throw BookException::notAllowed(Helper::NOT_ALLOWED_UPDATE, $this->book_model);
        }
        $this->authorize('update', $book);
    }

    /**
     * @throws AuthorizationException
     * @throws BookException
     */
    public function view(Request $request, Book $book): JsonResponse
    {
        if ($request->user()->cannot('view', $book)) {
            throw BookException::notAllowed(Helper::NOT_ALLOWED_GET, $this->book_model);
        }
        $this->authorize('update', $book);
    }

    public function getAll(): JsonResponse
    {
        $res = $this->bookService->getBooks();
        return responseJsonController(true, $res);
    }

    /**
     * @throws Throwable
     */
    public function getBook(string $id): JsonResponse
    {
        $res = $this->bookService->getBookById($id);
        return responseJsonController(true, $res);
    }
}
