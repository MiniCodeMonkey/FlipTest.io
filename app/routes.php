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

// Home page
Route::get('/', 'HomeController@showIndex');

// Simple pages
Route::get('contact', function () {
	return View::make('contact');
});

Route::get('start', function () {
	return View::make('start');
});

Route::get('learn', function () {
	return View::make('learn');
});

Route::get('about', function () {
	return View::make('about');
});

Route::get('pricing', function () {
	return View::make('pricing');
});

// API Endpoints
Route::post('api/v1/controller', 'APIController@storeController');
Route::post('api/v1/controller/screenshot', 'APIController@storeScreenshot');
Route::get('api/v1/tests', 'APIController@showTests');

Route::get('api/v1/tests/{id}/view', 'APIController@testView');
Route::get('api/v1/tests/{id}/goal', 'APIController@testGoal');

// Authentication
Route::controller('auth', 'AuthController');

// Authenticated controllers
Route::group(array('before' => 'auth'), function() {
	Route::resource('apps', 'AppsController');
	Route::resource('tests', 'TestsController');
	Route::get('tests/{id}/stop', 'TestsController@stop');
});

// 404
App::missing(function($exception)
{
    return Response::view('errors-404', array(), 404);
});