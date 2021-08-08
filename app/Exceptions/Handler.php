<?php

namespace App\Exceptions;

use App\Helpers\ResponseFormatter;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use RuntimeException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (Throwable $error, $request) {
            if (!$request->is('api/*') && !$request->is('oauth/*')) 
                return;

            if($error instanceof ValidationException)
                return ResponseFormatter::error($error->validator->errors()->first(), $error->status);

            if($error instanceof NotFoundHttpException)
                return ResponseFormatter::error('Data Not Found', $error->getStatusCode());

            if($error instanceof UnauthorizedHttpException)
                return ResponseFormatter::error($error->getMessage(), $error->getStatusCode());
            
            if($error instanceof AuthenticationException)
                return ResponseFormatter::error($error->getMessage(), Response::HTTP_UNAUTHORIZED);

            if(env('APP_DEBUG', false))
                return ResponseFormatter::error($error->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);

            if($error instanceof QueryException)
                return ResponseFormatter::error('Internal Connection Error', Response::HTTP_INTERNAL_SERVER_ERROR);

            return ResponseFormatter::error('Internal Server Error', Response::HTTP_INTERNAL_SERVER_ERROR);

        });
    }
}
