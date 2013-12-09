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

$domains = array('rab.dev', 'recycleabook.com', 'textbooks911.com');
foreach($domains as $d){
    Route::group(array('domain' => 'single.'.$d), function()
    {

        Route::get('/', function()
        {
            return View::make('single.index');
            //
        });

    });
    Route::group(array('domain' => 'rat.'.$d), function()
    {

        Route::get('/', function()
        {
            return View::make('rat.index');
            //
        });

    });
}
Route::post('books/search', 'BookController@postSearch');
// Route::group(array('domain' => 'single.rab.dev'), function()
// {

//     Route::get('/', function()
//     {
//     	return View::make('single.index');
//         //
//     });

// });
// Route::group(array('domain' => 'single.recycleabook.com'), function()
// {

//     Route::get('/', function()
//     {
//     	return View::make('single.index');
//         //
//     });

// });
// Route::group(array('domain' => 'rat.rab.dev'), function()
// {

//     Route::get('/', function()
//     {
//         return View::make('rat.index');
//         //
//     });

// });
// Route::group(array('domain' => 'rat.recycleabook.com'), function()
// {

//     Route::get('/', function()
//     {
//         return View::make('rat.index');
//         //
//     });

// });
Route::get('/', function()
{


    return View::make('index');
});
Route::get('pdf/{id}', function($id){
    Config::set('laravel-debugbar::enabled', false);
        $order =  Order::find($id);
        if(Sentry::check())
        {
            $cUser = Sentry::getUser();
            if($cUser->hasAccess('admin') || $cUser->id == $order->user->id)
            {
                $data = array();

                $data['order'] = $order;
                $data['user'] = $order->user;
                $data['items'] = DB::table('items')->join('books', function($join){$join->on('books.id', '=', 'items.book_id');})->where('order_id','=',$id)->get();
                $data['orderTotal'] = number_format($order->total_amount, 2);
                $label = imagecreatefromstring(base64_decode($order->ups_label));
                $rotated_imaged = imagerotate($label, -90, 0);
                $label_path = "uploads/label-{$order->id}.png";
                imagepng($rotated_imaged, public_path($label_path));
                        $data['label'] = $label_path;
                return PDF::loadView("orders.print", $data)->stream("OrderNumber_{$order->id}.pdf");
            } else
            {
                return Redirect::to('users/login')->with('message', 'You are not authorized to view that label.');
            }
        } else
        {
            return Redirect::to('users/login')->with('message', 'You must be logged in to print labels');
        }





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
Route::get('atest', function(){

        //echo Gremlindash::greeting();
        //phpinfo();
    return View::make('atest');
});
route::group(array('prefix' => 'api/v1'), function(){
        Route::resource('supplies', 'api\SuppliesController');
        Route::resource('sorders', 'api\SupplyOrdersController');
});

Route::controller('users', 'UsersController');
Route::controller('books', 'BookController');
Route::controller('book', 'BookController');
Route::controller('cart', 'CartController');
Route::controller('orders', 'OrdersController');
Route::controller('p','PageController');
Route::controller('admin', 'AdminController');
Route::controller('office', 'BuyerController');
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
     return Redirect::to('p/privacy-policy');
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

