@extends('layouts.master')

@section('content')

<div class="container" style="background-color: #6B9B65;">

			@foreach ($books as $index => $book)
			<?php $tempbook = DB::table('single_prices')->where('isbn', '=', $book->isbn13)->first();/* $price = $tempbook->price; */
			    	$price = number_format(($tempbook->Price), 2);
			    	?>
			    	<h3 class="alert-warning">{{ substr($book->title, 0, 110) }}...</h3>
			<div class="col-xs-12">
			<div class="container-fluid">

					<img src="<?php if ($book->image_url) {echo $book->image_url; } else {echo URL::asset('img/no_image.png'); } ?>" width="200" height="300" class="img-thumbnail img-responsive">
			</div>
			</div>
			<div class="col-xs-12 well" style="margin-top:10px;">
					<dl class="dl-horizontal" style="display: inline-block !important; vertical-align: middle !important;">
						<dt class="col-xs-6" style="color:rgb(201, 90, 90);font-size:16px;">Buyback Price:</dt>
						<dd class="col-xs-4" style="color:#317EAC;font-size:16px;font-weight:bold;margin-left:10px;">{{ $price }}</dd>
			            <dt class="col-xs-6">Author:</dt><dd class="col-xs-4" style="margin-left:10px;">{{  $book->author }}</dd>
			            <dt class="col-xs-6">Publisher:</dt><dd class="col-xs-4" style="margin-left:10px;">{{  $book->publisher }}</dd>
			            <dt class="col-xs-6">Edition:</dt><dd class="col-xs-4" style="margin-left:10px;">{{  $book->edition }}</dd>
			            <dt class="col-xs-6">Weight:</dt><dd class="col-xs-4" style="margin-left:10px;">{{ number_format($book->weight, 2) }} lbs</dd>
			            <dt class="col-xs-6">ISBN10:</dt><dd class="col-xs-4" style="margin-left:10px;">{{ $book->isbn10 }} </dd>
			            <dt class="col-xs-6">ISBN13:</dt><dd class="col-xs-4" style="margin-left:10px;">{{ $book->isbn13 }}</dd>
			            <dt class="col-xs-6">More info:</dt><dd class="col-xs-4" style="margin-left:10px;"><a href="{{ $book->amazon_url }}" target="_blank">View Book Details on Amazon</a></dd>
			        </dl>
</div>

			    </div>


			     @endforeach

	<div class="col-xs-12 col-sm-12 col-md-12">

</div> <!-- sell your textbooks -->
	<div class="col-xs-12 col-md-12 clearfix pullright">
</div>
</div>

@stop