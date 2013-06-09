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

Route::get('about', function () {
	return View::make('about');
});

Route::get('login', function () {
	return View::make('login');
});

Route::get('pricing', function () {
	return View::make('pricing');
});

App::missing(function($exception)
{
    return Response::view('errors-404', array(), 404);
});

Route::post('api/v1/controller', 'APIController@storeController');
Route::post('api/v1/controller/screenshot', 'APIController@storeScreenshot');
Route::get('api/v1/tests', 'APIController@showTests');

Route::get('api/v1/tests/{id}/view', 'APIController@testView');
Route::get('api/v1/tests/{id}/goal', 'APIController@testGoal');

Route::resource('apps', 'AppsController');
Route::resource('tests', 'TestsController');