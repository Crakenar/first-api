<?php

use App\Models\Helper;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

if (!function_exists('anonymizeEmail')) {
    /**
     * @param string $email
     * @return string
     */
    function anonymizeEmail(string $email): string
    {
//        $mail_parts = explode("@", $email);
//        $domain_parts = explode('.', $mail_parts[1]);
//
//        $mail_parts[0] = genericMaskString($mail_parts[0], 2, 1); // show first 2 letters and last 1 letter
//        $domain_parts[0] = genericMaskString($domain_parts[0], 2, 1); // same here
//        $mail_parts[1] = implode('.', $domain_parts);
//
//        return implode("@", $mail_parts);
    }

    if (!function_exists(('responseJsonController'))) {
        function responseJsonController(bool $success, $data = null, string $errors = null, $error_code = null, \Exception $exception = null): JsonResponse
        {
            if (!$success && isset($exception)) {
                Log::error('Error' . $errors . ' : ' . $exception->getMessage() . ' File ' . $exception->getFile() . ' Line ' . $exception->getLine());
            }
            return response()->json([
                'success' => $success,
                'errors' => $errors,
                'error_code' => $error_code,
                'data' => $data
            ]);
        }
    }

    if(!function_exists(('genericValidator'))){
        /**
         * @throws Throwable
         */
        function genericValidator(Request $request, array $rules): void
        {
            $validator = Validator::make($request->all(), $rules);
            throw_if($validator->fails(), \App\Exceptions\GenericException::validationRule($validator->messages()));
        }
    }

    if (!function_exists(('returnExceptionCode'))){
        function returnExceptionCode(int $code, string $model_name): array
        {
            switch ($code) {
                case Helper::NOT_ALLOWED_GET:
                    $error_code = config('constants.'.$model_name.'.not_allowed.get');
                    $errors = "You are not allowed to get ".$model_name;
                    break;
                case Helper::NOT_ALLOWED_UPDATE:
                    $error_code = config('constants.'.$model_name.'.not_allowed.update');
                    $errors = "You are not allowed to update ".$model_name;
                    break;
                case Helper::NOT_ALLOWED_POST:
                    $error_code = config('constants.'.$model_name.'.not_allowed.post');
                    $errors = "You are not allowed to post ".$model_name;
                    break;
                case Helper::NOT_ALLOWED_DELETE:
                    $error_code = config('constants.'.$model_name.'.not_allowed.delete');
                    $errors = "You are not allowed to delete ".$model_name;
                    break;
                case Helper::NOT_ALLOWED_CREATE:
                    $error_code = config('constants.'.$model_name.'.not_allowed.create');
                    $errors = "You are not allowed to create ".$model_name;
                    break;
                default:
                    $error_code = config('constants.generic.not_allowed');
                    $errors = "You are not allowed to do that on ".$model_name;
                    break;
            }
            return ['error_code' => $error_code,'errors' => $errors];
        }
    }
}
