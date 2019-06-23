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



Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/register', 'BikeController@register');
Route::post('/home/confirmreg','BikeController@confirmRegister');
Route::get('/home/view','BikeController@viewResult');
Route::get('home/view/specific/{money}','BikeController@viewSpecific');
Route::get('home/edit/{id}','BikeController@editRecord');
