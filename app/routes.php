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

Route::group(array('domain' => 'single.rab.dev'), function()
{

    Route::get('/', function()
    {
    	return View::make('single');
        //
    });

});
Route::group(array('domain' => '{single}.recycleabook.com'), function()
{

    Route::get('/', function()
    {
    	return View::make('single');
        //
    });

});
Route::get('/', function()
{

	return View::make('index');
});

Route::get('test', function(){
        //echo Gremlindash::greeting();
        phpinfo();
});
Route::controller('users', 'UsersController');
Route::controller('books', 'BookController');
Route::controller('cart', 'CartController');
Route::controller('orders', 'OrdersController');
Route::controller('p','PageController');
Route::controller('admin', 'AdminController');

