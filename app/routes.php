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
    	return View::make('single.index');
        //
    });

});
Route::group(array('domain' => 'single.recycleabook.com'), function()
{

    Route::get('/', function()
    {
    	return View::make('single.index');
        //
    });

});
Route::get('/', function()
{


    return View::make('index');
});

// Route::get('p/join-our-team', function(){
//     return Redirect::to('p/join_our_team');
// });

Route::get('isbn-results','BookController@getIsbnResults');
Route::get('search_isbn.php', 'BookController@searchISBN');

Route::get('test', function(){
        //echo Gremlindash::greeting();
        //phpinfo();
	return View::make('test');
});
route::group(array('prefix' => 'api/v1'), function(){
        Route::resource('supplies', 'api\SuppliesController');
});

Route::controller('users', 'UsersController');
Route::controller('books', 'BookController');
Route::controller('book', 'BookController');
Route::controller('cart', 'CartController');
Route::controller('orders', 'OrdersController');
Route::controller('p','PageController');
Route::controller('admin', 'AdminController');
Route::controller('blog', 'BlogController');
Route::controller('supplies', 'SuppliesController');

//Fix 404's
Route::get('wp-login.php', function(){
    return Redirect::to('http://blog.recycleabook.com/wp-login.php');
});
Route::get('wp-admin', function(){
    return Redirect::to('http://blog.recycleabook.com/wp-admin');
});
Route::get('tag/{slug}', function($slug){
    return Redirect::to('http://blog.recycleabook.com/tag/' . $slug);
});
Route::get('privacy-policy', function(){
    return Redirect::to('http://blog.recycleabook.com/privacy-policy');
});
Route::get('{slug1}/{slug2}', function($slug1, $slug2){
    if(isset($slug2)){
        $post = BlogController::blogJson("get_post/?slug={$slug2}");
            if(isset($post['status']) &&  $post['status'] == "error"){
                View::make('errors.404');
            } else{
                return View::make("pages.blog_single", array('post' => $post['post']));
            }
    } else {
        return View::make('index');
    }
});
Route::get('{slug1}', function($slug1){
    if(isset($slug1)){
        $post = BlogController::blogJson("get_post/?slug={$slug1}");
            if(isset($post['status']) &&  $post['status'] == "error"){
                View::make('errors.404');
            } else{
                return View::make("pages.blog_single", array('post' => $post['post']));
            }
    } else {
        return View::make('index');
    }

});