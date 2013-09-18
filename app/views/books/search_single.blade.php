@extends('layouts.master')
@section('container_class')
class="container-fluid page-content"
@stop
@section('content')


    {{ Form::open(array('action' => 'BookController@postSearchSingle', 'id' => 'price-books-form', 'class' => 'form-inline')) }}
      <div class='col-xs-12' style="margin-top:10px;">
		    <input name="isbns" type="tel" id="isbns" class="form-control input-lg" placeholder="Enter ISBNs separate by commas no spaces."  id="single-input"/>
      </div>
      <div class='col-xs-12' style="margin-top:5px;">
          <button type="submit" class="btn btn-cart btn-lg col-xs-12">Check Prices »</button>
      </div>
      <br />
    {{ Form::close() }}





			@foreach ($books as $index => $book)

				<div class="well" style="margin:10px;padding:10px;background-color: rgb(139, 139, 66)">
					<?php //$tempbook = DB::table('single_prices')->where('isbn', '=', $book->isbn13)->first();/* $price = $tempbook->price; */

						//	$price = $tempbook->Price;
						//	$price = $price - ($price * .1);
						//	$price = floorToFraction($price, 2);


					    	?>
					<h3 class="alert-warning" style="font-size:15px;">{{ substr($book->title, 0, 50) }}...</h3>
					<div class="row">
						<div class="col-xs-4">
							<img src="<?php if ($book->image_url) {echo $book->image_url; } else {echo URL::asset('img/no_image.png'); } ?>"  class="img-thumbnail img-responsive" >
						</div>
						<div class="col-xs-7" style="padding-top:40px;"><span style="color:rgb(255, 245, 0);font-size:16px;">Buyback Price:</span> <span style="color:#06FF56;font-size:16px;font-weight:bold;">${{number_format($book->singlePrice,2) }}</span>
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




			     @endforeach

	<div class="col-xs-12 col-sm-12 col-md-12">

</div> <!-- sell your textbooks -->
	<div class="col-xs-12 col-md-12 clearfix pullright">
</div>

@stop