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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
//Route::resourse('books','BookController');

/*Route::middleware('auth:api')->group(function () {
    Auth::routes();
    Route::get('books/add', [BookController::class, 'add'])->name("add");
    Route::get('books/store', [BookController::class, 'store'])->name("store");
});*/

Route::middleware('auth:api')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
    Route::resource('/books','App\Http\Controllers\Api\BookController');
Route::post('login', [UserController::class,'login']);
Route::post('register',[UserController::class,'register']);
 Route::post('details', [UserController::class,'details']);

