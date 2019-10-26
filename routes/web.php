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

Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/{category}/{post}', 'PostController@show')->name('posts.show');

Route::get('/users/id{user}', 'UserController@show')->name('users.show');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin'], function () {
    Route::get('/', 'IndexController@index')->name('home');
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/users/edit/{user}', 'UserController@edit')->name('users.edit');
    Route::post('/users/ban/{user}', 'UserController@ban')->name('users.ban');

    Route::get('/posts', 'PostController@index')->name('posts.index');

    Route::get('/categories', 'CategoryController@index')->name('categories.index');
    Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
    Route::post('/categories/store', 'CategoryController@store')->name('categories.store');
    Route::get('/categories/edit/{category}', 'CategoryController@edit')->name('categories.edit');
    Route::patch('/categories/{category}', 'CategoryController@update')->name('categories.update');
    Route::delete('/categories/delete/{category}', 'CategoryController@destroy')->name('categories.destroy');

    Route::get('/report-types', 'ReportTypeController@index')->name('report-types.index');
    Route::get('/report-types/create', 'ReportTypeController@create')->name('report-types.create');
    Route::post('/report-types/store', 'ReportTypeController@store')->name('report-types.store');
    Route::get('/report-types/{reportType}', 'ReportTypeController@edit')->name('report-types.edit');
    Route::patch('/report-types/{reportType}', 'ReportTypeController@update')->name('report-types.update');
    Route::delete('/report-types/delete/{reportType}', 'ReportTypeController@destroy')->name('report-types.destroy');

    Route::get('/reports', 'ReportController@index')->name('reports.index');
    Route::get('/reports/create', 'ReportController@create')->name('reports.create');
    Route::get('/reports/show/{report}', 'ReportController@show')->name('reports.show');
    Route::post('/reports/store', 'ReportController@store')->name('reports.store');
    Route::patch('/reports/update/{report}', 'ReportController@update')->name('reports.update');
    Route::delete('/reports/delete/{report}', 'ReportController@destroy')->name('reports.destroy');
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('/users/avatar/{user}/change', 'AvatarController@store')->name('avatar.store');

    Route::get('/posts/edit/{post}', 'PostController@edit')->name('posts.edit');
    Route::get('/posts/create', 'PostController@create')->name('posts.create');
    Route::post('/posts/store', 'PostController@store')->name('posts.store');
    Route::patch('/posts/update/{post}', 'PostController@update')->name('posts.update');
    Route::delete('/posts/destroy/{post}', 'PostController@destroy')->name('posts.destroy');
    Route::post('/posts/hide/{post}', 'PostController@hide')->name('posts.hide');

    Route::get('/bookmarks', 'BookmarkController@index')->name('bookmarks.index');

    Route::post('/post/{post}/bookmark/store', 'BookmarkController@store')->name('bookmarks.store');
    Route::delete('/post/{post}/bookmark/destroy', 'BookmarkController@destroy')->name('bookmarks.destroy');

    Route::post('/posts/{post}/picture/destroy', 'PostPictureController@destroy')->name('post-pictures.destroy');

    Route::post('/comment/store/{post}', 'CommentController@store')->name('comments.store');

    Route::post('/reports/store/{model}', 'ReportController@store')->name('reports.store');
});
