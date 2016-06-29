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

//������� ��������
Route::get('/search', 'SearchController@index');
Route::get('/', 'VkrController@store');
Route::get('/home', 'HomeController@home');

//����� ��� ���
Route::get('/vkr', 'VkrController@index');
Route::post('/vkr/create', 'VkrController@create');
Route::post('/vkr/update', 'VkrController@update');
Route::get('/vkr/store', 'VkrController@store');
Route::get('/vkr/search', 'VkrController@store');
Route::get('/vkr/edit/{id}', 'VkrController@edit');
Route::get('/vkr/destroy/{id}', 'VkrController@index');
//Route::get('/vkr/{facultet}/{year}', 'VkrController@search');
Route::post('/vkr/search/poll', 'VkrController@all');

//����
Route::get('/year', 'YearController@index');
Route::get('/year/store', 'YearController@store');
Route::post('/year/create', 'YearController@create');

//����� ��� �����������
	Route::get('/facultets', 'FacultetController@index');
	Route::post('/facultets/create', 'FacultetController@create');
	Route::post('/facultets/update', 'FacultetController@update');
	Route::get('/facultets/store', 'FacultetController@store');
	Route::get('/facultets/edit/{id}', 'FacultetController@edit');
	Route::get('/facultets/destroy/{id}', 'FacultetController@index');
//����� ��� �������������
	Route::get('/users', 'UserController@index');
	Route::post('/users/create', 'UserController@create');
	Route::post('/users/update', 'UserController@update');
	Route::get('/users/store', 'UserController@store');
	Route::get('/users/edit/{id}', 'UserController@edit');
	Route::get('/users/destroy/{id}', 'UserController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
