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

Route::get('test', function(){
        //echo Gremlindash::greeting();
        phpinfo();
});
Route::controller('users', 'UserController');
Route::controller('books', 'BookController');
Route::controller('cart', 'CartController');
