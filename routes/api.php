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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/crud-test','ApiController@index')->name('listar');
Route::post('/crud-test','ApiController@store')->name('store');
Route::put('/crud-test/{id}','ApiController@update')->name('update');
Route::delete('/crud-test/{id}','ApiController@destroy')->name('destroy');
