<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@section('title')
{{ Config::get('env_vars.global_title') }}
@show</title>



    <link href="//netdna.bootstrapcdn.com/bootswatch/3.0.0/united/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Syncopate' rel='stylesheet' type='text/css'>
 <link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
 <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
 <link rel="stylesheet" href="css/application.css">
    @section('head')
    @show
</head>

<body @section('body_tag')
@show>
<nav class="navbar" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{{URL::to('/')}}">RecycleABook</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">

      <li class="{{Request::is('/') ? 'active' : ''}}"><a href="{{ URL::to( '/') }}">Home</a></li>
                        <li class="{{Request::is('/faq*') ? 'active' : ''}}"><a href="{{ URL::to( '/faq') }}">FAQ</a></li>
                        <li class="{{Request::is('/contact*') ? 'active' : ''}}"><a href="{{ URL::to( '/contact') }}">Contact Us</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li><a href="#">Separated link</a></li>
          <li><a href="#">One more separated link</a></li>
        </ul>
      </li>
    </ul>
    <form class="navbar-form navbar-left" action="" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Link</a></li>
      @if (Auth::check())
        <li><a href="users/logout"><i class="icon-user"></i> Logout</a></li>
      @elseif (Auth::guest())

      <li class="dropdown">
        <a href="#" style="margin-right: 15px;" data-toggle="dropdown" class="dropdown-toggle pull-right"><i class="icon-user"></i> Sign In<b class="caret"></b></a>
        <?php // <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a> // ?>
        <div class="dropdown-menu"  style="padding:10px;">

        <form method="POST" action="/users/login" accept-charset="UTF-8" class="form-inline" role="form">
          <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
            <div class="form-group form-group-dd">
              <label class="sr-only" for="email">Email address</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
            </div>
          <br /><br />
          <div class="form-group form-group-dd">
            <label class="sr-only" for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
          </div>
          <br />
          <div class="checkbox" style="padding-top:10px;">
            <label>
              <input type="checkbox"> Remember me
            </label>
          </div>
          <small style="padding-top:10px;padding-left:15px;color:grey">
                        <a href="" style="color:grey">Forgot Password?</a>
          </small>
          <div style="padding-top:10px;"><button type="submit" class="btn btn-default">Sign in</button></div>
        </form>

        </div>
      </li>

      @endif


      <li><a href="/main.php"><i class="icon-shopping-cart icon-white"></i> Seller Cart <span class="cart-total badge badge-info"></span></a></li>

    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
<div class="logo-container">
      <div class="container-fluid">
        <div class="container">
            <a href="/"><img src="/img/recycleabook.jpg" class="pull-left" id="logo" width="200"></a>
       <h1>Want <span>CASH</span> for your <span>Used TextBooks?</span></h1><br>

                  </div>
                  </div>
    </div>

			@include('layouts.notifications')
      @if (Session::has('error'))
    {{ trans(Session::get('reason')) }}
@endif
	    @yield('content')




     <!-- /container -->
      <div class="container-fluid foot_container">
        <div class="footer container">
          @section('footer')
          @show
          <p>&copy; RecycleABook.com 2013</p>
        </div>
      </div>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-wip/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
{{ javascript(array(
        'dropdown.js',
        'collapse.js'
    ))
}}
<script>
  $('.dropdown-toggle').dropdown()
</script>
  </body>
</html>