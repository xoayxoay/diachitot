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
// HOME
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/test', 'HomeController@test');

// REGISTER & LOGIN
Auth::routes();
Route::get('auth/facebook', 'SocialController@redirectToProvider');
Route::get('auth/facebook/callback', 'SocialController@handleProviderCallback');

// USERS
Route::resource('users','UsersController');
Route::post('sendemailverification', 'UsersController@sendemailverification');
Route::get('register/verify/{token}', 'UsersController@verify');

// ARTICLES
Route::put('articles/starts','ArticlesController@starts');
Route::resource('articles','ArticlesController');

// COMMENTS
Route::put('comments/like','CommentsController@likes');
Route::resource('comments','CommentsController');

// APP
	// SUPERADMIN
	Route::get('superadmin/users/{lever}', 'SuperadminController@users');


Route::get('superadmin', 'SuperadminController@index');
Route::get('admins', 'AdminsController@index');
Route::get('customers', 'CustomersController@index');