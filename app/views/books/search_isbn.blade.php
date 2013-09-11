
@if($book)
<?php $tempbook = DB::table('retail_prices')->where('isbn', '=', $book->isbn13)->first();/* $price = $tempbook->price; */
			    	$price = number_format(($tempbook->Price * 1.7), 2);

			     ?>
<?xml version="1.0" encoding="ISO-8859-15"?>
<books><details><title>{{ $book->title }}</title><author>{{ $book->author }}</author><image>{{ $book->image_url }}</image><isbn>{{ $book->isbn13 }}</isbn><buyback>{{ $price }}</buyback></details></books>
@endif