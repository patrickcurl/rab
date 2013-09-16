<?php
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

$comm = User::getCommissions(9);
var_dump($comm);
?>