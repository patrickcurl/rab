@extends('layouts.master')

{{-- Web site Title --}}
@section('title')
@parent
Edit Profile
@stop

{{-- Content --}}
@section('content')
<div class="row-fluid">
	<div class="span5">
		<h4 class="offset2">Edit
			@if ($user->email == Sentry::getUser()->email)
				Your
			@else
				{{ $user->email }}'s
			@endif
			Profile
		</h4>
		<br />
		{{ Form::open(array('action' => array('UsersController@postEdit', $user->id, 'profile'), 'method' => 'POST', 'class' => 'form-horizontal', 'role'=>'form')) }}
			<div class="control-group <?php if($errors->has('first_name')){echo "alert alert-danger";} ?>">
				<label for="first_name" class="control-label">First Name</label>
					<div class="controls">
						{{Form::text('first_name', $user->first_name, array('class' => '')) }}

  			     		@foreach($errors->get('first_name') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach

				    </div>
				</div>
			<div class="control-group <?php if($errors->has('last_name')){echo "alert alert-danger";} ?>">
			    <label for="last_name" class="control-label">Last Name</label>
			    <div class="controls">

			      {{ Form::text('last_name', $user->last_name, array('class' => 'form-control')) }}

			     		@foreach($errors->get('last_name') as $message)
			     			<p class="alert-danger">{{$message}}</p>
			     		@endforeach

			    </div>
			</div>

				<div class="control-group <?php if($errors->has('email')){echo "alert alert-danger";} ?>">
				    <label for="email" class="control-label">EMail</label>
				    <div class="controls">

				      {{Form::email('email', $user->email, array('class' => 'form-control')) }}

  			     		@foreach($errors->get('email') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach

				    </div>
				</div>


				<div class="control-group <?php if($errors->has('phone')){echo "alert alert-danger";} ?>">
				    <label for="phone" class="control-label">Phone</label>
				    <div class="controls">

				      {{Form::text('phone', $user->phone, array('class' => 'form-control')) }}

  			     		@foreach($errors->get('phone') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach

				    </div>
				</div>

				<div class="control-group <?php if($errors->has('address')){echo "alert alert-danger";} ?>">
				    <label for="address" class="control-label">Address</label>
				    <div class="controls">

				      {{Form::text('address', $user->address, array('class' => 'form-control')) }}

  			     		@foreach($errors->get('address') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach

				    </div>
				</div>

				<div class="control-group <?php if($errors->has('city')){echo "alert alert-danger";} ?>">
				    <label for="city" class="control-label">City</label>
				    <div class="controls">

				      {{Form::text('city', $user->city, array('class' => 'form-control')) }}

  			     		@foreach($errors->get('city') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach

				    </div>
				</div>

				<div class="control-group <?php if($errors->has('state')){echo "alert alert-danger";} ?>">
				    <label for="state" class="control-label">State</label>
				    <div class="controls">


				      {{ Form::select('state', $state_list, $user->state, array('class' => 'form-control')) }}

  			     		@foreach($errors->get('state') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach

				    </div>
				</div>


				<div class="control-group <?php if($errors->has('zip')){echo "alert alert-danger";} ?>">
				    <label for="zip" class="control-label">Zip code</label>
				    <div class="controls">

				      {{Form::text('zip', $user->zip, array('class' => 'form-control')) }}

				      @foreach($errors->get('zip') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach

				    </div>
				</div>

				<div class="control-group <?php if($errors->has('payment_method')){echo "alert alert-danger";} ?>">
				    <label for="payment_method" class="control-label">Payment Method</label>
				    <div class="controls">

						<label class="radio checkbox-inline">
									@if ($user->payment_method == "Check")
											<input type="radio" name="payment_method" name="payment_method" value="Check" checked="checked"/>Check
									@else
											<input type="radio" name="payment_method" name="payment_method" value="Check"/>Check
									@endif
							</label>
							<label class="radio checkbox-inline">
									@if ($user->payment_method == "Paypal")
										<input type="radio" name="payment_method" name="payment_method" value="Paypal" checked="checked" />Paypal
									@else
										<input type="radio" name="payment_method" name="payment_method" value="Paypal" />Paypal
									@endif
							</label>

  			     		@foreach($errors->get('payment_method') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach

				    </div>
				</div>
				<div class="control-group <?php if($errors->has('paypal_email')){echo "alert alert-danger";} ?>">
				    <label for="paypal_email" class="control-label">Paypal Email</label>
				    <div class="controls">

				      {{Form::text('paypal_email', $user->paypal_email, array('class' => 'form-control')) }}

  			     		@foreach($errors->get('paypal_email') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach

				    </div>
				</div>

				<div class="control-group <?php if($errors->has('name_on_cheque')){echo "alert alert-danger";} ?>">
				    <label for="name_on_cheque" class="control-label">Name on Cheque</label>
				    <div class="controls">

				      {{Form::text('name_on_cheque', $user->name_on_cheque, array('class' => 'form-control')) }}

  			     		@foreach($errors->get('name_on_cheque') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach

				    </div>
				</div>




	<button type="submit" class="btn btn-cart span10" >Edit Profile</button>

			{{ Form::close() }}
		</div>

		<div class="span6">
	<h4 class="offset1">Change Password</h4>

		<form class="form-horizontal" action="{{ URL::to('users/edit') }}/{{ $user->id }}/password" method="post">
	        {{ Form::token() }}


	    	<div class="control-group <?php if($errors->has('oldPassword')){echo "alert alert-danger";} ?>">
				<label for="oldPassword" class="control-label">Old Password</label>
				<div class="controls">
					<input type="password" class="form-control" name="oldPassword" id="oldPassword" placeholder="Old Password" >
					<p class="alert-danger">{{ ($errors->has('oldPassword') ? $errors->first('oldPassword') : '') }}</p>
				    </div>
				</div>

			<div class="control-group <?php if($errors->has('password')){echo "alert alert-danger";} ?>">
				<label for="password" class="control-label">New Password</label>
				<div class="controls">
					<input type="password" class="form-control" name="password" id="password" placeholder="New Password" >
					<p class="alert-danger">{{ ($errors->has('password') ? $errors->first('password') : '') }}</p>
				</div>
			</div>

			<div class="control-group <?php if($errors->has('password_confirmation')){echo "alert alert-danger";} ?>">
				<label for="password_confirmation" class="control-label">Confirm Password</label>
				<div class="controls">
					<input type="password_confirmation" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm New Password" >
					<p class="alert-danger">{{ ($errors->has('password_confirmation') ? $errors->first('password_confirmation') : '') }}</p>
				</div>
			</div>



		   <button type="submit" class="btn btn-cart span12" >Change Password</button>

	{{ Form::close() }}
	@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
	<div class="row">
	<br /><br />
	<h4 class="offset1" >Authorized Groups</h4>

	    <form class="form-horizontal" action="{{ URL::to('users/edit') }}/{{ $user->id }}/auth" method="post">
	        {{ Form::token() }}

	        <table class="table">
	            <thead>
	                <th>Group</th>
	                <th>Authorized?</th>
	            </thead>
	            <tbody>
	                @foreach ($allGroups as $group)
	                    <tr>
	                        <td>{{ $group->name }}</td>
	                        <td>
	                            <div class="switch" data-on-label="In" data-on='info' data-off-label="Out">
	                                <input name="permissions[{{ $group->id }}]" type="checkbox" {{ ( $user->inGroup($group)) ? 'checked' : '' }} >
	                            </div>
	                        </td>
	                    </tr>
	                @endforeach
	            </tbody>
	        </table>

	         <button type="submit" class="btn btn-cart span12" >Update Authorizations</button>
	   {{ Form::close() }}
	</div>
	</div>
	@endif

</div>
@stop