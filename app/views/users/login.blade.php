@extends('layouts.master')
@section('content')
	<div class="container">

		<div class="col-md-6">
			<h2 style="text-align:center">Register</h2>
			<br />
			{{ Form::open(array('action' => 'UsersController@postRegister', 'method' => 'POST', 'class' => 'form-horizontal', 'role'=>'form')) }}
				<div class="form-group <?php if($errors->has('first_name')){echo "alert alert-danger";} ?>">
				    <label for="first_name" class="col-lg-4 control-label">First Name</label>
				    <div class="col-lg-6">

				      {{ Form::text('first_name', null, array('id' => 'first_name', 'class'=>'form-control', 'placeholder' =>'First Name')) }}
				      @if (Request::path()=="users/register")
  			     		@foreach($errors->get('first_name') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach
            		  @endif
				    </div>
				</div>
				<div class="form-group <?php if($errors->has('last_name')){echo "alert alert-danger";} ?>">
				    <label for="last_name" class="col-lg-4 control-label">Last Name</label>
				    <div class="col-lg-6">

				      {{ Form::text('last_name', null, array('id' => 'last_name', 'class'=>'form-control', 'placeholder' =>'Last Name')) }}
				      @if (Request::path()=="users/register")
  			     		@foreach($errors->get('last_name') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach
            		  @endif
				    </div>
				</div>

				<div class="form-group <?php if($errors->has('email')){echo "alert alert-danger";} ?>">
				    <label for="email" class="col-lg-4 control-label">EMail</label>
				    <div class="col-lg-6">

				     {{ Form::text('email', null, array('id' => 'email', 'class'=>'form-control', 'placeholder' =>'Email')) }}
				      @if (Request::path()=="users/register")
  			     		@foreach($errors->get('email') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach
            		  @endif
				    </div>
				</div>

				<div class="form-group <?php if($errors->has('password') && Request::path()=="users/register"){echo "alert alert-danger";} ?>">
				    <label for="password" class="col-lg-4 control-label">Password</label>
				    <div class="col-lg-6">

				      {{ Form::input('password', 'password', Input::old('password'), array('id' => 'password', 'class'=>'form-control', 'placeholder' =>'Password')) }}
				      @if (Request::path()=="users/register")
  			     		@foreach($errors->get('password') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach
            		  @endif
				    </div>
				</div>

				<div class="form-group <?php if($errors->has('password_confirmation')){echo "alert alert-danger";} ?>">
				    <label for="password_confirmation" class="col-lg-4 control-label">Confirm Password</label>
				    <div class="col-lg-6">

				      {{ Form::input('password', 'password_confirmation', Input::old('password_confirmation'), array('id' => 'password', 'class'=>'form-control', 'placeholder' =>'Password')) }}
				      @if (Request::path()=="users/register")
  			     		@foreach($errors->get('password_confirmation') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach
            		  @endif
				    </div>
				</div>
				<div class="form-group <?php if($errors->has('phone')){echo "alert alert-danger";} ?>">
				    <label for="phone" class="col-lg-4 control-label">Phone</label>
				    <div class="col-lg-6">

				      {{ Form::text('phone', null, array('id' => 'phone', 'class'=>'form-control', 'placeholder' =>'Phone')) }}
				      @if (Request::path()=="users/register")
  			     		@foreach($errors->get('phone') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach
            		  @endif
				    </div>
				</div>

				<div class="form-group <?php if($errors->has('address')){echo "alert alert-danger";} ?>">
				    <label for="address" class="col-lg-4 control-label">Address</label>
				    <div class="col-lg-6">

				      {{ Form::text('address', null, array('id' => 'address', 'class'=>'form-control', 'placeholder' =>'Address')) }}
				      @if (Request::path()=="users/register")
  			     		@foreach($errors->get('address') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach
            		  @endif
				    </div>
				</div>

				<div class="form-group <?php if($errors->has('city')){echo "alert alert-danger";} ?>">
				    <label for="city" class="col-lg-4 control-label">City</label>
				    <div class="col-lg-6">


				      {{ Form::text('city', null, array('id' => 'city', 'class'=>'form-control', 'placeholder' =>'City')) }}
				      @if (Request::path()=="users/register")
  			     		@foreach($errors->get('city') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach
            		  @endif
				    </div>
				</div>

				<div class="form-group <?php if($errors->has('state')){echo "alert alert-danger";} ?>">
				    <label for="state" class="col-lg-4 control-label">State</label>
				    <div class="col-lg-6">


				      {{ Form::select('state', $state_list, Input::get('state'), array('id' => 'state', 'class'=>'form-control')) }}
				      @if (Request::path()=="users/register")
  			     		@foreach($errors->get('state') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach
            		  @endif
				    </div>
				</div>


				<div class="form-group <?php if($errors->has('zip')){echo "alert alert-danger";} ?>">
				    <label for="zip" class="col-lg-4 control-label">Zip code</label>
				    <div class="col-lg-6">


				    {{ Form::text('zip', null, array('id' => 'zip', 'class'=>'form-control', 'placeholder' =>'Zip Code')) }}
				      @if (Request::path()=="users/register")
  			     		@foreach($errors->get('zip') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach
            		  @endif
				    </div>
				</div>
				<div class="form-group <?php if($errors->has('username')){echo "alert alert-danger";} ?>">
				    <label for="username" class="col-lg-4 control-label">Username</label>
				    <div class="col-lg-6">

				      {{ Form::text('username', null, array('id' => 'username', 'class'=>'form-control', 'placeholder' =>'Username')) }}
				      @if (Request::path()=="users/register")
  			     		@foreach($errors->get('username') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach
            		  @endif
				    </div>
				</div>

				<div class="form-group <?php if($errors->has('payment_method')){echo "alert alert-danger";} ?>">
				    <label for="payment_method" class="col-lg-4 control-label">Payment Method</label>
				    <div class="col-lg-6">

				      <label class="radio checkbox-inline">
			   			<input type="radio" id="payment_method" name="payment_method" value="Check" <?php if(Input::old('payment_method')=='Check'){echo "checked=\"checked\"";} ?> />Check
						</label>

						<label class="radio checkbox-inline">
			   			<input type="radio" id="payment_method" name="payment_method" value="Paypal" <?php if(Input::old('payment_method')=='Paypal'){echo "checked=\"checked\"";} ?> />Paypal

						</label>
				      @if (Request::path()=="users/register")
  			     		@foreach($errors->get('payment_method') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach
            		  @endif
				    </div>
				</div>
				<div class="form-group <?php if($errors->has('paypal_email')){echo "alert alert-danger";} ?>">
				    <label for="paypal_email" class="col-lg-4 control-label">Paypal Email</label>
				    <div class="col-lg-6">

				      {{ Form::text('paypal_email', null, array('id' => 'paypal_email', 'class'=>'form-control', 'placeholder' =>'Paypal Email')) }}
				      @if (Request::path()=="users/register")
  			     		@foreach($errors->get('paypal_email') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach
            		  @endif
				    </div>
				</div>

				<div class="form-group <?php if($errors->has('name_on_cheque')){echo "alert alert-danger";} ?>">
				    <label for="name_on_cheque" class="col-lg-4 control-label">Name on Cheque</label>
				    <div class="col-lg-6">

				      {{ Form::text('name_on_cheque', null, array('id' => 'name_on_cheque', 'class'=>'form-control', 'placeholder' =>'Name on Cheque')) }}
				      @if (Request::path()=="users/register")
  			     		@foreach($errors->get('name_on_cheque') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach
            		  @endif
				    </div>
				</div>




			  <div class="form-group">
			  <div class="col-lg-4"></div>
			  <div class="col-lg-6"><button type="submit" class="btn btn-cart btn-lg col-lg-12" >Register</button></div>
			   	</div>
			{{ Form::close() }}
		</div>



					<!--
					    #
						# LOGIN FORM
						#
					-->

		<div class="col-md-6">
			<h2 style="text-align:center">Login</h2>
			<br />
			{{ Form::open(array('action' => 'UsersController@postLogin', 'method' => 'POST', 'class' => 'form-horizontal')) }}

			<div class="form-group <?php if($errors->has('email')){echo "alert alert-danger";} ?>">
				<label for="email" class="col-lg-4 control-label">EMail</label>
				<div class="col-lg-6">
					{{ Form::text('email', null, array('id' => 'email', 'class'=>'form-control', 'placeholder' =>'Email')) }}
					@if (Request::path()=="users/register")
						@foreach($errors->get('email') as $message)
							<p class="alert-danger">{{$message}}</p>
						@endforeach
					@endif
				</div>
			</div>
			<div class="form-group <?php if($errors->has('password') && Request::path()=="users/register"){echo "alert alert-danger";} ?>">
				<label for="password" class="col-lg-4 control-label">Password</label>
				<div class="col-lg-6">
					{{ Form::input('password', 'password', Input::old('password'), array('id' => 'password', 'class'=>'form-control', 'placeholder' =>'Password')) }}
						@if (Request::path()=="users/register")
							@foreach($errors->get('password') as $message)
								<p class="alert-danger">{{$message}}</p>
							@endforeach
						@endif
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-10">
					<div class="checkbox" style="margin-left:200px;">
						<label>
							<input type="checkbox"> Remember me
						</label>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-lg-offset-2 col-lg-10">
					<button type="submit" class="btn btn-cart btn-lg col-lg-10">Sign in</button>
				    </div>
				</div>

			{{ Form::close() }}

	   @if (Session::has('error'))
    {{ trans(Session::get('reason')) }}
@elseif (Session::has('success'))
    An e-mail with the password reset has been sent.
@endif

			<h2 style="text-align:center;padding-top:80px;">Password Reset</h2>
				{{ Form::open(array('action' => 'UsersController@postResetPassword', 'method' => 'POST', 'class' => 'form-horizontal')) }}
				<div class="form-group <?php if($errors->has('email')){echo "alert alert-danger";} ?>">
					<label for="email" class="col-lg-4 control-label">EMail</label>
					<div class="col-lg-6">
						{{ Form::text('email', null, array('id' => 'email', 'class'=>'form-control', 'placeholder' =>'Email')) }}
						@if (Request::path()=="users/register")
							@foreach($errors->get('email') as $message)
								<p class="alert-danger">{{$message}}</p>
							@endforeach
						@endif
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">
						<button type="submit" class="btn btn-cart btn-lg col-lg-10">Reset Password</button>
					    </div>
					</div>
		</div>

	</div>
</div>

@stop