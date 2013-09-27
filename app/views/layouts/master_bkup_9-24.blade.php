<?php
$expire=time()+60*60*24*120;
$aff = Input::get('aff');
if ($aff){
  setcookie('referred_by', $aff, $expire);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php  ?>
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
<div class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
        <!--<a href="/" class="navbar-brand-logo"><img alt="" src="/img/sell-textbooks-logo2.png" class="logo img-responsive hidden-xs "/></a>-->
        <a href="/" class="navbar-brand" style="font-size:12px">RecycleABook : Cash for Used Textbooks</a>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>



        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">

             <!-- <li class="{{Request::is('p/how-to-save*') ? 'active' : ''}}"><a href="{{ URL::to( '/p/how-to-save') }}">How to Save</a></li> -->
            <!-- <li class="{{Request::is('/contact*') ? 'active' : ''}}"><a href="{{ URL::to( '/contact') }}">Contact Us</a></li> -->
            {{ View::make('partials._login_form_lg') }}
              <li><a href="{{ URL::to('/cart') }}"><i class="icon-shopping-cart nav-icon"></i> Seller Cart <span class="cart-total badge badge-info"></span></a></li>
            <?php $user = Sentry::getUser(); ?>
            @if ($user && $user->hasAccess('admin'))
              <li><a href="{{ URL::to('/admin') }}"> <span class="glyphicon glyphicon-wrench"></span> Admin Dashboard</a></li>
              @endif
              <li><a href="mailto:info@recycleabook.com" data-rel="tooltip" data-position="bottom" data-original-title="Email Us"><i class="icon-envelope nav-icon"></i> info@recycleabook.com</a></li>
                <li><a href="#" data-rel="tooltip" data-position="bottom" data-original-title="Call Us Now"><i class="icon-phone nav-icon"></i> (937) 439-4848</a></li>
                <li></li>

          </ul> <a href="https://www.facebook.com/pages/RecycleAbookcom/256102557767102" data-rel="tooltip" data-position="bottom" data-original-title="Facebook" class="navbar-link social-link"><i class="icon-facebook"></i></a>
          <a href="http://www.twitter.com/recycleabook" data-rel="tooltip" data-position="bottom" data-original-title="Twitter" class="social-link"><i class="navbar-link icon-twitter" ></i></a>
        </div><!--/.nav-collapse -->
      </div>
    </div>



  <div class="row clear-fix hidden-xs" style="padding-top:15px;background-color: rgba(230, 230, 230, 0.6);">
  <div class="container">
    <div class="logo col-sm-3">
        <a href="http://blog.recycleabook.com" title="Home">
          <img src="http://blog.recycleabook.com/wp-content/uploads/2013/09/sell-textbooks-logo2.png" width="520" height="101" data-original="http://blog.recycleabook.com/wp-content/uploads/2013/09/sell-textbooks-logo2.png" class="img-responsive" style="opacity: 1;margin-bottom:20px;">                </a>
    </div>
    <div class="col-sm-9">

    <nav class="navbar navbar-inverse" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
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
        <li class="dropdown">
            <a href="http://blog.recycleabook.com/about-us/" class="dropdown-toggle" data-toggle="dropdown">About Us<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="http://blog.recycleabook.com/contact-us/">Contact Us</a></li>
              <li><a href="http://blog.recycleabook.com/privacy-policy/">Privacy Policy</a></li>

            </ul>
          </li>

          <li><a href="http://blog.recycleabook.com/affiliate/">Affiliate</a></li>
          <li><a href="http://blog.recycleabook.com/">Blog</a></li>
          <li><a href="http://blog.recycleabook.com/join-our-team/">Join Our Team</a></li>
          <li><a href="http://blog.recycleabook.com/publisher-list/">Publisher List</a></li>
          <li><a href="http://blog.recycleabook.com/how-to-pack/">How to Pack</a></li>
          <li><a href="http://blog.recycleabook.com/condition-guide/">Condition Guide</a></li>
        </ul>


      </div><!-- /.navbar-collapse -->
    </nav>
        </div>
  </div>

  </div>
@include('layouts.notifications')
      @if (Session::has('error'))
    {{ trans(Session::get('reason')) }}
@endif
<div id="wrap" style="margin-top:20px;margin-bottom:40px;">

    <div
    @section('container_class')
    class="container page-content clearfix"
    @show  >

	    @yield('content')
      </div>


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