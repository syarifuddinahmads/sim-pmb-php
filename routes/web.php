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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('jurusan','JurusanController@listJurusan');
Route::get('jurusan/add','JurusanController@addJurusan');
Route::get('jurusan/edit/{id}','JurusanController@editJurusan');
Route::post('jurusan/save','JurusanController@saveJurusan');
Route::post('jurusan/delete','JurusanController@deleteJurusan');

Route::get('lengkapi-data','MahasiswaController@lengkapiDataDiri');
Route::post('lengkapi-data/update','MahasiswaController@updateDataDiri');
