<?php

use App\Http\Controllers\SetupController;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            // Raw routes (no /api, no session) - for server setup
            Route::middleware('setup.token')->group(function () {
                Route::get('/migrate', [SetupController::class, 'migrate'])->name('migrate');
                Route::get('/seed', [SetupController::class, 'seed'])->name('seed');
                Route::get('/setup', [SetupController::class, 'run'])->name('setup');
            });
        },
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
            'setup.token' => \App\Http\Middleware\SetupTokenMiddleware::class,
        ]);
        $middleware->validateCsrfTokens(except: [
            'admin/ckeditor/upload',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
