<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        $this->renderable(function (Exception $error, $request) {
            if (!$request->is('api/*'))
                return;

            if($error instanceof ValidationException)
                return response()->error($error->validator->errors()->first(), $error->status);

            if($error instanceof NotFoundHttpException)
                return response()->error('Data Not Found', $error->getStatusCode());

            if($error instanceof AuthenticationException)
                return response()->error($error->getMessage(), Response::HTTP_UNAUTHORIZED);

            if(env('APP_DEBUG', false))
                return response()->error($error->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);

            if($error instanceof QueryException)
                return response()->error('Internal Connection Error', Response::HTTP_INTERNAL_SERVER_ERROR);

            return response()->error('Internal Server Error', Response::HTTP_INTERNAL_SERVER_ERROR);

        });
    }
}
