
<?php
$expire=time()+60*60*24*120;
$aff = Input::get('aff');
if ($aff){
  setcookie('referred_by', $aff, $expire);
}


?>

@include('layouts.head')
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
          margin-top: 5px;
          padding: 6px 10px;
          margin-bottom: 0;
        }
        .navbar-form input{
          margin-bottom: none;
          margin-top:5px;
        }

    </style>
</head>


<body @section('body_tag')

@show >

  <div class="wrapper">
  <div class="row-fluid">
    <img src="{{ URL::asset('images/assets/misc/logo.png')}}" class="span12" style="padding: 20px 350px" ></a>
  </div>
    <header id="masthead">


         <div class="row-fluid"><p class="text-center"><em>Our Mission is simple: To help students receive the most affordable textbooks on the market.</em></p></div>
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
        {? $user = Sentry::getUser(); ?}
        <ul class="nav">
          <li><a href="{{URL::to('/')}}">Home</a></li>
          <li><a href="{{URL::to('users/edit')}}/{{$user->id}}">Profile</a></li>
          <li><a href="{{URL::to('supplies/')}}">Supplies</a></li>
          <li><a href="{{URL::to('office/docs/')}}">Docs</a></li>
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


@if(isset($post))
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
      @endif
  </div>



@include('layouts.footer')
@include('layouts.scripts')



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
<script>
  $('.dropdown-toggle').dropdown()
</script>
@section('footer')
@show
  </body>
</html>