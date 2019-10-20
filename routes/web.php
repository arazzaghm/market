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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin'], function () {
    Route::get('/', 'IndexController@index')->name('home');
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/users/edit/{user}', 'UserController@edit')->name('users.edit');

    Route::get('/posts', 'PostController@index')->name('posts.index');

    Route::get('/categories', 'CategoryController@index')->name('categories.index');
    Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
    Route::post('/categories/store', 'CategoryController@store')->name('categories.store');
    Route::get('/categories/edit/{category}', 'CategoryController@edit')->name('categories.edit');
    Route::patch('/categories/{category}', 'CategoryController@update')->name('categories.update');
    Route::delete('/categories/delete/{category}', 'CategoryController@destroy')->name('categories.destroy');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/users/id{user}', 'UserController@show')->name('users.show');
    Route::post('/users/avatar/{user}/change', 'AvatarController@store')->name('avatar.store');

    Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
    Route::get('/posts/create', 'PostController@create')->name('posts.create');
    Route::get('/posts/edit/{post}', 'PostController@edit')->name('posts.edit');
    Route::post('/posts/store', 'PostController@store')->name('posts.store');
    Route::patch('/posts/update/{post}', 'PostController@update')->name('posts.update');
});
