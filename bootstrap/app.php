<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

use Spatie\Permission\Middleware\RoleMiddleware;

return Application::configure(basePath: dirname(__DIR__))

    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware): void {

        /*
        |--------------------------------------------------------------------------
        | Trusted Proxies
        |--------------------------------------------------------------------------
        */

        $middleware->trustProxies(
            at: '*',

            headers:
                Request::HEADER_X_FORWARDED_FOR
                | Request::HEADER_X_FORWARDED_HOST
                | Request::HEADER_X_FORWARDED_PORT
                | Request::HEADER_X_FORWARDED_PROTO
        );


        /*
        |--------------------------------------------------------------------------
        | Spatie Permission Middleware
        |--------------------------------------------------------------------------
        |
        | Memungkinkan route menggunakan:
        |
        | ->middleware('role:admin')
        |
        */

        $middleware->alias([
            'role' => RoleMiddleware::class,
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions): void {

        /*
        |--------------------------------------------------------------------------
        | JSON Exception Response
        |--------------------------------------------------------------------------
        */

        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*'),
        );
    })

    ->create();