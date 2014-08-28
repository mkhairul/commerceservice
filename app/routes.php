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

Route::get('/', function()
{
	return View::make('hello');
});

Route::match(array('GET', 'POST'), '/product/store', array('uses' => 'ProductController@store'));
Route::match(array('GET'), '/product/retrieve/{id?}', array('uses' => 'ProductController@retrieve'));
Route::match(array('GET'), '/product/remove/{id}', array('uses' => 'ProductController@remove'));