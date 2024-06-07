<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SwaggerController;
use App\Http\Controllers\TraditionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LenguajeController;
use App\Http\Controllers\CostumeController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\AuthController;
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
Route::post('/login', [AuthController::class,'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
Route::apiResource('/users', UserController::class)->names('users');
Route::apiResource('/news', NewController::class)->names('news');
});
Route::apiResource('/traditions', TraditionController::class)->names('traditions');
Route::apiResource('/lenguajes', LenguajeController::class)->names('lenguajes');
Route::apiResource('/costumes', CostumeController::class)->names('costumes');
Route::apiResource('/contents', ContentController::class)->names('contents');
Route::apiResource('/places', PlaceController::class)->names('places');
Route::get('/api/documentation', 'SwaggerController@swagger');
Route::get('/swagger', [SwaggerController::class, 'generateSwagger']);