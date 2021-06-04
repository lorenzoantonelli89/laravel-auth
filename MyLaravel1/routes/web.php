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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/car-list', 'HomeController@carList') -> name('car-list');

Route::get('/details{id}', 'HomeController@detailsCar') -> name('details');

Route::get('/newCar', 'HomeController@newCar') -> name('newCar');
Route::post('/store', 'HomeController@store') -> name('store');

Route::get('/edit/{id}', 'HomeController@edit') -> name('edit');
Route::post('/update/{id}', 'HomeController@update') -> name('update');

Route::get('/destroy/{id}', 'HomeController@destroy') -> name('destroy');
