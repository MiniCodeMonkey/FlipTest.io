<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showIndex');
Route::get('contact', function () {
	return View::make('contact');
});

Route::get('start', function () {
	return View::make('start');
});

Route::resource('api/v1/controller', 'APIControllerController');
Route::post('api/v1/controller/screenshot', 'APIControllerController@screenshot');
Route::resource('apps', 'AppsController');
Route::resource('tests', 'TestsController');