<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Support\Facades\Route;




Route::get('/', 'SensorsController@index')->name('sensors.index');
Route::get('sensor/{sensor}', 'SensorsController@show')->name('sensors.show');
Route::get('sensor/create', 'SensorsController@create')->name('sensors.create');

Route::get('ajax/sensor/{sensor}/getLastRecord', 'SensorsController@getLastRecord');

Route::post('api/insertRecord', 'SensorsController@insertRecord');