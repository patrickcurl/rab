@extends('layouts.master')
@section('content')
	<div class="container">

		<div class="col-md-6">
			<h2>Register</h2>
			<br />
			{{ Form::open(array('action' => 'UsersController@postRegister', 'method' => 'POST', 'class' => 'form-horizontal', 'role'=>'form')) }}
				<div class="form-group <?php if($errors->has('first_name')){echo "alert alert-danger";} ?>">
				    <label for="first_name" class="col-lg-4 control-label">First Name</label>
				    <div class="col-lg-6">

				      <input type="text" class="form-control" id="first_name" placeholder="First Name">
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

				      <input type="text" class="form-control" id="last_name" placeholder="Last Name">
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

				      <input type="email" class="form-control" id="email" placeholder="Email">
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

				      <input type="password" class="form-control" id="password" placeholder="Password">
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

				      <input type="password" class="form-control" id="password_confirmation" placeholder="Password Confirmation">
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

				      <input type="text" class="form-control" id="phone" placeholder="Phone">
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

				      <input type="text" class="form-control" id="address" placeholder="Address">
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

				      <input type="text" class="form-control" id="city" placeholder="City">
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


				      {{ Form::select('state', $state_list, Input::get('state')) }}
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

				      <input type="text" class="form-control" id="zip" placeholder="Zip code">
				      @if (Request::path()=="users/register")
  			     		@foreach($errors->get('zip') as $message)
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

				      <input type="text" class="form-control" id="paypal_email" placeholder="Paypal Email">
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

				      <input type="text" class="form-control" id="name_on_cheque" placeholder="Name on Cheque">
				      @if (Request::path()=="users/register")
  			     		@foreach($errors->get('name_on_cheque') as $message)
  			     			<p class="alert-danger">{{$message}}</p>
  			     		@endforeach
            		  @endif
				    </div>
				</div>




			  <div class="form-group">
			  <div class="col-lg-4"></div>
			  <div class="col-lg-6"><button type="submit" class="btn btn-primary col-lg-12" >Register</button></div>
			   	</div>
			{{ Form::close() }}
		</div>

		<div class="col-md-4">
			<h2 style="text-align:center">Login</h2>
			<br />
			{{ Form::open(array('action' => 'UsersController@postLogin', 'method' => 'POST', 'class' => 'form-horizontal')) }}

                <div class="control-group <?php if($errors->has('email')  && Request::path()=="users/login"){echo "error";} ?>" >
          <label class="control-label" for="email">Email</label>
          <div class="controls">
            {{ Form::email('email', Input::get('email'), array('id' => 'email', 'placeholder' => 'E-mail Address')) }}
              @if (Request::path()=="users/login")
                @foreach($errors->get('email') as $message)
                <p class="text-error" style="width:200px;">{{$message}}</p>
                @endforeach
              @endif
          </div>
        </div>
			 <div class="control-group <?php if($errors->has('password') && Request::path()=="users/login"){echo "error";} ?>">
          <label class="control-label" for="password">Password</label>
          <div class="controls">
            {{ Form::password('password', Input::get('password'), array('id' => 'password', 'placeholder' => 'Password'))}}
            @if (Request::path()=="users/login")
              @foreach($errors->get('password') as $message)
                <p class="text-error" style="width:200px;">{{$message}}</p>
              @endforeach
            @endif
          </div>
        </div>
			  <div class="control-group">
			   	<div class="controls">
			     	<label class="checkbox">
			       	<input type="checkbox"> Remember me
			     	</label>
			     	<button type="submit" class="btn btn-primary">Sign in</button>
			   	</div>
			  </div>
			{{ Form::close() }}

	   @if (Session::has('error'))
    {{ trans(Session::get('reason')) }}
@elseif (Session::has('success'))
    An e-mail with the password reset has been sent.
@endif
			<h2 style="text-align:right">Password Reset</h2>
				{{ Form::open(array('action' => 'UsersController@postResetPassword', 'method' => 'POST', 'class' => 'form-horizontal')) }}
				<div class="control-group">
					<label class="control-label" for="email">Email</label>
					<div class="controls">
						<input type="text" name="email"><br /><br />
						<button type="submit" class="btn btn-primary">Reset Password</button>
					</div>
				</div>

		</div>

	</div>
</div>

@stop