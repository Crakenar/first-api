<?php

namespace App\Exceptions;

use App\Models\Book;
use App\Models\Helper;

class BookException extends AppException
{
    public function genericErrors(): string|null
    {
        return (new \ReflectionClass($this))->getShortName() . ' generic error';
    }

    public function genericErrorCode(): string
    {
        return config('constants.book.generic_error');
    }

    public static function notAllowed(int $code = null, string $model_name = null): self
    {
        $exceptionsConfig = returnExceptionCode($code, $model_name);
        return new static([
            'errors' => $exceptionsConfig['errors'],
            'error_code' => $exceptionsConfig['error_code']
        ]);
    }

    public static function couldNotGet($id = null): self
    {
        return new static([
            'errors' => 'No book found with id '.$id,
            'error_code' => config('constants.book.get')
        ]);
    }
}
