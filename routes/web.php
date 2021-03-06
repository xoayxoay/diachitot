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
Route::post('user_change_avatar', 'UsersController@avatar');
Route::post('sendemailverification', 'UsersController@sendemailverification');
Route::get('register/verify/{token}', 'UsersController@verify');
Route::post('users/password','UsersController@password');

// ARTICLES
Route::put('articles/starts','ArticlesController@starts');
Route::resource('articles','ArticlesController');

// COMMENTS
Route::put('comments/like','CommentsController@likes');
Route::resource('comments','CommentsController');

// APP
	// SUPERADMIN
	Route::get('superadmin', 'SuperadminController@index');
	Route::get('superadmin/users/{lever}', 'SuperadminController@users');
	Route::get('superadmin/user/{id}', 'SuperadminController@user');
	Route::get('superadmin/articles/{discount}', 'SuperadminController@articles');
	Route::get('superadmin/comments', 'SuperadminController@comments');
	Route::get('superadmin/promotion_codes', 'SuperadminController@promotion_codes');
	Route::get('superadmin/view_discounts', 'SuperadminController@view_discounts');
	Route::get('superadmin/setting', 'SuperadminController@setting');



Route::get('admins', 'AdminsController@index');
Route::get('customers', 'CustomersController@index');