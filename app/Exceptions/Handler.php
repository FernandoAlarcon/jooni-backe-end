<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $e)
    {
        $code = 'E_SERVER_ERROR';
        $status = 500;
        $message = $e->getMessage();

        if ($e instanceof \Illuminate\Validation\ValidationException) {
            $code = 'E_INVALID_PARAM';
            $status = 422;
            $message = $e->validator->errors()->first();
        }

        if ($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            $code = 'E_NOT_FOUND';
            $status = 404;
            $message = 'Recurso no encontrado';
        }

        return response()->json([
            'error' => [
                'message' => $message,
                'code'    => $code,
            ]
        ], $status);
    }
}
