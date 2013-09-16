@extends('layouts.master')

@section('content')

<div class="container">
{{ Form::open(array('action' => 'CartController@postAdd', 'method' => 'post')) }}
	<table class="table table-responsive">
		<thead>
			<tr>

				<th style="text-align:center;">Used Textbooks</th>
				<th>Price</th>
				<th>Qty</th>
				<th>Add to Cart</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($books as $index => $book)

			<tr>
				<td>

			           <div class="col-md-9 cart-checkout">
              <h4 style="color:#06FF56;">{{ $book->title }}</h4><br />
              <img src="{{ $book->image_url }}" width="175" class="img-responsive col-md-3" />


	              <dl class="col-md-8 dl-horizontal cart-dl">
		              <dt>Author:</dt><dd>{{ $book->author }}</dd>
		              <dt>Publisher:</dt><dd>{{ $book->publisher }}</dd>
		              <dt>Edition:</dt><dd>{{ $book->edition }}</dd>
		              <dt>Weight:</dt><dd>{{ number_format($book->weight, 2) }} lbs</dd>
		              <dt>ISBN10:</dt><dd>{{ $book->isbn10 }}</dd>
		              <dt>ISBN13:</dt><dd>{{ $book->isbn13 }}</dd>
		              <dt class="hidden-xs">More info:</dt><dd class="hidden-xs"><a href="{{ $book->amazon_url }}" target="_blank">View Book Details on Amazon</a></dd>
	              </dl>
	         </div>
			    </td>
			    <?php
			    	$multiplier = 1.65;
			    	$aff = Input::get('aff');
			    	if(isset($aff)){
			    		$referrer = User::where('username', '=', $aff)->first();
			    		if (isset($referrer)){
			    			$multiplier = number_format($referrer->price_level, 2);
			    		}

			    	}
			    	var_dump($multiplier);
			    	$tempbook = DB::table('retail_prices')->where('isbn', '=', $book->isbn13)->first();
			    	$price = number_format(($tempbook->Price * $multiplier), 2);

			     ?>
			    <td><input type="hidden" name="item[{{$index}}][price]" value="{{$price}}" />{{ $price }}</td>
			    <td><input type="text" name="item[{{$index}}][qty]" value="1" maxlength="3" style="width:25px;" /></td>
				<td><input type="checkbox" name="item[{{$index}}][add]" value="yes" checked="checked"/></td>

				<input type="hidden" name="item[{{$index}}][id]" value="{{ $book->id }}" />
                 <input type="hidden" name="item[{{$index}}][title]" value="{{ $book->title }}" />
                 <input type="hidden" name="item[{{$index}}][weight]" value="{{ $book->weight }}" />

                 <input type="hidden" name="item[{{$index}}][image_url]" value="{{ $book->image_url }}" />
                 <input type="hidden" name="item[{{$index}}][author]" value="{{ $book->author }}" />
                 <input type="hidden" name="item[{{$index}}][publisher]" value="{{ $book->publisher }}" />
                 <input type="hidden" name="item[{{$index}}][edition]" value="{{ $book->edition }}" />
                 <input type="hidden" name="item[{{$index}}][isbn10]" value="{{ $book->isbn10 }}" />
                 <input type="hidden" name="item[{{$index}}][isbn13]" value="{{ $book->isbn13 }}" />


			</tr>
	    	@endforeach

		</tbody>


	</table>

	<div class="col-xs-12 col-sm-12 col-md-12">
<button type="submit" class="col-xs-12 col-sm-12 col-md-12 btn btn-cart btn-lg">Add Items to Cart</button>

</div>{{ Form::close() }} <!-- sell your textbooks -->
	<div class="col-xs-12 col-md-12 clearfix pullright"><p>* Textbook buyback price is good for "U.S. STUDENT", "Instructor", "Exam Copy", or "Not for re-sale" editions. <br />"Annotated instructors editions" will be purchased at a 50% discount. <br />Textbook prices quoted are for textbooks in "good condition" or better, see condition guide for details.</p>
<p>We do not currently purchase INTERNATIONAL edition textbooks.</p>

</div>
</div>

@stop