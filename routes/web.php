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

Route::get('/','PagesController@index');

//test route
Route::get('test', ['middleware' => 'auth', 'uses' => 'TestController@index']);
Auth::routes();

Route::get('widget/create', ['as' => 'widget.create', 'uses'=> 'WidgetController@create']);

Route::get('widget/{id}-{slug?}', ['as' => 'widget.show', 'uses'=> 'WidgetController@show']);

Route::resource('widget', 'WidgetController', ['except' => ['show', 'create']]);

Route::get('admin', ['as' => 'admin', 'uses'=> 'AdminController@index']);

Route::get('terms-of-service', 'PagesController@terms');

Route::get('privacy', 'PagesController@privacy');

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');

Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');