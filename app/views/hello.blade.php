@extends('layouts.master')

@section('content')
<div class="hero-unit header">
     <div class="row-fluid">
     <div class="container">



@include('layouts.notifications')
      @if (Session::has('error'))
    {{ trans(Session::get('reason')) }}
@endif
            <div class="col-xs-10 col-xs-offset-1 col-sm-12 col-md-5 col-lg-6">

                    <ul class="unstyled hero_list">
                    <li>
                        <i class="icon-book icon-3x pull-left icon-border"></i><h3 ><span class="badge badge-success home-details-badge">1</span> GET A QUOTE</h3><span class="home-details-text">Type the ISBNs from your books into the form.</span>
                    </li>
                    <li >
                        <i class="icon-truck icon-3x pull-left icon-border"></i><h3><span class="badge badge-success home-details-badge">2</span> SHIP BOOKS</h3><span class="home-details-text">FREE shipping via UPS (Order minimum of $20).</span>
                    </li>
                    <li >
                        <i class="icon-money icon-3x pull-left icon-border"></i><h3 style="margin-left:30px;"><span class="badge badge-success home-details-badge">3</span> GET CASH</h3><span class="home-details-text">Check or PayPal payment upon receipt of books.</span>
                    </li>
                </ul>
            </div>
                <form id="price-books-form" action="{{URL::to('books/search')}}" method="post" class="form-inline">
                    <input type="hidden" id="first_focus" name="first_focus" value="N">
                    <br /><br />
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><textarea name="isbns" id="isbns" class="form-control" rows="10" data-original-title="" title=""></textarea>
                    <button type="submit" class="btn btn-success btn-block btn-large form-actions" style="margin-top:10px;">SELL YOUR BOOKS »</button>
                <?php /* <p id="just-sold" class="muted" style="font-size: 14px">Hannah F. from Warm Springs, GA, just sold 1 book for
              <strong>$45.13</strong></p> */?></div>

                </form>
            </div>
        </div>
    </div>
</div>
<div class="visible-xs">Xtra Small</div>
<div class="visible-sm">Small</div>
<div class="visible-md">Med</div>
<div class="visible-lg">Lg</div>
@stop