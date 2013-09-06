@extends('layouts.master')

@section('content')
<div class="hero-unit header">

     <div class="container  clearfix" style="padding-top:30px;">



@include('layouts.notifications')
      @if (Session::has('error'))
    {{ trans(Session::get('reason')) }}
@endif
         <!--   <div class="col-xs-1 col-sm-2  hidden-md hidden-lg"></div>
            <div class="col-xs-10 col-sm-8 col-md-5 col-lg-6" >

                    <ul class="unstyled hero_list clearfix" >

                    <li>
                        <i class="icon-book icon-2x pull-left icon-border"></i><h4><span class="badge badge-success">1</span>  GET A QUOTE</h4><span class="home-details-text">Type the ISBNs from your books into the form. *</span>
                 </li>

                    <li >
                        <i class="icon-truck icon-2x pull-left icon-border"></i><h4><span class="badge badge-success">2</span> SHIP BOOKS</h4><span class="home-details-text">FREE shipping via UPS. **</span>
                    </li>
                    <li >
                        <i class="icon-money icon-2x pull-left icon-border"></i><h4 style="margin-left:30px;"><span class="badge badge-success">3</span> GET CASH</h4><span class="home-details-text">Check or PayPal payment upon receipt of books.</span>
                    </li>
                </ul>
            </div>
            <div class="col-xs-1 col-sm-2 hidden-md hidden-lg"></div>
-->
            {{ Form::open(array('action' => 'BookController@postSearch', 'id' => 'price-books-form', 'class' => 'form-inline')) }}

             <div class="col-xs-12 col-sm-12 col-md-5 col-lg-6"><textarea name="isbns" id="isbns" class="form-control" rows="10" data-original-title="" title=""></textarea>
                    <button type="submit" class="btn btn-success btn-block btn-large form-actions" style="margin-top:10px;margin-bottom:10px;">SELL YOUR BOOKS »</button>

            {{ Form::close() }}
<span style="font-size:10px;">* ISBN is located on back of book or on the copyright page.</span><br />
<span style="font-size:10px;">** Free shipping on orders of $15 or more.</span>
</div>


            </div>


    </div>
</div>

@stop