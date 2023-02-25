<?php

namespace App\Exceptions;

use Exception;

class GenericException extends AppException
{
    public function genericErrors(): string|null
    {
        return (new \ReflectionClass($this))->getShortName() . ' generic error';
    }

    public function genericErrorCode(): string
    {
        return config('constants.generic.generic_error');
    }

    public static function notAllowed($message = null): self
    {
        return new static([
            'errors' => $message ?: 'You are not allowed to do that.',
            'error_code' => config('constants.generic.not_allowed')
        ]);
    }

    public static function validationRule($message = null): self
    {
        return new static([
            'errors' => $message ?: 'Erreur lors de la validation',
            'error_code' => config('constants.generic.validation_rules')
        ]);
    }
}
