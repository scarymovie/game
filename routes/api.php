<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\v1\CategoryController;
use App\Http\Controllers\Api\v1\QuestionController;
use App\Http\Controllers\Api\v1\TeamController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function (){
    Route::apiResource('teams', TeamController::class);
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
//    Route::get('/questions/{category}', [QuestionController::class, 'show'])->name('questions.show');
//    Route::get('/questions', [QuestionController::class, 'getUserQuestions']);
    Route::apiResource('/questions', QuestionController::class);
    //TODO:: add endpoint for all questions. now only for user_id = 13
});

Route::post('login', [AuthController::class, 'login'])
    ->middleware('guest')
    ->name('api.login');

//Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
//    ->middleware('auth')
//    ->name('api.logout');
