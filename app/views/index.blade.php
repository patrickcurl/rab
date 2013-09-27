@extends('layouts.master')
@section('body_tag')
    style=""
@stop
@section('hero-unit')
<!--remove unit -->
@stop
@section('content')

<section class="section section-alt">
        <div class="row-fluid">
          <div class="flexslider" data-flex-animation="slide" data-flex-controlsalign="center" data-flex-controlsposition="inside" data-flex-directions="hide" data-flex-speed="7000" id="intro">
            <ul class="slides">
              <li>
                <div class="super-hero-unit">
                  <figure>
                   <a href="save-students-money.html"> <img alt="some image" src="{{ URL::asset('images/assets/homeslides/girlholdingbooks.jpg') }}"></a>
                    <figcaption class="flex-caption">
                      <h1 class="super">
                      <a href="save-students-money.html"> How To<br> Save</a>

                      </h1>
                    </figcaption>
                  </figure>
                </div>
              </li>
              <li>
                <div class="super-hero-unit">
                  <figure>
                    <a href="join-our-team.html"><img alt="some image" src="{{ URL::asset('images/assets/homeslides/cashbook.jpg') }}"></a>
                    <figcaption class="flex-caption">
                      <h1 class="super">
                      <a href="join-our-team.html"> Join Our<br> Team</a>

                      </h1>
                    </figcaption>
                  </figure>
                </div>
              </li>
              <li>
                <div class="super-hero-unit">
                  <figure>
                    <a href="cash-for-books.html"><img alt="some image" src="{{ URL::asset('images/assets/homeslides/bookscatchingair.jpg')}}"></a>
                    <figcaption class="flex-caption">
                      <h1 class="super">
                      <a href="cash-for-books.html">Ca$h For<br> Books</a>

                      </h1>
                    </figcaption>
                  </figure>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </section>
      <!-- Our Services -->
      <section class="section section-padded">
        <div class="container-fluid">
          <div class="row-fluid">
            <div class="section-header">
              <h1>
                What
                <small class="light">we do?</small>
              </h1>
            </div>
            <ul class="unstyled row-fluid">
              <li class="span3">
                <div class="round-box round-medium">
                  <span class="box-inner">
                    <img alt="some image" class="img-circle" src="{{ URL::asset('images/assets/whatwedobg/stacks-bg.jpg')}}">

                           <i class="icon-money"></i>
                  </span>
                </div>
                <h3 class="text-center">
                 Save Students Money
                </h3>
                <p>
                  As the average cost of textbooks can reach nearly $1,200 per year,  many students are looking for cost-effective ways to offset these expenses. Check out these cost-saving options to lower your textbook costs.<a href="save-students-money.html">
                   <strong> Read more...</strong>
                </a>
                </p>

              </li>
              <li class="span3">
                <div class="round-box round-medium">
                  <span class="box-inner">
                    <img alt="some image" class="img-circle" src="{{ URL::asset('images/assets/whatwedobg/stacks2-bg.jpg')}}">

                    <i class="icon-globe"></i>
                  </span>
                </div>
                <h3 class="text-center">Work With Communities </h3>
                <p>
                  We continually strives to be active and helpful in the community. We proudly

donate books to projects, libraries and other good causes across the country. Check out some of

our current partnerships. <a href="communities.html">
                  <strong> Read more...</strong>
                </a>
                </p>

              </li>
              <li class="span3">
                <div class="round-box round-medium">
                  <span class="box-inner">
                    <img alt="some image" class="img-circle" src="{{ URL::asset('images/assets/whatwedobg/money-book-bg.jpg')}}">

                     <i class="icon-group"></i>
                  </span>
                </div>
                <h3 class="text-center">Build Our Ranks</h3>
                <p>
                  Do you remember the frustrations of buying textbooks at inflated costs? Do you want to help do something about it? Well now you can! Earn money while saving money for students by becoming an independant book vendor. <a href="join-our-team.html">
                  <strong> Read more...</strong>
                </a>
                </p>

              </li>
              <li class="span3">
                <div class="round-box round-medium">
                  <span class="box-inner">
                    <img alt="some image" class="img-circle" src="{{ URL::asset('images/assets/whatwedobg/books-fly-bg.jpg') }}">
                             <i class="icon-heart"></i>
                  </span>
                </div>
                <h3 class="text-center">Show Some Love</h3>
                <p>
                 Check us out on Facebook and Twitter. </br></br>
                  <a href="https://www.facebook.com/pages/RecycleAbookcom/256102557767102" target="blank"><i class="icon-facebook-sign"></i>Facebook</a></br></br>
                   <a href="https://www.twitter.com/Recycleabook" target="blank"><i class="icon-twitter-sign"></i>Twitter</a>

                </p>

              </li>
            </ul>
          </div>
        </div>
      </section>
<!--         {{ Form::open(array('action' => 'BookController@postSearch', 'id' => 'price-books-form', 'class' => 'form-inline')) }}



            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                <h3 style="text-align:center;">

                    <span class="alert-danger text-centered">Get paid CASH for your textbooks today! Fast Cash via Paypal  + Free Shipping!</span>
                </h3>

              <div class="col-md-7"><textarea name="isbns" id="isbns" class="form-control" rows="10" data-original-title="" title="" placeholder="Enter ISBN numbers 1 per line.."></textarea>
                <button type="submit" class="btn btn-cart btn-block btn-large form-actions" style="margin-top:10px;margin-bottom:10px;">SELL YOUR BOOKS »</button>
                </div>
                 <div class="col-md-5 hidden-sm hidden-xs"><img src="{{URL::to('img/sell-textbooks-textbook-buybacks2.png')}}"  class="img-responsive" style="max-height:250px;"/></div>
            </div>

        {{ Form::close() }}

        <div class="container" >
            <div class="well well-lg" style="margin-top:30px;">
                <span class="alert-info">Our mission is simple: To help students  receive the most affordable textbooks on  the market. <br /><br />Please join our cause. You  can make a difference.</span>
            </div>
            </div> -->


<!--
        <div style="padding:20px;">
                    {{ Form::open(array('action' => 'BookController@postSearch', 'id' => 'price-books-form', 'class' => 'form-inline')) }}

                        <div class='col-xs-9' style="padding-top:7px;">
                            <input name="isbns" type="tel" id="isbns" class="form-control input-lg" placeholder="Enter ISBNs separate by commas no spaces."  id="single-input"  style="height:46px;"/>
                        </div>
                        <div class='col-xs-3' style="margin-top:5px;">
                            <button type="submit" class="btn btn-cart btn-lg col-xs-7">FIND BOOKS »</button>
                            </div>


                    {{ Form::close() }}
        </div>
-->



@stop