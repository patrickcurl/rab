@extends('layouts.master')

{{-- Web site Title --}}
@section('title')
@parent
Edit Profile
@stop

{{-- Content --}}
@section('content')
<div class="container">
	<div class="col-md-6">
		<h4 class="col-md-offset-1">Edit
			@if ($user->email == Sentry::getUser()->email)
				Your
			@else
				{{ $user->email }}'s
			@endif
			Profile
		</h4>
		<br />
		{{ Form::open(array('action' => array('UsersController@postEdit', $user->id, 'profile'), 'method' => 'POST', 'class' => 'form-horizontal', 'role'=>'form')) }}
			<div class="form-group <?php if($errors->has('first_name')){echo "alert alert-danger";} ?>">
				<label for="first_name" class="col-lg-4 control-label">First Name</label>
					<div class="col-lg-6">
						{{Form::text('first_name', $user->first_name, array('class' => 'form-control')) }}

  			     		@foreach($errors->get('first_name') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach

				    </div>
				</div>
			<div class="form-group <?php if($errors->has('last_name')){echo "alert alert-danger";} ?>">
			    <label for="last_name" class="col-lg-4 control-label">Last Name</label>
			    <div class="col-lg-6">

			      {{ Form::text('last_name', $user->last_name, array('class' => 'form-control')) }}

			     		@foreach($errors->get('last_name') as $message)
			     			<p class="alert-danger">{{$message}}</p>
			     		@endforeach

			    </div>
			</div>

				<div class="form-group <?php if($errors->has('email')){echo "alert alert-danger";} ?>">
				    <label for="email" class="col-lg-4 control-label">EMail</label>
				    <div class="col-lg-6">

				      {{Form::email('email', $user->email, array('class' => 'form-control')) }}

  			     		@foreach($errors->get('email') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach

				    </div>
				</div>


				<div class="form-group <?php if($errors->has('phone')){echo "alert alert-danger";} ?>">
				    <label for="phone" class="col-lg-4 control-label">Phone</label>
				    <div class="col-lg-6">

				      {{Form::text('phone', $user->phone, array('class' => 'form-control')) }}

  			     		@foreach($errors->get('phone') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach

				    </div>
				</div>

				<div class="form-group <?php if($errors->has('address')){echo "alert alert-danger";} ?>">
				    <label for="address" class="col-lg-4 control-label">Address</label>
				    <div class="col-lg-6">

				      {{Form::text('address', $user->address, array('class' => 'form-control')) }}

  			     		@foreach($errors->get('address') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach

				    </div>
				</div>

				<div class="form-group <?php if($errors->has('city')){echo "alert alert-danger";} ?>">
				    <label for="city" class="col-lg-4 control-label">City</label>
				    <div class="col-lg-6">

				      {{Form::text('city', $user->city, array('class' => 'form-control')) }}

  			     		@foreach($errors->get('city') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach

				    </div>
				</div>

				<div class="form-group <?php if($errors->has('state')){echo "alert alert-danger";} ?>">
				    <label for="state" class="col-lg-4 control-label">State</label>
				    <div class="col-lg-6">


				      {{ Form::select('state', $state_list, $user->state, array('class' => 'form-control')) }}

  			     		@foreach($errors->get('state') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach

				    </div>
				</div>


				<div class="form-group <?php if($errors->has('zip')){echo "alert alert-danger";} ?>">
				    <label for="zip" class="col-lg-4 control-label">Zip code</label>
				    <div class="col-lg-6">

				      {{Form::text('zip', $user->zip, array('class' => 'form-control')) }}

				      @foreach($errors->get('zip') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach

				    </div>
				</div>

				<div class="form-group <?php if($errors->has('payment_method')){echo "alert alert-danger";} ?>">
				    <label for="payment_method" class="col-lg-4 control-label">Payment Method</label>
				    <div class="col-lg-6">

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
				<div class="form-group <?php if($errors->has('paypal_email')){echo "alert alert-danger";} ?>">
				    <label for="paypal_email" class="col-lg-4 control-label">Paypal Email</label>
				    <div class="col-lg-6">

				      {{Form::text('paypal_email', $user->paypal_email, array('class' => 'form-control')) }}

  			     		@foreach($errors->get('paypal_email') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach

				    </div>
				</div>

				<div class="form-group <?php if($errors->has('name_on_cheque')){echo "alert alert-danger";} ?>">
				    <label for="name_on_cheque" class="col-lg-4 control-label">Name on Cheque</label>
				    <div class="col-lg-6">

				      {{Form::text('name_on_cheque', $user->name_on_cheque, array('class' => 'form-control')) }}

  			     		@foreach($errors->get('name_on_cheque') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach

				    </div>
				</div>




			  <div class="form-group">
			  <div class="col-lg-4"></div>
			  <div class="col-lg-6"><button type="submit" class="btn btn-cart col-lg-12" >Edit Profile</button></div>
			   	</div>
			{{ Form::close() }}
		</div>

		<div class="col-md-6">
	<h4 class="col-md-offset-1">Change Password</h4>

		<form class="form-horizontal" action="{{ URL::to('users/edit') }}/{{ $user->id }}/password" method="post">
	        {{ Form::token() }}


	    	<div class="form-group <?php if($errors->has('oldPassword')){echo "alert alert-danger";} ?>">
				<label for="oldPassword" class="col-lg-4 control-label">Old Password</label>
				<div class="col-lg-6">
					<input type="password" class="form-control" name="oldPassword" id="oldPassword" placeholder="Old Password" >
					<p class="alert-danger">{{ ($errors->has('oldPassword') ? $errors->first('oldPassword') : '') }}</p>
				    </div>
				</div>

			<div class="form-group <?php if($errors->has('password')){echo "alert alert-danger";} ?>">
				<label for="password" class="col-lg-4 control-label">New Password</label>
				<div class="col-lg-6">
					<input type="password" class="form-control" name="password" id="password" placeholder="New Password" >
					<p class="alert-danger">{{ ($errors->has('password') ? $errors->first('password') : '') }}</p>
				</div>
			</div>

			<div class="form-group <?php if($errors->has('password_confirmation')){echo "alert alert-danger";} ?>">
				<label for="password_confirmation" class="col-lg-4 control-label">Confirm New Password</label>
				<div class="col-lg-6">
					<input type="password_confirmation" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm New Password" >
					<p class="alert-danger">{{ ($errors->has('password_confirmation') ? $errors->first('password_confirmation') : '') }}</p>
				</div>
			</div>



		    <div class="form-actions col-md-offset-1">
		    	<input class="btn-cart btn" type="submit" value="Change Password">
		  </div>
	      </form>
</div>
</div>
<div class="col-md-12">
	@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
	<h4>User Group Memberships</h4>

	    <form class="form-horizontal" action="{{ URL::to('users/updatememberships') }}/{{ $user->id }}" method="post">
	        {{ Form::token() }}

	        <table class="table">
	            <thead>
	                <th>Group</th>
	                <th>Membership Status</th>
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
	        <div class="form-actions">
	            <input class="btn-cart btn" type="submit" value="Update Memberships">
	        </div>
	    </form>
	</div>
	@endif

@stop