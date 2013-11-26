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



                </div>

</div>
            </div>

          </nav>

<div class="container-fluid visible-desktop"><div class="span3" >
                  <a href="{{URL::to('/')}}">
                    <img src="{{ URL::asset('images/assets/misc/logo.png')}}" style="display:block;max-width:150%;height:auto;position:relative;"></a>
                </div>


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