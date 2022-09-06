<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/games')->group(function(){
    Route::get('/', 'GGameReviewController@index');
    Route::post('/store','GGameReviewController@store');
});

Route::prefix('/users')->group(function(){
    Route::get('/', 'UserController@index');
    Route::post('/create','UserController@create');
});


