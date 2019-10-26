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

Route::group(['prefix' => 'temperature'], function () {
    Route::get('/', 'TemperatureController@index')->name('temperature.index');
    Route::post('/store', 'TemperatureController@store')->name('temperature.store');
});
