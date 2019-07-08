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

/**
 * Using  Register Controller
 * in file App/Http/Controllers
 */
Route::get('/home/register', 'RegisterController@register');
Route::post('/home/confirmreg','RegisterController@confirmRegister');
/**
 * Using  ViewController Controller
 * in file App/Http/Controllers
 */
Route::get('/home/view','ViewController@viewResult');
Route::get('home/view/specific/{money}','ViewController@viewSpecific');
Route::get('home/detail/{id}','ViewController@printDetail');
/**
 * Using  Edit Controller
 * in file App/Http/Controllers
 */
Route::get('home/edit/{id}','EditController@editRecord');
Route::post('/home/editreg','EditController@editRegisterActive');
Route::get('home/delete/{id}','EditController@deleteRecord');
/**
 * Printing
 */
Route::get('home/print/{id}','ViewController@printRecipt');
Route::get('/home/printinfo/','HomeController@printInfo');
/**
 * 
 *Searching
 */

Route::get('home/search/','ViewController@searchPage');
Route::post('/home/search/active/','ViewController@searchMethod');
Route::get('home/manager/','ViewController@managingUser');
Route::get('home/transaction/{donate}','ViewController@transactionPrinting');
/**
 * Specific Options
 */
Route::get('/home/size','ViewController@sizeCounter');
Route::get('home/viewfromsite','ViewController@viewFromWeb');
Route::get('/home/pending/','ViewController@viewPending');
Route::get('/home/viewoffline/','ViewController@viewOffline');

