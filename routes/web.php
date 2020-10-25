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
//     return view('welcome');
// });

Route::group(['middleware' => 'auth', 'namespace' => 'App\Http\Controllers'], function(){
    Route::get('/', 'BookController@home');
    Route::get('/bookshelf/index', 'BookController@index');
    Route::get('/bookshelf/create', 'BookController@create');
    Route::post('/bookshelf/create', 'BookController@postCreate');
    Route::get('/bookshelf/edit/{id}', 'BookController@edit');
    Route::post('/bookshelf/edit', 'BookController@update');
    Route::post('/bookshelf/storeAPI', 'BookController@storeAPI');
    Route::post('/bookshelf/destroyBulk', 'BookController@destroyBulk');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');