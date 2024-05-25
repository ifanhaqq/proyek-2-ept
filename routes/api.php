<?php

use App\Http\Controllers\Api\MobileAuthController;
use App\Http\Controllers\Api\TestQuestionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(["middleware" => "auth:sanctum"], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/test-csrf', fn () => [1, 2, 3]);

    Route::post('/mobile-logout', [MobileAuthController::class, 'logout']);
    
    
});

Route::post('/mobile-login', [MobileAuthController::class, 'login']);

Route::post('/mobile-register', [MobileAuthController::class, 'store']);




Route::get('/test-question/{question_id}', [TestQuestionController::class, 'show']);

Route::get('/test-question-reading/{question_id}/{reading_id}', [TestQuestionController::class, 'showReadingQuestion']);
