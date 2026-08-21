<?php

use App\Http\Controllers\WebhookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(WebhookController::class)->group(function(){
    Route::prefix('/web_api/v1')->group(function(){
        Route::post('/webhooks', 'ResendAPI');
    });
});




