<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
         'auth.custom' => \App\Http\Middleware\AuthMiddleware::class,
        //  'csrf.exempt' => \App\Http\Middleware\VerifyCsrfToken::class,
         
        ]);
        $middleware->validateCsrfTokens(except: [
            'payments/midtrans-notification',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {

    })->create();