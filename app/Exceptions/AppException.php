<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

abstract class AppException extends Exception
{
    public function __construct(protected ?array $data = [])
    {
        parent::__construct($this->data['errors'] ?? $this->genericErrors());
    }

    public function render($request): JsonResponse
    {
        $errors = $this->data['errors'] ?? $this->genericErrors();
        $error_code = $this->data['error_code'] ?? $this->genericErrorCode();
        return responseJsonController(false, null, $errors, $error_code);
    }
}
