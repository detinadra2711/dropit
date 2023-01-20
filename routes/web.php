<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FileController;

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
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
})->name('home');

// Route::get('/upload', function () {
//     return view('file.upload');
// })->name('upload');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/upload', function () {
        return view('file.upload');
    })->name('upload');

    Route::post('upload', 'FileController@create');

    Route::get('/list-file', 'FileController@get_list_file')->name('list-file');

    Route::get('/detail-file/{id}', 'FileController@get_file')->name('detail-file');

    Route::post('update', 'FileController@update')->name('update');

    Route::post('show', 'FileController@show')->name('show');
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
