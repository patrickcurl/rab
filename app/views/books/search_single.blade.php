@extends('layouts.master')

@section('content')

<div class="container">

	<table class="table table-responsive">
		<thead>
			<tr>

				<th style="text-align:center;">Used Textbooks</th>
				<th>Price</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($books as $index => $book)

			<tr>
				<td class="col-md-8">
					<h2>{{ substr($book->title, 0, 110) }}...</h2>
					<img src="<?php if ($book->image_url) {echo $book->image_url; } else {echo URL::asset('img/no_image.png'); } ?>" width="200" height="300" class="img-thumbnail img-responsive">
					<dl class="dl-horizontal" style="display: inline-block !important; vertical-align: middle !important;">
			            <dt class="hidden-xs">Author:</dt><dd>{{  $book->author }}</dd>
			            <dt class="hidden-xs">Publisher:</dt><dd>{{  $book->publisher }}</dd>
			            <dt class="hidden-xs">Edition:</dt><dd class="hidden-xs">{{  $book->edition }}</dd>
			            <dt class="hidden-xs">Weight:</dt><dd>{{ number_format($book->weight, 2) }} lbs</dd>
			            <dt class="hidden-xs">ISBN10:</dt><dd>{{ $book->isbn10 }} </dd>
			            <dt class="hidden-xs">ISBN13:</dt><dd>{{ $book->isbn13 }}</dd>
			            <dt class="hidden-xs">More info:</dt><dd class="hidden-xs"><a href="{{ $book->amazon_url }}" target="_blank">View Book Details on Amazon</a></dd>
			        </dl>
			    </td>
			    <?php $tempbook = DB::table('single_prices')->where('isbn', '=', $book->isbn13)->first();/* $price = $tempbook->price; */
			    	$price = number_format(($tempbook->Price), 2);

			     ?>
			     <td>{{ $price; }}</td>

			</tr>
	    	@endforeach

		</tbody>


	</table>

	<div class="col-xs-12 col-sm-12 col-md-12">

</div> <!-- sell your textbooks -->
	<div class="col-xs-12 col-md-12 clearfix pullright">
</div>
</div>

@stop