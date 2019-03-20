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

Route::get('/raspberry', 'RaspberryController@index')->name('raspberry.index');
Route::get('/raspberry/create', 'RaspberryController@create')->name('raspberry.create');
Route::post('/raspberry', 'RaspberryController@insert')->name('raspberry.insert');
Route::put('/raspberry/{raspberry}', 'RaspberryController@update')->name('raspberry.update');
Route::delete('/raspberry/{raspberry}', 'RaspberryController@delete')->name('raspberry.delete');
Route::get('/raspberry/{raspberry}/edit', 'RaspberryController@edit')->name('raspberry.edit');

Route::get('/raspberry/{raspberry}/setOffline', 'RaspberryController@setOffline')->name('raspberry.setOffline');
Route::get('/raspberry/{raspberry}/setOnline', 'RaspberryController@setOnline')->name('raspberry.setOnline');





Route::get('/sensors', 'SensorsController@index')->name('sensors.index');
Route::get('/sensors/create', 'SensorsController@create')->name('sensors.create');
Route::post('/sensors', 'SensorsController@insert')->name('sensors.insert');
Route::get('/sensors/{sensor}', 'SensorsController@show')->name('sensors.show');
Route::put('/sensors/{sensor}', 'SensorsController@update')->name('sensors.update');
Route::delete('/sensors/{sensor}', 'SensorsController@delete')->name('sensors.delete');
Route::get('/sensors/{sensor}/edit', 'SensorsController@edit')->name('sensors.edit');

Route::get('/ajax/sensor/{sensor}/getLastRecord', 'SensorsController@getLastRecord');




Route::get('/types', 'TypesController@index')->name('types.index');
Route::get('/types/create', 'TypesController@create')->name('types.create');
Route::put('/types/{type}', 'TypesController@update')->name('types.update');
Route::delete('/types/{type}', 'TypesController@delete')->name('types.delete');
Route::post('/types', 'TypesController@insert')->name('types.insert');
Route::get('/types/{type}/edit', 'TypesController@edit')->name('types.edit');
