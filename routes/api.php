<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'login'], function () {
    Route::post('/','LoginController@postLogin');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/','UserController@getAll');
    Route::post('/','UserController@create');
    Route::put('/{id}','UserController@update');
    Route::delete('/{id}','UserController@delete');

});
