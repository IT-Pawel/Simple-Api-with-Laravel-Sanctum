<?php

use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\KursyController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1', 'middleware' => ['auth:sanctum']], function () {
    Route::post('/auth', [AuthController::class, 'auth']);
    Route::post('/dodajKurs', [KursyController::class, 'store']);
    Route::get('/pobierzKursy', [KursyController::class, 'show']);
});
