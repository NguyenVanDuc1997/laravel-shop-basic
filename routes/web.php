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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/login', 'LoginController@showFormLogin');
Route::post('/login', 'LoginController@login')->name('login');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('/', 'UserController@getAll')->name('users.list');
            Route::get('/{id}/delete', 'UserController@delete')->name('users.delete');
            Route::get('/{id}/change-password', 'UserController@showFormChangePassword')->name('users.showFormChangePassword');
            Route::post('/{id}/change-password', 'UserController@changePassword')->name('users.changePassword');
            Route::get('{id}/edit', 'UserController@update')->name('users.update');
            Route::post('{id}/edit', 'UserController@edit')->name('users.edit');
            Route::get('/create', 'UserController@create')->name('users.create');
            Route::post('/create', 'UserController@store')->name('users.store');
        });

        Route::prefix('categories')->group(function () {
            Route::get('/', 'CategoryController@getAll')->name('categories.list');
        });

        Route::prefix('products')->group(function () {
            Route::get('/', 'ProductController@index')->name('products.list');
            Route::get('/create', 'ProductController@create')->name('products.create');
            Route::post('/create', 'ProductController@store')->name('products.store');
        });
    });
});


