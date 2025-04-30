<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentalController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/berlesek', [RentalController::class, 'index']);
Route::get('/berlesek/{id}', [RentalController::class, 'rent']);
Route::post('/berlesek', [RentalController::class, 'store']);
Route::delete('/berlesek/{id}', [RentalController::class, 'destroy']);