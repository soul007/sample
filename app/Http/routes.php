<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

Route::get('/signup', 'UserController@create')->name('signup');
Route::resource('users','UserController');

// Route::get('/users', 'UserController@index')->name('users.index');
// Route::get('/users/{user}', 'UserController@show')->name('users.show');
// Route::get('/users/create', 'UserController@create')->name('users.create');
// Route::post('/users', 'UserController@store')->name('users.store');
// Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
// Route::patch('/users/{user}', 'UserController@update')->name('users.update');
// Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');

Route::get('login','SessionsController@create')->name('login');
Route::post('login','SessionsController@store')->name('login');
Route::delete('logout','SessionsController@destory')->name('logout');

Route::get('signup/confirm/{token}','UserController@confirmEmail')->name('confirm_email');

Route::get('password/email', 'Auth\PasswordController@getEmail')->name('password.reset');
Route::post('password/email','Auth\PasswordController@postEmail')->name('password.reset');
Route::get('password/reset/{token}','Auth\PasswordController@getReset')->name('password.edit');
Route::post('password/reset','Auth\PasswordController@postReset')->name('password.update');

Route::resource('statuses','StatusesController',['only'=>['store','destroy']]);
