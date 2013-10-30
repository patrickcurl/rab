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
Route::get('pdf/{id}', function($id){
    Config::set('laravel-debugbar::enabled', false);
    if(!Sentry::check()){return View::make('errors.403');} else{
        $data = array();
        $order =  Order::find($id);
        $data['order'] = $order;
        $data['user'] = $order->user;
        $data['items'] = DB::table('items')->join('books', function($join){$join->on('books.id', '=', 'items.book_id');})->where('order_id','=',$id)->get();
        $data['orderTotal'] = number_format($order->total_amount, 2);
        $label = imagecreatefromstring(base64_decode($order->ups_label));
        $rotated_imaged = imagerotate($label, -90, 0);
        $label_path = "uploads/label-{$order->id}.png";
        imagepng($rotated_imaged, public_path($label_path));
        $data['label'] = $label_path;






        //return View::make('orders.print', $data);
        //download('orderNumber'.$id.'.pdf')
        return PDF::loadView("orders.print", $data)->stream("OrderNumber_{$order->id}.pdf");
    }



    $pdf = PDF::loadHTML('<h1>Test</h1>');
    return $pdf->download('test.pdf');
    $input = "http://en.wikipedia.org/w/index.php?title=Jakarta&printable=yes";
    // $output = new TempFile();
    // $instance = new Converter(new PhantomJS(), $input, $output);
    // $output->save(public_path('uploads/file.pdf'));

   // return PDF::url($input);
});
Route::get('print/{id}', function($id){
    Config::set('laravel-debugbar::enabled', false);
    if(!Sentry::check()){return View::make('errors.403');} else{
        $data = array();
        $order =  Order::find($id);
        $data['order'] = $order;
        $data['user'] = $order->user;
        $data['items'] = DB::table('items')->join('books', function($join){$join->on('books.id', '=', 'items.book_id');})->where('order_id','=',$id)->get();
        $data['orderTotal'] = number_format($order->total_amount, 2);
       // $ups_label = "";

        define('ORDERS_DIR', public_path('uploads/orders')); // I define this in a constants.php file

        if (!is_dir(ORDERS_DIR)){
            mkdir(ORDERS_DIR, 0755, true);
        }

        $pdfPath = ORDERS_DIR.'/'.$order->id.'.pdf';
/*
        $html = "<html><head><style>.page { page-break-before:always; }</style></head><body><div class='page-first'><img src='data:image/gif;base64,$order->ups_label' width='651' style='transform: rotate(90deg);-webkit-transform: rotate(90deg); -ms-transform: rotate(90deg);-moz-transform: rotate(90deg);margin-left:551px;margin-top:100px;'/></div>

            <div class='page'><div class=\"row-fluid\">
<h1>Packing Slip</h1>
<table>
  <tr>
    <td style=\"padding-right:20px;\"><strong>Ship To:</strong></td>
    <td style=\"width: 400px\">
                <br />RecycleABook.com
                <br />Attn: Chris Harbaugh
                <br />561 Congress Park Dr
                <br />Dayton, OH 45459</td>
                </td>
    <td style=\"padding-right:20px;\"><strong>Ship From:</strong></td>
    <td>
               <br /> $user->first_name $user->last_name
                <br />$user->address
                <br />$user->city, $user->state   $user->zip </td>

</tr></table>


<table class=\"table container col-md-12\">
                  <tr>
                    <td>Book</td>
                    <td>QTY</td>
                    <td>Price</td>
                  </tr>

              </table>

</div>
<div class=\"well offset8 span2\"><strong>Total: </strong>$ <?php // echo $orderTotal; ?></div>

@endif</div></body></html>";
*/
       // File::put($pdfPath, PDF::load($html, 'A4', 'portrait')->output());
        return View::make('orders.print', $data);
       // return Redirect::to(URL::to($url));
        // return PDF::load($html, 'A4', 'portrait')->show();
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