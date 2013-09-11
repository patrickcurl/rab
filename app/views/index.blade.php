@extends('layouts.master')
@section('body_tag')
    style=""
@stop
@section('content')

    <div class="container-fluid  clearfix" style="padding-top:30px;background-color:#d2d3cb;">
        {{ Form::open(array('action' => 'BookController@postSearch', 'id' => 'price-books-form', 'class' => 'form-inline')) }}
        <div class="container" >


            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                <h3>
                    <span class="alert-warning">Find out how much your used textbooks are worth.
                    </span>
                    <br /> <br />
                    <span class="alert-danger">Get paid CASH for your textbooks today!</span>
                </h3>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="col-md-7"><textarea name="isbns" id="isbns" class="form-control" rows="10" data-original-title="" title="" placeholder="Enter ISBN numbers 1 per line.."></textarea>
                <button type="submit" class="btn btn-success btn-block btn-large form-actions" style="margin-top:10px;margin-bottom:10px;">SELL YOUR BOOKS »</button>
                </div>
                 <div class="col-md-5 hidden-sm hidden-xs"><img src="{{URL::to('img/sell-textbooks-textbook-buybacks2.png')}}"  class="img-responsive" style="max-height:250px;"/></div>
            </div>

        {{ Form::close() }}
        </div>
        <div class="container">
            <div class="col-md-12 well well-lg">
                <span class="alert-info">Our mission is simple: To help students  receive the most affordable textbooks on  the market. <br /><br />Please join our cause. You  can make a difference.</span>
            </div>
            </div>
        </div>
        </div>








@stop