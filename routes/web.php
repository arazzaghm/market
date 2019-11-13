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

Route::post('/logout', '\App\Http\Controllers\Auth\LogoutController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/posts/{category}/{post}', 'PostController@show')->name('posts.show');

Route::get('/search', 'SearchController@index')->name('search');

Route::get('/users/id{user}', 'UserController@show')->name('users.show');

Route::get('/popular-questions', 'PopularQuestionController@index')->name('popular-questions.index');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin'], function () {
    Route::get('/', 'IndexController@index')->name('home');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.users.', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin'], function () {
    Route::get('/users', 'UserController@index')->name('index');
    Route::get('/users/edit/{user}', 'UserController@edit')->name('edit');
    Route::post('/users/ban/{user}', 'UserController@ban')->name('ban');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.posts.', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin'], function () {
    Route::get('/posts', 'PostController@index')->name('index');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.categories.', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin'], function () {
    Route::get('/categories', 'CategoryController@index')->name('index');
    Route::get('/categories/create', 'CategoryController@create')->name('create');
    Route::post('/categories/store', 'CategoryController@store')->name('store');
    Route::get('/categories/edit/{category}', 'CategoryController@edit')->name('edit');
    Route::patch('/categories/{category}', 'CategoryController@update')->name('update');
    Route::delete('/categories/delete/{category}', 'CategoryController@destroy')->name('destroy');
    Route::patch('/categories/pin/{category}', 'CategoryController@pin')->name('pin');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.report-types.', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin'], function () {
    Route::get('/report-types', 'ReportTypeController@index')->name('index');
    Route::get('/report-types/create', 'ReportTypeController@create')->name('create');
    Route::post('/report-types/store', 'ReportTypeController@store')->name('store');
    Route::get('/report-types/{reportType}', 'ReportTypeController@edit')->name('edit');
    Route::patch('/report-types/{reportType}', 'ReportTypeController@update')->name('update');
    Route::delete('/report-types/delete/{reportType}', 'ReportTypeController@destroy')->name('destroy');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.reports.', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin'], function () {
    Route::get('/reports', 'ReportController@index')->name('index');
    Route::get('/reports/create', 'ReportController@create')->name('create');
    Route::get('/reports/show/{report}', 'ReportController@show')->name('show');
    Route::post('/reports/store', 'ReportController@store')->name('store');
    Route::patch('/reports/update/{report}', 'ReportController@update')->name('update');
    Route::delete('/reports/delete/{report}', 'ReportController@destroy')->name('destroy');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.questions.', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin'], function () {
    Route::get('/questions', 'QuestionController@index')->name('index');
    Route::get('/questions/{question}', 'QuestionController@show')->name('show');
    Route::post('/questions/answer/{question}', 'QuestionController@answer')->name('answer');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.popular-questions.', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin'], function () {
    Route::get('/popular-questions', 'PopularQuestionController@index')->name('index');
    Route::get('/popular-questions/create', 'PopularQuestionController@create')->name('create');
    Route::post('/popular-questions/store', 'PopularQuestionController@store')->name('store');
    Route::get('/popular-questions/edit/{popularQuestion}', 'PopularQuestionController@edit')->name('edit');
    Route::patch('/popular-questions/update/{popularQuestion}', 'PopularQuestionController@update')->name('update');
    Route::delete('/popular-questions/update/{popularQuestion}', 'PopularQuestionController@destroy')->name('destroy');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.currencies.', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin'], function () {
    Route::get('/currencies', 'CurrencyController@index')->name('index');
    Route::post('/currencies/store', 'CurrencyController@store')->name('store');
    Route::get('/currencies/edit/{currency}', 'CurrencyController@edit')->name('edit');
    Route::patch('/currencies/update/{currency}', 'CurrencyController@update')->name('update');
    Route::delete('/currencies/destroy/{currency}', 'CurrencyController@destroy')->name('destroy');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.companies.', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin'], function () {
    Route::get('/companies', 'CompanyController@index')->name('index');
});

Route::group(['middleware' => ['auth'], 'as' => 'posts.'], function () {
    Route::get('/posts/create', 'PostController@create')->name('create');
    Route::post('/posts/store/{company}', 'PostController@store')->name('store');
    Route::patch('/posts/update/{post}', 'PostController@update')->name('update');
    Route::delete('/posts/destroy/{post}', 'PostController@destroy')->name('destroy');
    Route::post('/posts/hide/{post}', 'PostController@hide')->name('hide');
    Route::post('/posts/archive/{post}', 'PostController@archive')->name('archive');
});

Route::group(['middleware' => ['auth'], 'as' => 'bookmarks.'], function () {
    Route::get('/bookmarks', 'BookmarkController@index')->name('index');
    Route::post('/post/{post}/bookmark/store', 'BookmarkController@store')->name('store');
    Route::delete('/post/{post}/bookmark/destroy', 'BookmarkController@destroy')->name('destroy');
});

Route::group(['middleware' => ['auth'], 'as' => 'companies.'], function () {
    Route::post('/companies/store', 'CompanyController@store')->name('store');
    Route::get('/companies/create', 'CompanyController@create')->name('create');
});

Route::group(['middleware' => ['auth'], 'as' => 'questions.'], function () {
    Route::get('/my-questions', 'QuestionController@index')->name('index');
    Route::post('/questions/store', 'QuestionController@store')->name('store');
    Route::get('/my-questions/{question}', 'QuestionController@show')->name('show');
});

Route::group(['middleware' => ['auth'], 'as' => 'settings.'], function () {
    Route::get('/settings/', 'SettingsController@index');
    Route::get('/settings/my-information', 'SettingsController@index')->name('index');
    Route::get('/my-statistics', 'SettingsController@statistics')->name('statistics');
});

Route::group(['middleware' => ['auth']], function () {
    Route::patch('/users/update/{user}', 'UserController@update')->name('users.update');
    Route::post('/users/avatar/{user}/change', 'AvatarController@store')->name('avatar.store');
    Route::post('/posts/{post}/picture/destroy', 'PostPictureController@destroy')->name('post-pictures.destroy');
    Route::post('/comment/store/{post}', 'CommentController@store')->name('comments.store');
    Route::post('/reports/store/{model}', 'ReportController@store')->name('reports.store');
});

Route::group(['middleware' => ['auth', 'hasCompany'], 'as' => 'my-company.'], function () {
    Route::get('/my-company', 'MyCompanyController@index')->name('index');
    Route::get('/my-company/show', 'MyCompanyController@show')->name('show');
    Route::delete('/my-company/logo', 'MyCompanyLogoController@destroy')->name('logo.destroy');
    Route::patch('/my-company/update', 'MyCompanyController@update')->name('update');
    Route::get('/my-company/posts', 'MyCompanyPostController@index')->name('posts.index');
});

Route::group(['middleware' => ['auth'], 'as' => 'cart.'], function () {
    Route::get('/cart', 'CartController@show')->name('show');
    Route::get('/cart/add/{post}', 'CartController@add')->name('add');
    Route::delete('/cart/delete/{post}', 'CartController@delete')->name('delete');
    Route::delete('/cart/clear', 'CartController@clear')->name('clear');
});


Route::get('/companies/{company}', 'CompanyController@show')->name('companies.show');
Route::get('/posts/{category?}', 'PostController@index')->name('posts.index');
Route::get('lang/{locale}', 'LanguageController@set')->name('language.set');
