<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Auth;

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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        if ($request->is('admins') || $request->is('admins/*')) {
            return redirect()->guest('/login/admins');
        }
        if ($request->is('students') || $request->is('students/*')) {
            return redirect()->guest('/login/students');
        }
        if ($request->is('faculties') || $request->is('faculties/*')) {
            return redirect()->guest('/login/faculties');
        }
        if ($request->is('registrants') || $request->is('registrants/*')) {
            return redirect()->guest('/login/registrants');
        }
        return redirect()->guest('/');
    }

}
