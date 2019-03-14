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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/sensors', 'SensorsController@index')->name('sensors.index');
Route::get('/sensors/create', 'SensorsController@create')->name('sensors.create');
Route::post('/sensors', 'SensorsController@insert')->name('sensors.insert');
Route::get('/sensors/{sensor}', 'SensorsController@show')->name('sensors.show');
Route::put('/sensors/{sensor}', 'SensorsController@update')->name('sensors.update');
Route::delete('/sensors/{sensor}', 'SensorsController@delete')->name('sensors.delete');
Route::get('/sensors/{sensor}/edit', 'SensorsController@edit')->name('sensors.edit');

Route::get('/ajax/sensor/{sensor}/getLastRecord', 'SensorsController@getLastRecord');
Route::post('/api/insertRecord', 'SensorsController@insertRecord');


Route::get('/types', 'TypesController@index')->name('types.index');
Route::get('/types/create', 'TypesController@create')->name('types.create');
Route::put('/types/{type}', 'TypesController@update')->name('types.update');
Route::delete('/types/{type}', 'TypesController@delete')->name('types.delete');
Route::post('/types', 'TypesController@insert')->name('types.insert');
Route::get('/types/{type}/edit', 'TypesController@edit')->name('types.edit');
