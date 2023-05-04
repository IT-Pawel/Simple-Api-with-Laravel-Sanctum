<?php

use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ExchangeyController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix'=> 'v1'], function(){
    Route::post('/auth', [AuthController::class, 'auth']);
    
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::post('/dodajKurs', [ExchangeyController::class, 'store']);
        Route::get('/pobierzKursy', [ExchangeyController::class, 'show']);
    });
} );


