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
Route::get('/device/filter', 'DeviceController@filter');
Route::get('/device/search', 'DeviceController@search');
Route::get('/device/selectpage', 'DeviceController@selectpage');



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/type', 'TypeController');
Route::resource('/manufacturer', 'ManuController');
Route::resource('/itemmodel', 'ItemModelController');
Route::resource('/device', 'DeviceController');


// for Ajax to get related product models related to the manufacturer
Route::get('device/getitemmodels/{id}/{typd_id}','DeviceController@getItemModels');
