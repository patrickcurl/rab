@extends('layouts.master')

@section('content')

<div class="container" style="background-color: #6B9B65;padding-top: 10px;padding-bottom:10px;">
    {{ Form::open(array('action' => 'BookController@postSearchSingle', 'id' => 'price-books-form', 'class' => 'form-inline')) }}
      <div class='col-xs-12'>
		    <input name="isbns" type="tel" id="isbns" class="form-control input-lg" placeholder="Enter ISBNs separate by commas no spaces."  id="single-input"/>
      </div>
      <div class='col-xs-12' style="margin-top:5px;">
          <button type="submit" class="btn btn-danger btn-lg col-xs-12">Check Prices »</button>
      </div>
    {{ Form::close() }}
</div>

<?php
function floorToFraction($number, $denominator = 1)
{
    $x = $number * $denominator;
    $x = floor($x);
    $x = $x / $denominator;
    return $x;
}
?>

			@foreach ($books as $index => $book)
			<div class="container" style="background-color: #6B9B65;padding-top: 10px;padding-bottom:10px;">
				<div class="well" style="margin-top:10px;padding-bottom:10px;">
					<?php $tempbook = DB::table('single_prices')->where('isbn', '=', $book->isbn13)->first();/* $price = $tempbook->price; */

							$price = $tempbook->Price;
							$price = $price - ($price * .1);
							$price = floorToFraction($price, 2);

					    	$price = number_format($price, 2);
					    	?>
					<h3 class="alert-warning" style="font-size:15px;">{{ substr($book->title, 0, 30) }}...</h3>
					<div class="row">
						<div class="col-xs-4">
							<img src="<?php if ($book->image_url) {echo $book->image_url; } else {echo URL::asset('img/no_image.png'); } ?>"  class="img-thumbnail img-responsive" >
						</div>
						<div class="col-xs-7" style="padding-top:40px;"><span style="color:rgb(201, 90, 90);font-size:16px;">Buyback Price:</span> <span style="color:#317EAC;font-size:16px;font-weight:bold;">{{ $price }}</span>
						</div>
					</div>
					<dl class="dl-horizontal" style="display: inline-block !important; vertical-align: middle !important;">
						<dt class="col-xs-6">Author:</dt>
						<dd class="col-xs-4" style="margin-left:10px;">{{  $book->author }}</dd>

						<dt class="col-xs-6">Publisher:</dt>
						<dd class="col-xs-4" style="margin-left:10px;">{{  $book->publisher }}</dd>
						<dt class="col-xs-6">Edition:</dt>
						<dd class="col-xs-4" style="margin-left:10px;">{{  $book->edition }}</dd>
						<dt class="col-xs-6">Weight:</dt>
						<dd class="col-xs-4" style="margin-left:10px;">{{ number_format($book->weight, 2) }} lbs</dd>
						<dt class="col-xs-6">ISBN10:</dt>
						<dd class="col-xs-4" style="margin-left:10px;">{{ $book->isbn10 }} </dd>
						<dt class="col-xs-6">ISBN13:</dt>
						<dd class="col-xs-4" style="margin-left:10px;">{{ $book->isbn13 }}</dd>
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