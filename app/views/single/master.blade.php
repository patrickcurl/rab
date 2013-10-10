<?php
$expire=time()+60*60*24*120;
$aff = Input::get('aff');
if ($aff){
  setcookie('referred_by', $aff, $expire);
}


?>
<!DOCTYPE html>
<!--[if IE 8 ]> <html lang="en" class="ie8"> <![endif]-->
<!--[if (gt IE 8)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
  <title>@section('title')
RecycleABook.com - Sell Textbooks, Buy Textbooks, Discounted Textbooks
@show</title>
  <meta content="Bootsrap based theme" name="description">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="yes" name="apple-mobile-web-app-capable">

<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../ico/apple-touch-icon-144-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../ico/apple-touch-icon-114-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../ico/apple-touch-icon-72-precomposed.png" />
<link rel="apple-touch-icon-precomposed" href="../ico/apple-touch-icon-57-precomposed.png" />
<link rel="shortcut icon" href="../ico/favicon.png" />



<?php
 /* <link rel="stylesheet" href="{{ URL::asset('css/application.css') }}">



    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Syncopate' rel='stylesheet' type='text/css'>
 <link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
 <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
 */
?>
  <link href="{{ URL::asset('stylesheets/bootstrap.css') }}" media="screen" rel="stylesheet" type="text/css" />
  <link href="{{ URL::asset('stylesheets/responsive.css') }}" media="screen" rel="stylesheet" type="text/css" />
  <link href="{{ URL::asset('stylesheets/font-awesome-all.css') }}" media="screen" rel="stylesheet" type="text/css" />
  <link href="{{ URL::asset('stylesheets/fancybox.css') }}" media="screen" rel="stylesheet" type="text/css" />
  <link href="{{ URL::asset('stylesheets/theme.css') }}" media="screen" rel="stylesheet" type="text/css" />
  <link href="{{ URL::asset('stylesheets/fonts.css') }}" media="screen" rel="stylesheet" type="text/css" />
    @section('head')
    @show
    <style>
        .navbar-inner {
          min-height: 0px;
        }
        .navbar .brand{
          font-size:28px;
          font-weight:400;
          padding: 10.5px 20px 10.5px;
        }
        .navbar .nav > li > a {
            /* padding: 30.5px 15px 30.5px; */
            padding: 10px 15px 10px 15px;
        }
        .navbar .btn, .navbar .btn-group {
          margin-top: 10.5px;
        }
    </style>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="{{URL::asset('javascripts/modernizr.custom.min.js')}}"></script>

<script>
$(document).ready(function(){

if(!Modernizr.input.placeholder){

  $('[placeholder]').focus(function() {
    var input = $(this);
    if (input.val() == input.attr('placeholder')) {
    input.val('');
    input.removeClass('placeholder');
    }
  }).blur(function() {
    var input = $(this);
    if (input.val() == '' || input.val() == input.attr('placeholder')) {
    input.addClass('placeholder');
    input.val(input.attr('placeholder'));
    }
  }).blur();
  $('[placeholder]').parents('form').submit(function() {
    $(this).find('[placeholder]').each(function() {
    var input = $(this);
    if (input.val() == input.attr('placeholder')) {
      input.val('');
    }
    })
  });

}

</script>
</head>

<body @section('body_tag')

@show >

  <div class="wrapper">
  <div class="row-fluid">
    <img src="{{ URL::asset('images/assets/misc/logo.png')}}" class="span12"></a>
  </div>
    <header id="masthead">


         <div class="row-fluid"><p class="text-center"><em>Our Mission is simple: To help students receive the most affordable textbooks on the market. Please Join our cause. You can make a difference.</em></p></div>
    </header>


<section class="section section-padded">
<div class="container-fluid">
  @include('layouts.notifications')
      @if (Session::has('error'))
    {{ trans(Session::get('reason')) }}
@endif




<div class="navbar">
  <div class="navbar-inner">
    <div class="container">

      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <!-- Be sure to leave the brand out there if you want it shown -->
      <a class="brand" href="#">Buyer Portal <i class="icon-chevron-right"></i></a>

      <!-- Everything you want hidden at 940px or less, place within here -->
      <div class="nav-collapse collapse">
        <!-- .nav, .navbar-search, .navbar-form, etc -->

        @if(!Sentry::getUser())
        {{ Form::open(array('action' => 'UsersController@postBuyerLogin', 'method' => 'POST', 'class' => 'navbar-form pull-right')) }}
            <input type="email" class="span3" name="email" id="email" placeholder="E-mail Address" />
            <input type="password" class="span3" name="password" id="password" placeholder="Password" /> <button type="submit" class="btn">Login</button>


        {{ Form::close() }}
        @else
        <ul class="nav">
          <li><a href="{{URL::to('/')}}">Home</a></li>
          <li><a href="#">Link</a></li>
          <li><a href="{{URL::to('users/logout')}}">Logout</a></li>
        </ul>

        @endif

      </div>

    </div>
</div>

</div>
<div class="row-fluid">


<div class="span10 offset1">
{{ Form::open(array('action' => 'BookController@postSearchSingle', 'id' => 'price-books-form', 'class' => 'form-inline')) }}
               <div class="input-append" style="width:100%" >
  <input  class="input-xxlarge" id="appendedInputButton" name="isbns" placeholder="Enter Isbns, separate multiples by comma." type="tel" style="width: 80%;height:40px;">
  <button class="btn btn-success" type="submit" style="height:50px">Find Books!</button>
{{ Form::close(); }}
</div>

</div>

@yield('content')

</div>
      </section>



<section class="section section-padded">
        <div class="container-fluid">
          <div class="section-header">
            <h1>
              Latest
              <small class="light">news?</small>
            </h1>
          </div>
          <ul class="unstyled row-fluid">

            <!-- Begin Blog Post-->
    <div class="row-fluid">
    <div class="container-fluid">
    <ul>
            @foreach($posts as $post)


              <li><a href="{{ $post['url'] }}" title="{{ $post['title'] }}" rel="bookmark">{{ $post['title'] }}</a></li>



            @endforeach
            </u>
            </div></div>

            <!-- End Blog Post-->

        </div>
      </section>
  </div>

 <!-- Page Footer -->
  <footer id="footer" role="contentinfo">
    <div class="wrapper wrapper-transparent">
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span6 small-screen-center">
            <h3>
              Recycle A
              <span class="light">
                Book
              </span>
            </h3>
            <p>
              Office:(937) 439-4848 <br> Fax:(866) 224-1262   <br>Email:<a href="mailto:info@RecycleABook.com">info@RecycleABook.com</a>
              <br>
             561 Congress Park Drive. Centerville, OH 45459
              <br>
             RecycleABook.com, INC &copy; Copyright 2013
            </p>
          </div>
          <div class="span6">
            <ul class="unstyled inline text-right small-screen-center big social-icons">
              <li>
                <a data-iconcolor="#00a0d1" href="http://www.twitter.com/recycleabook">
                  <i class="icon-twitter"></i>
                </a>
              </li>
              <li>
                <a data-iconcolor="#3b5998" href="https://www.facebook.com/pages/RecycleAbookcom/256102557767102">
                  <i class="icon-facebook"></i>
                </a>
              </li>
                         </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script src={{URL::asset("javascripts/jquery.min.js")}} type="text/javascript"></script>
  <script src={URL::asset("javascripts/bootstrap.js")}} type="text/javascript"></script>
  <script src={{URL::asset("javascripts/jquery.flexslider-min.js")}} type="text/javascript"></script>
  <script src={{URL::asset("javascripts/jquery.tweet.js")}} type="text/javascript"></script>
  <script src={{URL::asset("javascripts/jquery.fancybox.pack.js")}} type="text/javascript"></script>
  <script src={{URL::asset("javascripts/jquery.fancybox-media.js")}} type="text/javascript"></script>
  <script src={{URL::asset("javascripts/script.js")}} type="text/javascript"></script>





<div id="wrap" style="margin-top:20px;margin-bottom:40px;">

    <div
    @section('container_class')
    class="container page-content clearfix"
    @show  >


      </div>


</div>


     <!-- /container -->





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