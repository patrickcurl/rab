@extends('layouts.master')

@section('content')
<div class="hero-unit header">
    <div class="container">


        <div class="row-fluid">

            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-md-5 col-lg-5">
                    <ul class="unstyled hero_list">
                    <li>
                        <i class="icon-book icon-3x pull-left icon-border"></i><h3><span class="badge badge-success">1</span> GET A QUOTE</h3>Type the ISBNs from your books into the form.
                    </li>
                    <li >
                        <i class="icon-truck icon-3x pull-left icon-border"></i><h3><span class="badge badge-success">2</span> SHIP BOOKS</h3>FREE shipping via UPS (Order minimum of $20).
                    </li>
                    <li >
                        <i class="icon-money icon-3x pull-left icon-border"></i><h3><span class="badge badge-success">3</span> GET CASH</h3>Check or PayPal payment upon receipt of books.
                    </li>
                </ul>
            </div>

            <div class="col-xs-10 col-sm-8 col-md-5 col-lg-6" style="margin-top:50px;">
                <form id="price-books-form" action="{{URL::to('book/search')}}" method="post" class="form-inline">
                    <input type="hidden" id="first_focus" name="first_focus" value="N">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><i class="icon-hand-right  arrow"></i></div><div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><textarea name="isbn" id="price_my_books_textarea" class="form-control" rows="5" data-original-title="" title=""></textarea>
                <p><button type="submit" class="btn btn-success btn-block btn-large form-actions">SELL YOUR BOOKS »</button></p>
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