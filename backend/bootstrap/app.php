<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Intercepter toutes les exceptions de type Validation (422)
        $exceptions->render(function (\Illuminate\Validation\ValidationException $e, $request) {
            return response()->json([
                'status' => 'error',
                'code' => 'VALIDATION_FAILED',
                'message' => 'Les données fournies sont invalides.',
                'details' => $e->errors(),
            ], 422);
        });

        // Intercepter les erreurs d'authentification (401)
        $exceptions->render(function (\Illuminate\Auth\AuthenticationException $e, $request) {
            return response()->json([
                'status' => 'error',
                'code' => 'UNAUTHENTICATED',
                'message' => 'Vous devez être connecté.',
            ], 401);
        });

        $exceptions->render(function (\App\Exceptions\ApiException $e, $request) {
            return response()->json([
                'status' => 'error',
                'code' => $e->getCodeString(),
                'message' => $e->getMessage(),
                'details' => $e->getDetails(),
            ], $e->getStatusCode());
        });
    })->create();
