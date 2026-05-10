<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/events', [App\Http\Controllers\EventController::class, 'store']);
Route::get('/events', [App\Http\Controllers\EventController::class, 'index']);
Route::get('/events/{id}', [App\Http\Controllers\EventController::class, 'show']);

// registrations
Route::get('/api/events/:id/register', [App\Http\Controllers\RegistrationController::class, 'show']);
Route::delete('/api/registrations/{id}', [App\Http\Controllers\RegistrationController::class, 'destroy']);
Route::post('/api/events/{id}/register', [App\Http\Controllers\RegistrationController::class, 'update']);
Route::get('/api/events/{id}/register/all', [App\Http\Controllers\RegistrationController::class, 'getPlaces']);
