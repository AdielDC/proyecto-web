<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TraditionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LenguajeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/traditions',[TraditionController::class,'index']);
Route::get('/lenguajes',[LenguajeController::class,'index']);



