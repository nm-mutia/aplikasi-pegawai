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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/',  'HomeController@index')->name('home');
Route::get('pegawai',  'HomeController@index')->name('pegawai');
Route::post('pegawai',  'HomeController@store');
Route::get('pegawai/{id}',  'HomeController@show');
Route::get('pegawai/{id}/edit',  'HomeController@edit');
Route::put('pegawai/{id}',  'HomeController@update');
Route::delete('pegawai/{id}',  'HomeController@destroy');
