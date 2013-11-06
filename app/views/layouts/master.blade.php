<?php
$expire=time()+60*60*24*120;
$aff = Input::get('aff');
if ($aff){
  setcookie('referred_by', $aff, $expire);
  Session::put('referred_by', $aff);
} else{

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
</head>

<body @section('body_tag')

@show >

  <div class="wrapper">
    <header id="masthead">


          <nav class="navbar navbar-static-top" style="margin-bottom:10px;">
            <div class="navbar-inner">
              <div class="container-fluid">
                <a class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </a>


                <div class="nav-collapse collapse">
                  <ul class="nav pull-right">
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        About Us
                        <span class="caret"></span>
                      </a>
                      <!-- Link or button to toggle dropdown -->
                      <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <li><a tabindex="-1" href="{{URL::to('/p/our_story')}}">Our Story</a></li>
                         <li><a tabindex="-1" href="{{URL::to('/p/community')}}">Community</a></li>
                         <li><a tabindex="-1" href="{{URL::to('/p/how_to_pack')}}">How to Pack</a></li>
                        <li class="divider"></li>
                        <li><a tabindex="-1" href="{{URL::to('/p/contact')}}">Contact Us</a></li>
                      </ul>
                    </li>
                    <li class=""><a href="{{URL::to('/p/save_students_money')}}">How to Save</a></li>
                    <!-- <li class=""><a href="publishers.html">Publishers</a></li>
                    <li class=""><a href="affiliate.html">Affiliates</a></li>
                    <li class=""><a href="blog.html">Blog</a></li>-->
                    <li class=""><a href="{{URL::to('/p/join_our_team')}}">Join Our Team</a></li>
                    {{ View::make('partials._login_form_lg') }}
                     <li><a href="{{ URL::to('/cart') }}"><i class="icon-shopping-cart nav-icon"></i> Seller Cart <span class="cart-total badge badge-info"></span></a></li>

            @if (Sentry::getUser() && Sentry::getUser()->hasAccess('admin'))
              <li><a href="{{ URL::to('/admin') }}"> <span class="icon-wrench"></span> Admin</a></li>
              @endif


                  </ul>


                </div>

</div>
            </div>

          </nav>

<div class="container-fluid visible-desktop"><div class="span3" >
                  <a href="{{URL::to('/')}}">
                    <img src="{{ URL::asset('images/assets/misc/logo.png')}}" style="display:block;max-width:90%;height:auto;position:relative;bottom:40px;"></a>
                </div>
                {{ Form::open(array('action' => 'BookController@postSearch', 'id' => 'price-books-form', 'class' => 'form-inline')) }}
               <div class="input-append pull-right visible-desktop ">
  <input class="span6"   id="appendedInputButton" name="isbns" placeholder="Enter Isbns, separate multiples by comma." type="text">

  <button class="btn btn-success" type="submit">Sell Your Books!</button>
</div> {{ Form::close() }}

</div>
<div class="container-fluid visible-tablet" style="position: relative;top: -50px;width: 80%;"><div class="span4" >
                  <a href="{{URL::to('/')}}">
                    <img src="{{ URL::asset('images/assets/misc/logo.png')}}" style="display:block;max-width:90%;height:auto;position:relative;bottom:40px;"></a>
                </div>
               <div class="input-append">
  <input class="span5" id="appendedInputButton" name="isbns" placeholder="Enter Isbns, separate multiples by comma." type="text" >
  <button class="btn btn-success" type="submit">Sell Your Books!</button>

</div>
</div>
<div class="container-fluid visible-phone">
<div class="span12" >
                  <a href="{{URL::to('/')}}">
                    <img src="{{ URL::asset('images/assets/misc/logo.png')}}" style="display:block;max-width:90%;height:auto;position:relative;top:-30px;"></a>
                </div>

               <div class="input-append" style="width:80%" >
  <input  class="input-xxlarge" id="appendedInputButton" name="isbns" placeholder="Enter Isbns, separate multiples by comma."type="text" style="width: 100%;">
  <button class="btn btn-success" type="submit">Sell Your Books!</button>

</div>
</div>
         <div class="row-fluid"><p class="text-center"><em style="font-weight:bold;color:green;">Our Mission is simple: To help students receive the most affordable textbooks on the market. </em></p></div>
    </header>

@section('hero-unit')
<section class="section section-alt section-padded section-dark">
        <div class="row-fluid">
          <div class="super-hero-unit">
            <h1 class="super animated fadeinup delayed">
            @section('hero-start')
              Get Cash 4
            @show
              <span class="lighter">
              @section('hero-end')
                Textbooks
              @show
              </span>
            </h1>
          </div>
        </div>
</section>
@show
<section class="section section-padded">
<div class="container-fluid">
  @include('layouts.notifications')
      @if (Session::has('error'))
    {{ trans(Session::get('reason')) }}
@endif
 @yield('content')

</div>
      </section>





<section class="section section-padded section-alt">
       <div class="container-fluid">
          <div class="section-header">
            <h1>
             Sell Your
              <small class="light">Books</small>
            </h1>
            <p> Do you have textbooks that you'd like to sell? Enter ISBNs below, separate multiples by comma. </p>
            <div class="row-fluid">
            {{ Form::open(array('action' => 'BookController@postSearch', 'id' => 'price-books-form', 'class' => 'form-inline')) }}
               <div class="input-append" style="display: block;">
  <input class="span6" id="appendedInputButton" name="isbns" placeholder="Enter Isbns, separate multiples by comma."type="text">

  <button class="btn btn-success" type="submit">Get Started</button>
  </div>
</div> {{ Form::close() }}

          </div>



       </div>
      </section>
<section class="section section-padded">
        <div class="container-fluid" style="padding: 3px;">
          <div class="section-header">
            <h1>
              Latest
              <small class="light">news?</small>
            </h1>
          </div>

<div class="container" style="margin:15px">


            @foreach($posts as $post)
            <div class="row-fluid">
              <div class="span3 offset1" style="padding:10px;">
                <a href="{{ $post['url'] }}" title="{{ $post['title'] }}" rel="bookmark"><img src="{{ $post['image'] }}" class="postthumbimg"></a>
              </div>
              <div class="span7" style="padding-top:10px;">
                  <h3><a href="{{ $post['url'] }}" title="{{ $post['title'] }}" rel="bookmark">{{ $post['title'] }}</a></h3>
                  <p>{{$post['excerpt']}}
                  <a href="{{ $post['url'] }}" title="Read more on {{ $post['title'] }}" rel="bookmark" class="readmore">Read more...</a>

                  </p>

              </div>
              </div>
             <!--  <div class="postbg">
                <div class="postimage"><a href="{{ $post['url'] }}" title="{{ $post['title'] }}" rel="bookmark"><img src="{{ $post['image'] }}" /></a></div>
                <div class="postcontent">

                <div class="posttext">
                </div>
                </div>
                <div class="postreadmore"><h5><a href="{{ $post['url'] }}" title="Read more on Worth A Thousand Words" rel="bookmark">Read more</a></h5></div>
 -->



            @endforeach</div>
            </div></center>
            </div>


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
             RecycleABook.com, INC &copy; Copyright 2013<br />
             <a href="http://recycleabook.com/p/privacy-policy">Privacy Policy</a>
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
  <script src="{{URL::asset('javascripts/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('javascripts/bootstrap.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('javascripts/jquery.flexslider-min.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('javascripts/jquery.tweet.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('javascripts/jquery.fancybox.pack.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('javascripts/jquery.fancybox-media.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('javascripts/script.js')}}" type="text/javascript"></script>





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
  $('.dropdown-toggle').dropdown();
  $('.tooltip1').tooltip('tritter':'focus', 'title':'testing123')

</script>

@section('footer')
@show
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){

$('input[type=text][name=isbns]').popover({
    placement: "bottom",
    trigger: "hover",
    title: "Cash 4 Textbooks",
    content: "Sell your used textbooks now. Enter isbn numbers in box to see how much you can earn!"
});

});//]]>

</script>
  </body>
</html>