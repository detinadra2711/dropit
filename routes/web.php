<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index')->name('home');

Route::group([
    'middleware' => 'auth',
    'prefix' => 'arsip',
], function () {
    Route::get('/', 'FileController@index')->name('file.index');
    Route::get('/create', 'FileController@create')->name('file.create');
    Route::post('/create', 'FileController@store')->name('file.store');
    Route::get('/edit/{id}', 'FileController@edit')->name('file.edit');
    Route::patch('/edit/{id}', 'FileController@update')->name('file.update');
    Route::delete('/destroy/{id}', 'FileController@destroy')->name('file.destroy');
});

Auth::routes([
    'register' => false,
]);
