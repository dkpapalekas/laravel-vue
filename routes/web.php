<?php

use Illuminate\Support\Facades\Route;

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

$p = fn($x) => 'App\\Http\\Controllers\\' . $x;

//Vue.js app redirection
Route::get('/', fn() => redirect('/app'));
//Route::get('/app/{any?}', 'App\Http\Controllers\PagesController@app'));
Route::get('/app/{any?}', $p('PagesController@app'))->where('any', '[\/\w\.-]*');

//Laravel Controllers

//test routes
//Route::post('/test', 'App\Http\Controllers\TestController@index'));
Route::post('/test', $p('TestController@index'));
Route::get('/gtest', $p('TestController@show'));

//vehicle routes
Route::post('/vehicle', 'App\Http\Controllers\VehiclesController@insert');
Route::post('/vehicleupdate', 'App\Http\Controllers\VehiclesController@update');
Route::get('/vehicles', 'App\Http\Controllers\VehiclesController@index');
Route::post('/vehicledelete', 'App\Http\Controllers\VehiclesController@destroy');
