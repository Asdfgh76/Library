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

//use Illuminate\Routing\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/** Admin side */
Route::group(['middleware' => ['status','auth']], function () {
    $groupData = [
    'namespace' => 'Library\Admin',
    'prefix' => 'admin',
    ];

Route::group($groupData, function () {
    Route::resource('index', 'MainController')
    ->names('admin');

    Route::resource('users', 'UserController')
    ->names('admin.users');
});
});

Route::post('user/outputsearch', 'Library\User\UserController@outputsearch')->name('user.outputsearch');
Route::post('user/search', 'Library\User\UserController@search')->name('user.search');
Route::get('user/bookshand', 'Library\User\UserController@bookshand')->name('user.bookshand');
Route::post('user/{id}/destroybooked', 'Library\User\UserController@destroyBooked')->name('user.destroybooked');
Route::get('user/booked', 'Library\User\UserController@booked')->name('user.booked');
Route::post('user/tobook', 'Library\User\UserController@toBook')->name('user.tobook');
Route::resource('user', 'Library\User\UserController');

Route::get('librarian/{id}/accepted/', 'Library\Librarian\BooksController@accepted')->name('librarian.accepted');
Route::get('librarian/bookshand', 'Library\Librarian\BooksController@bookshand')->name('librarian.bookshand');
Route::post('librarian/issued', 'Library\Librarian\BooksController@issued')->name('librarian.issued');
Route::post('librarian/{id}/destroybooked', 'Library\Librarian\BooksController@destroyBooked')->name('librarian.destroybooked');
Route::get('librarian/booked', 'Library\Librarian\BooksController@booked')->name('librarian.booked');
Route::resource('librarian', 'Library\Librarian\BooksController');

Route::resource('librarian/author', 'Library\Librarian\AuthorController');
Route::resource('librarian/genre', 'Library\Librarian\GenreController');
Route::resource('librarian/publishing', 'Library\Librarian\PublishingController');
