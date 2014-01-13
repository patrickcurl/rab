<?php
// $expire=time()+60*60*24*120;
// $aff = Input::get('aff');
// if (isset($aff)){
//   setcookie('referred_by', $aff, $expire);
//   Session::put('referred_by', $aff);
// } else{

// }


?>
@include('layouts.head')

<style>
      .navbar-inner{ min-height: 0px; }
      .navbar .brand {
        float: left;
        display: block;
        padding: 20.5px 15px 15px;
        margin-left: -20px;
        font-size: 20px;
        font-weight: 400;
        color: #5E5E5E;
        text-shadow: 0 1px 0 #5E5E5E;
      }
    </style>
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
  <input class="span6"   id="appendedInputButton" name="isbns" placeholder="Enter Isbns, separate multiples by comma." type="text" style="padding:16px;">

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
        <div class="container-fluid" style="padding: 3px;">@if(isset($posts))
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

                  <h3><a href="{{ URL::to('/blog') }}/{{ $post['slug'] }}" title="{{ $post['title'] }}" rel="bookmark">{{ $post['title'] }}</a></h3>
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
            @endif
            </div></center>
            </div>


        </div>
      </section>
  </div>

 <!-- Page Footer -->
@include('layouts.footer')
@include('layouts.scripts')








     <!-- /container -->





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