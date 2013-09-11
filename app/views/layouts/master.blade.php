<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@section('title')
{{ Config::get('env_vars.global_title') }}
@show</title>
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../ico/apple-touch-icon-144-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../ico/apple-touch-icon-114-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../ico/apple-touch-icon-72-precomposed.png" />
<link rel="apple-touch-icon-precomposed" href="../ico/apple-touch-icon-57-precomposed.png" />
<link rel="shortcut icon" href="../ico/favicon.png" />



<link rel="stylesheet" href="{{ URL::asset('css/application.css') }}">

    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Syncopate' rel='stylesheet' type='text/css'>
 <link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
 <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>


    @section('head')
    @show
</head>

<body @section('body_tag')
@show >
 <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>


          <a href="/" class="navbar-brand"><img alt="" src="/img/sell-textbooks-logo2.png" class="logo"/></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="{{Request::is('/') ? 'active' : ''}}"><a href="{{ URL::to( '/') }}">Home</a></li>
             <li class="{{Request::is('p/join-our-team*') ? 'active' : ''}}"><a href="{{ URL::to( '/p/join-our-team') }}">Join Our Team</a></li>
             <!-- <li class="{{Request::is('p/how-to-save*') ? 'active' : ''}}"><a href="{{ URL::to( '/p/how-to-save') }}">How to Save</a></li> -->
            <!-- <li class="{{Request::is('/contact*') ? 'active' : ''}}"><a href="{{ URL::to( '/contact') }}">Contact Us</a></li> -->
            {{ View::make('partials._login_form_lg') }}
              <li><a href="{{ URL::to('/cart') }}"><i class="icon-shopping-cart icon-white"></i> Seller Cart <span class="cart-total badge badge-info"></span></a></li>
            <?php $user = Sentry::getUser(); ?>
            @if ($user && $user->hasAccess('admin'))
              <li><a href="{{ URL::to('/admin') }}"> <span class="glyphicon glyphicon-wrench"></span> Admin Dashboard</a></li>
              @endif

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


@include('layouts.notifications')
      @if (Session::has('error'))
    {{ trans(Session::get('reason')) }}
@endif
<div id="wrap" style="margin-top:100px;">
	    @yield('content')
</div>


     <!-- /container -->
<div class="navbar navbar-fixed-bottom ">
    <div class="navbar-inner">
        <div class="width-constraint clearfix">
            <p class="pull-left muted credit">RecycleABook v2.0.0</p>

            <p class="pull-right muted credit">©2013 • Recycleabook.com ALL RIGHTS RESERVED</p>
        </div>
    </div>
</div>




<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-wip/js/bootstrap.min.js"></script>

{{ javascript(array(
        'dropdown.js',
        'collapse.js'
    ))
}}
<script>
  $('.dropdown-toggle').dropdown()
</script>
@section('footer')
@show
  </body>
</html>