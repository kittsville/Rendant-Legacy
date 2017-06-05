<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($e instanceof ModelNotFoundException) {
            $status_code = 404;
            $message     = $e->getModel() . ' not found';
        } elseif ($e instanceof HttpException) {
            $status_messages = [
                403 => 'Access Forbidden',
                404 => 'Resource not Found',
                405 => 'Incorrect HTTP Method (GET/POST/etc.) used',
                410 => 'Resource Deleted',
                429 => 'API Rate Limit Exceeded',
                500 => 'Server Error',
                501 => 'Not yet implemented',
                503 => 'API temporarily unavailable',
            ];
            
            $status_code = $e->getStatusCode();
            $message = $status_messages[$status_code];
        } else {
            $rendered = parent::render($request, $e);
            
            $status_code = $rendered->getStatusCode();
            
            $message = class_basename($e) . ' in ' . basename($e->getFile()) . ' line ' . $e->getLine();
            
            $details = $e->getMessage();
            
            if ($details !== '') {
                $message .= ': ' . $details;
            }
        }
        
        return response()->json([
            'error' => [
                'code'    => $status_code,
                'message' => $message,
            ],
            'data' => null,
        ], $status_code);
    }
}
