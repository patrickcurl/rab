<?php
class CartController extends BaseController {


		public function getIndex()
	{

		$cart = Cart::content();

		return View::make('cart.index', array('cart' => $cart));
	}

    public function postAdd(){
        $items = Input::get('item');
        $a = array();
        foreach($items as $item){

            if(isset($item['add']) && $item['add'] == "yes"){
                if ($item['id']){
                    $options = array(
                                'book_id' => $item['id'],
                                "title" => $item['title'],
                                "weight" => $item['weight'],
                                "isbn10" => $item['isbn10'],
                                "isbn13" => $item['isbn13'],
                                "image_url" => $item['image_url'],
                                "publisher" => $item['publisher'],
                                "author" => $item['author'],
                                "edition" => $item['edition']
                                     );


                    Cart::add($item['id'], $item['title'], $item['qty'], $item['price'], $options);
                }
            }
        }
        $cart = Cart::content();
        return Redirect::to('cart');
    }

	public function getRemove()
	{
		$itemId = Input::get('itemId');
		if ($itemId) { Cart::remove($itemId); }
		return Redirect::to('cart');

	}

	public function postUpdate()
	{
		$items = Input::get('items');
		foreach($items as $item)
		{
			Cart::update($item['id'], $item['qty']);
		}

		return Redirect::to('cart');
	}
	public function getEmpty()
	{
		Cart::destroy();
		Session::flash('message', '<strong>Cart has been emptied</strong>. Why not add something else?');
		return Redirect::to('/');
	}

	public function getCheckout(){
		$cart = Cart::content();

		if (Sentry::check()){
			return View::make('cart.checkout',
			                  			array(
			                  			      'cart' => $cart,
			                  			      'currentUser' => 	Sentry::getUser()
			                  ));

		} else {
			return View::make('users.login');
		}

	}

		public function getCheckoutComplete(){
		$currentUser = Sentry::getUser();

		$order = new Order;
		$order->user_id = $currentUser->id;
		$order->total_amount = Cart::total();
		$order->save();


		$cart = Cart::content();
		$weight = 0.0;
		foreach($cart as $item){
			$lineitem = new Item;
			$lineitem->book_id = $item->id;
			$lineitem->qty = $item->qty;
			$lineitem->price = $item->price;
			$lineitem->order_id = $order->id;
			$lineitem->save();
			$weight += number_format($item->options->weight,2);
		}
		//return var_dump($weight);
    $ups = getLabel($currentUser, $weight);
		$order->ups_label = $ups['label'];
    $order->tracking_number = $ups['tracking_number'];
		$order->save();
		Cart::destroy();
		return Redirect::to('/users/orders/' . $currentUser->getId());

	}


}