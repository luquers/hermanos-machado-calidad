<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return mixed JsonResponse or View
     */
    public function render($request, Throwable $exception)
    {

        $debug = config('app.debug');

        if (!$debug) {
            $message = '';
            $validationMessages = [];
            $code = 500;
            $throwable = true;

            if ($exception instanceof BadRequestHttpException) {
                $message = $exception->getMessage();
                $code = 400;
            }

            if ($exception instanceof HttpException) {
                $message = __('errors.'.$exception->getStatusCode());
                $code = $exception->getStatusCode();
            }

            if ($exception instanceof AccessDeniedHttpException) {
                $message = __('errors.403');
                $code = 403;
            }

            if ($exception instanceof AuthorizationException) {
                $message = __('errors.403');
                $code = 403;
            }

            if ($exception instanceof ModelNotFoundException) {
                $message = __('errors.404');
                $code = 404;
            }

            if ($exception instanceof NotFoundHttpException) {
                $message = __('errors.404');
                $code = 404;
            }

            if ($exception instanceof MethodNotAllowedHttpException) {
                $message = __('errors.405');
                $code = 405;
            }

            if ($exception instanceof TokenMismatchException) {
                $message = __('errors.419');
                $code = 419;
            }

            if ($exception instanceof AuthenticationException) {
                return parent::render($request, $exception);
            }

            if ($exception instanceof ValidationException) {
                $message = __('errors.422');
                $validationMessages = $exception->errors();
                $code = 422;
            }

            if ($exception instanceof TooManyRequestsHttpException) {
                $message = __('errors.429');
                $code = 429;
            }

            if ($exception instanceof Throwable && $code === 500 && $throwable) {
                $message = __('errors.500');
                $code = 500;
            }

            if ($request->wantsJson()) {
                return response()->json([
                    "status" => false,
                    "message" => $message,
                    "validationMessages" => $validationMessages
                ], $code);
            }
            else {
                $pageConfigs = [
                    'bodyClass' => "bg-full-screen-image",
                    'blankPage' => true
                ];

                return response()->view('exceptions.errors', ['message' => $message, 'code' => $code, 'pageConfigs' => $pageConfigs], $code);
            }
        }

        report($exception);

        return parent::render($request, $exception);
    }
}
