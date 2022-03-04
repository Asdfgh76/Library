<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//Route::get('/', function () { return view('welcome');});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/showbook/{book}', 'HomeController@showBook')->name('showbook');



Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::group([
        'namespace' => 'User',
        'prefix' => 'user',
        'as' => 'user.',
    ], function () {
            //Route::resource('book', 'BookController');
            Route::post('/addBookedBook/{book}', 'BookedController@addBookedBook')->name('addBookedBook');
            Route::get('/bookedBooks', 'BookedController@bookedBooks')->name('bookedBook');

    });
    Route::group([
        'namespace' => 'Admin',
        'prefix' => 'admin',
        'as' => 'admin.',
    ], function () {
        Route::group(['middleware' => 'role:admin'], function () {
            Route::resource('user', 'UserController');
        });
    });
    Route::group([
        'namespace' => 'Librarian',
        'prefix' => 'librarian',
        'as' => 'librarian.',
    ], function () {
        Route::group(['middleware' => 'role:librarian'], function () {
            Route::get('/bookedBooks', 'BookedController@bookedBooks')->name('bookedBook');
            Route::resource('book', 'BookController');
            Route::resource('author', 'AuthorController');
            Route::resource('genre', 'GenreController');
            Route::resource('publishing', 'PublishingController');

        });
    });
});
