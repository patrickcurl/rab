@extends('layouts.master')

@section('content')

@section('hero-start')
View Your
@stop
@section('hero-end')
Cart
@stop

		<div class="col-md-12"><h2>Checkout</h2>


	Welcome : {{ $currentUser->first_name }}
			<table class="table">
				<thead>
					<th>Item</th>
					<th>Price</th>
					<th>Qty</th>
					<th>Total</th>
				</thead>
				<tbody>
					@foreach($cart as $item)
					<tr>
						<td>



            <div class="span10">
              <h4>{{ $item->options->title }}</h4><br />
              </div>
              <div class="span3">
              <img src="{{ $item->options->image_url }}" width="175" class="img-responsive span3" />
					</div>

	              <dl class="dl-horizontal span8">
		              <dt>Author:</dt><dd>{{ $item->options->author }}</dd>
		              <dt>Publisher:</dt><dd>{{ $item->options->publisher }}</dd>
		              <dt>Edition:</dt><dd>{{ $item->options->edition }}</dd>
		              <dt>ISBN10:</dt><dd>{{ $item->options->isbn10 }}</dd>
		              <dt>ISBN13:</dt><dd>{{ $item->options->isbn13 }}</dd>
	              </dl>
	         </div>
            </td>
            <td>${{ $item->price }}</td>
            <?php if($item->qty > 5){ $qty = 5;} else { $qty = $item->qty; } ?>
            <td>{{ $qty }}</td>
            <td>${{ number_format($item->subtotal,2) }}</td>

					</tr>
					@endforeach
					<tr><td colspan="4"><div style="text-align:right;">
						<a href="{{ URL::to('cart') }}"><button type="button" name="edit_cart" class="btn btn-success">View Cart</button></a>
						<a href="{{ URL::to('users/edit') }}"><button type="button" name="edit_profile" class="btn btn-success">Edit Profile</button></a>
						<a href="{{ URL::to('cart/checkout-complete') }}"><button type="button" name="checkout_complete" class="btn btn-success">Complete Checkout</button></a>

					</div></td></tr>
				</tbody>
			</table>
		</div>
		<div class="span4">
			<table class="table table-bordered">
				<thead>
					<tr><th colspan="2">Customer Profile</th></tr>
				</thead>
				<tbody>
					<tr>
						<td>Name</td>
						<td>{{ $currentUser->first_name }} {{ $currentUser->last_name }}</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>{{ $currentUser->email }}</td>
					</tr>
					<tr>
						<td>Phone</td>
						<td>{{ $currentUser->phone }}</td>
					</tr>
					<tr>
						<td>Address</td>
						<td>{{ $currentUser->address }}</td>
					</tr>
					<tr>
						<td>City</td>
						<td>{{ $currentUser->city }}</td>
					</tr>
					<tr>
						<td>State</td>
						<td>{{ $currentUser->state }}</td>
					</tr>
					<tr>
						<td>Zip</td>
						<td>{{ $currentUser->zip }}</td>
					</tr>
					<tr>
						<td>Payment Method</td>
						<td>{{ $currentUser->payment_method }}</td>
					</tr>
					<tr>
						<td>Paypal Email</td>
						<td>{{ $currentUser->paypal_email }}</td>
					</tr>
				</tbody>

			 </table>

		</div>



@stop