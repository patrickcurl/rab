
<?php
$isbns = array('10' => '0440243831', '13' => '9780440243830');
foreach($isbns as $iNum)
                  {
                    if(isset($iNum))
                    {
                      if(strlen($iNum) == 10)
                      {
                        // $book->isbn10 = $iNum;
                        echo $iNum;
                      } elseif(strlen($iNum) == 13)
                      {
                        // $book->isbn13 = $iNum;
                        echo $iNum;
                      }

                    }
                  }
// $book_info = Book::getBook('0440243831');
// $isbns = array('10' => $book_info['isbn10'], '13' => $book_info['isbn13']);
// $book = Book::bookExists($isbns);
// var_dump($book);
// $client = new Guzzle\Http\Client('http://blog.recycleabook.com/api/');
// 	    	$request = $client->get('get_post/?slug=bitcoin-friend-or-foe');
// 	   		$response = $request->send();
// 	    	$data = $response->json();


// 	    var_dump($data);
// $book = Book::find_or_create('0440243831');
// $book = self::bookExists($isbns);

//echo $book->Items->Item->ItemAttributes->ISBN;
// use Guzzle\Http\Client;

// $client = new Client('http://blog.recycleabook.com/api/');
// $request = $client->get('get_recent_posts/?count=6');
// //echo $request->getUrl();
// $response = $request->send();
// $data = $response->json();
// var_dump($data['posts'][0]);
// $request = Requests::get('http://blog.recycleabook.com/api/get_recent_posts/?count=6', array('Accept' => 'application/json'));


// var_dump($request->status_code);
// var_dump($request->headers['content-type']);
// var_dump($request->body);

// function floorToFraction($number, $denominator = 1)
// {
//     $x = $number * $denominator;
//     $x = floor($x);
//     $x = $x / $denominator;
//     return $x;
// }

// echo floorToFraction(50.51, 2) . "-- 50.51 <br />";
// echo floorToFraction(50.59, 2) . "-- 50.59 <br />";
// echo floorToFraction(50.99, 2) . "-- 50.99 <br />";
// echo floorToFraction(50.49, 2) . "-- 50.51 <br />";

// $num = 50.00;
// for($i=0;$i<100;$i++){
// 	echo floorToFraction($num, 2) . "-- {$num} <br />";
// 	$num = $num + .01;
// }
//


// $refs = User::find(9)->refs()->get();
// $pending_orders_total = 0.00;
// $pending_orders_count = 0;
// $accepted_orders_total = 0.00;
// $accepted_orders_count = 0;
// $total_orders_count = 0;
// $total_orders_amount = 0.00;
// foreach($refs as $ref){
// 	$orders = $ref->orders()->get();

// 	 foreach ($orders as $order) {
// 	 	//var_dump($order);
// 	 	if ($order->received_date == null){
// 	 		$pending_orders_total += $order->total_amount;
// 	 		$pending_orders_count += 1;
// 	 		// echo "{$order->total_amount} - {$order->received_date} <br />";
// 	 	}

// 	 	if ($order->received_date != null){
// 	 		$accepted_orders_total += $order->total_amount;
// 	 		$accepted_orders_count += 1;
// 	 		// echo "{$order->total_amount} - {$order->received_date} <br />";
// 	 	}
// 	 	$total_orders_count += 1;
// 	 	$total_orders_amount += $order->total_amount;

// 	 }
// }

// echo "{$pending_orders_total}<br />";
// echo "{$pending_orders_count}<br />";
// echo "{$accepted_orders_total}<br />";
// echo "{$accepted_orders_count}<br />";
// echo "{$total_orders_amount}<br />";
// echo "{$total_orders_count}<br />";
//

// $comm = User::getCommissions(9);
// var_dump($comm);
//

// $b = Book::getBook('0802404936');
// var_dump($b);
// $c = Book::find_or_create('0802404936');
// var_dump($c);
?>