<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CheckAllowedCountry;
use App\Http\Middleware\EnsureEmailIsVerifiedForForeignUsers;
use App\Http\Middleware\LogUserActivity;
use App\Http\Middleware\MobileOnly;
use App\Http\Middleware\UserMiddleware;
use Fahlisaputra\Minify\Middleware\MinifyCss;
use Fahlisaputra\Minify\Middleware\MinifyHtml;
use Fahlisaputra\Minify\Middleware\MinifyJavascript;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin' => AdminMiddleware::class,
            'user' => UserMiddleware::class,
            'loguser' => LogUserActivity::class,
            'check.country' => CheckAllowedCountry::class,
            'foreign.verified' => EnsureEmailIsVerifiedForForeignUsers::class,
            'mobile' => MobileOnly::class,
        ]);

        $middleware->web(append: [
            MinifyHtml::class,
            MinifyCss::class,
            MinifyJavascript::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
