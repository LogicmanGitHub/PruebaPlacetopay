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


Route::get('/', function () {
    return view('home');
});

Route::get('/pagos','PagosPSEController@index');
Route::get('/nuevopago','PagosPSEController@create');
Route::post('/nuevopago','PagosPSEController@store');
Route::get('/cleancache','PagosPSEController@cleanCache');
