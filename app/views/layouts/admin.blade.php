<!DOCTYPE html>
<!--[if IE 8 ]> <html lang="en" class="ie8"> <![endif]-->
<!--[if (gt IE 8)]><!--> <html lang="en" {? $__env->startSection('html'); print_r( $__env->yieldSection()); ?}> <!--<![endif]-->
<head>


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

@show>

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
         <div class="row-fluid"><p class="text-center"><em style="font-weight:bold;color:green;">Our Mission is simple: To help students receive the most affordable textbooks on the market.</em></p></div>
    </header>

@section('hero-unit')
<section class="section section-alt section-padded section-dark">
        <div class="row-fluid">
          <div class="super-hero-unit">
            <h1 class="super animated fadeinup delayed">
            @section('hero-start')
              Admin
            @show
              <span class="lighter">
              @section('hero-end')
                Dashboard
              @show
              </span>
            </h1>
          </div>
        </div>
</section>
@show
 <div class="row pull-right" style="padding-right:30px;">
 <div >
   Total Users: {{{ $totalUsers }}} | Online:  {{{ $onlineUsers }}} | Guests:  {{{ $onlineGuests }}}
</div>
  </div>
<section class="section section-padded">
<div class="container-fluid">
  @include('layouts.notifications')
      @if (Session::has('error'))
    {{ trans(Session::get('reason')) }}
@endif
<div class="navbar">
  <div class="navbar-inner">
    <a class="brand" href="#">Dashboard</a>
    <ul class="nav">
      <li @if(Request::path() == 'admin') class="active" @endif ><a href="{{URL::to('admin')}}">Home</a></li>
      <li @if(Request::path() == 'admin/buyer-requests') class="active" @endif ><a href="{{URL::to('admin/buyers')}}">Buyers</a></li>
      <li @if(Request::path() == 'admin/customer-orders') class="active" @endif ><a href="{{URL::to('admin/customers')}}">Customers</a></li>
      <li @if(Request::path() == 'admin/users') class="active" @endif ><a href="{{URL::to('admin/users')}}">Users</a></li>
      <li @if(Request::path() == 'admin/groups') class="active" @endif ><a href="{{URL::to('admin/groups')}}">Groups</a></li>
    </ul>
  </div>
</div>

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

  </div>

 <!-- Page Footer -->
@include('layouts.footer')
@include('layouts.scripts')


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
<script>
jQuery(document).ready(function($) {

    $('button.ajax').on('click', function(event) {
        event.preventDefault();

        var url = "{{URL::to('/api/v1/supplies')}}";

        var newItem = $('#addSupply').serializeObject();
        var tbody = $('#supply-list');
        $.ajax({
            url: url,
            data: newItem,
            type: 'post',
            dataType: 'json',
            success: function(ev){
              console.log(ev);
              if(ev.error === false ){

                $('#supply-list tbody').append('<tr><td>' + ev.name + '</td><td>' + ev.description +'</td><td><a href="#" class="ajax"  data-id="' + ev.id +'"><i class="icon-remove"></i></a></td></tr>');
              } else {

               $('#error-code').text(ev.message).show().fadeOut(1500);

              }

            },
            error: function(hxr, error, status){ alert('Error'); }
        });
    });
    $('#supply-list').on('click', 'a.ajax', function(event) {
        event.preventDefault();
        var id = $(this).data('id');
        var url = "{{URL::to('/api/v1/supplies/')}}" + "/" + id;
        var row = $(this).closest('tr');
        $.ajax({
            url: url,
            type: 'delete',
            dataType: 'json',
            success: function(ev){
              if(ev.error===false){
                row.slideUp('normal', function() { row.remove(); });
              } else {
                 $('#error-code').text(ev.message).fadeIn(0).fadeOut(1500);
              }

            },
            error: function(hxr, error, status){ alert('Error'); }
        });
    });
    $('div#processed').on('click', 'a.process', function(event){
      event.preventDefault();
      var id = $(this).data('id');
      var bool = $(this).data('bool');
      var url = "{{URL::to('/api/v1/sorders/')}}" + "/" + id;
      console.log(id);
      $.ajax({
        url: url,
        type: 'patch',
        data: { processed : bool },
        success: function(ev){
          $('#processed-' + id).attr('checked', bool);


        },
        error: function(hxr, error, status){ alert('Error'); }
      });
      console.log(bool);
    });
  });
</script>
  </body>
</html>