<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


Route::middleware('auth:api')->group(function () {

Route::get('/user/details', [UserController::class,'details']);
    Route::get('/user/index', [UserController::class,'index']);
Route::resource('books','App\Http\Controllers\Api\BookController');

});
Route::post('login', [UserController::class,'login']);
Route::post('register',[UserController::class,'register']);

