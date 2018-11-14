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

Route::get('/', 'SoalController@index');
Route::put('/soal/{soal}', 'SoalController@update');
Route::get('babak/{babak}', 'SoalController@showSoal')->name('babak');
Route::get('/soal', 'SoalController@soal');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/simpan', 'HomeController@store')->name('simpan');
Route::get('/lihat-soal/{id}', 'HomeController@show');
Route::put('/updateSoal/{id}', 'HomeController@update');
Route::delete('/deleteSoal/{id}', 'HomeController@destory');
