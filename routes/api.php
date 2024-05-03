<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/test-question/{question_id}', [TestQuestionController::class, 'show']);

Route::get('/test-question-reading/{question_id}/{reading_id}', [TestQuestionController::class, 'showReadingQuestion']);
