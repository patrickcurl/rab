<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@section('title')
{{ Config::get('env_vars.global_title') }}
@show</title>

<link rel="shortcut icon" href="<?php echo URL::to('favicon.ico'); ?>">
<link rel="stylesheet" href="{{ URL::asset('css/application.css') }}">
<link href="//netdna.bootstrapcdn.com/bootswatch/3.0.0/cerulean/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Syncopate' rel='stylesheet' type='text/css'>
 <link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
 <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>


    @section('head')
    @show
</head>

<body @section('body_tag')
@show >

<div class="container-fluid">
  <div class="row">

    <div class="col-md-3  col-md-offset-0 col-sm-offset-1">
      <a href="/"><img src="/img/sell-textbooks-logo.png" class="img-responsive" ></a>
    </div>

    <div class="navbar col-md-8 col-sm-11" role="navigation" style="margin-top:10px;">
      <div class="container" >
        <div class="navbar-header" >
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
           </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">

            <li class="{{Request::is('/') ? 'active' : ''}}"><a href="{{ URL::to( '/') }}">Home</a></li>
            <li class="{{Request::is('p/join-our-team*') ? 'active' : ''}}"><a href="{{ URL::to( '/p/join-our-team') }}">Join Our Team</a></li>
            <li class="{{Request::is('p/how-to-save*') ? 'active' : ''}}"><a href="{{ URL::to( '/p/how-to-save') }}">How to Save</a></li>
            <li class="{{Request::is('/contact*') ? 'active' : ''}}"><a href="{{ URL::to( '/contact') }}">Contact Us</a></li>

            {{ View::make('partials._login_form_lg') }}

            <li><a href="{{ URL::to('/cart') }}"><i class="icon-shopping-cart icon-white"></i> Seller Cart <span class="cart-total badge badge-info"></span></a></li>

          </ul>
        </div><!-- /.navbar-collapse -->
      </div>
    </div>
  </div>
</div>



@include('layouts.notifications')
      @if (Session::has('error'))
    {{ trans(Session::get('reason')) }}
@endif
	    @yield('content')




     <!-- /container -->
      <div class="container-fluid foot_container footer clearfix">
     <div class="col-md-3">


      </div>
  <div class="col-md-6">
<p>&copy; RecycleABook.com 2013</p>
  </div>

          @section('footer')
          @show


      </div><script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-wip/js/bootstrap.min.js"></script>

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