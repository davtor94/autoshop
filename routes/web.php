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


Route::get('/login','HomeController@login');
Route::post('/login','HomeController@log');
Route::get('/','UserController@index');
Route::post('/addcitas','UserController@createAppoinment');
Route::post('/addTip','AdminController@createTip');
Route::post('/addVehicle','UserController@createVehicle');
Route::post('/create', 'UserController@store');
Route::get('/index','UserController@index');
Route::get('/citas','UserController@citas');
Route::get('/historial','UserController@historial');
Route::get('/contacto','UserController@contacto');
Route::get('/vehicles','UserController@vehicles');
Route::delete('/tip/{tip}' ,'AdminController@deleteTip')->name('tip.delete');
Route::delete('/ad/{ad}' ,'AdminController@deleteAd')->name('ad.delete');
Route::post('/addTip','AdminController@createTip');
Route::post('/addAd','AdminController@createAd');
Route::get('/cobrar','AdminController@cobrar');
Route::post('/addConcept','AdminController@addConcept');
Route::get('/customers','AdminController@customers');
Route::get('/backup','AdminController@backup');
Route::get('/didBackup','AdminController@respaldoPhp');
Route::get('/download','AdminController@download');
Route::post('/addVehicleAdmin','AdminController@createVehicle');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
