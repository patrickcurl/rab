@extends('rat.master')
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
							<table class="table">
								<tr>
									<td width="20%"><img src="<?php if ($book->image_url) {echo $book->image_url; } else {echo URL::asset('img/no_image.png'); } ?>"  style="display: block;max-width: 120px;height: auto;"></td>
									<td>
									<span style="background-color: #329911;">
									<span style="color: #F6FF17;">Buyback Price:</span> <span style="color: #0AFD13;font-weight:bold;">${{number_format(($book->singlePrice * 2),2) }}</span></span><br />
									<strong>Author:</strong>{{  $book->author }}<br />

									<strong>Publisher:</strong>{{  $book->publisher }}<br />
									<strong>Edition:</strong>{{  $book->edition }}<br />
									<strong>Weight:</strong>{{ number_format($book->weight, 2) }} lbs<br />
									<strong>ISBN10:</strong>{{ $book->isbn10 }}<br />
									<strong>ISBN13:</strong>{{ $book->isbn13 }}<br />

									</td>
								</tr>

							</table>

					</div>






			     @endforeach
@stop