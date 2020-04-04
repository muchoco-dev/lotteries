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

Route::get('/', 'LotteryController@index');
Route::get('/k/create', 'LotteryController@create');
Route::get('/k/{uname}/edit', 'LotteryController@edit');
Route::get('/k/{uname}', 'LotteryController@show');
Route::get('/k/{uname}/result', 'LotteryController@result');
