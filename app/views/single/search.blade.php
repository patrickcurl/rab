@extends('single.master')
@section('content')

@foreach ($books as $index => $book)


					<?php //$tempbook = DB::table('single_prices')->where('isbn', '=', $book->isbn13)->first();/* $price = $tempbook->price; */

						//	$price = $tempbook->Price;
						//	$price = $price - ($price * .1);
						//	$price = floorToFraction($price, 2);


					    	?>

					<div class="row-fluid">
						<div class="span12">
							<h3 class="alert-warning" style="font-size:15px;">{{ substr($book->title, 0, 50) }}...</h3>
						</div>
						</div>
						<div class="row-fluid">
							<div class="span2">
								<img src="<?php if ($book->image_url) {echo $book->image_url; } else {echo URL::asset('img/no_image.png'); } ?>"  style="display: block;max-width: 120px;height: auto;" class="span4">
						</div>
						<div class="span7" ><span style=";font-size:16px;">Buyback Price:</span> <span style="font-size:16px;font-weight:bold;">${{number_format($book->singlePrice,2) }}</span>

						<dl class="dl-horizontal" >
						<dt>Author:</dt>
						<dd>{{  $book->author }}</dd>

						<dt>Publisher:</dt>
						<dd>{{  $book->publisher }}</dd>
						<dt>Edition:</dt>
						<dd>{{  $book->edition }}</dd>
						<dt>Weight:</dt>
						<dd>{{ number_format($book->weight, 2) }} lbs</dd>
						<dt>ISBN10:</dt>
						<dd>{{ $book->isbn10 }} </dd>
						<dt>ISBN13:</dt>
						<dd>{{ $book->isbn13 }}</dd>
					</dl>
						</div>
					</div>





			     @endforeach
@stop