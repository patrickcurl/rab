@extends('layouts.master')

@section('content-fluid')


<!-- <div class="container-fluid" style="padding:50px;"> -->
<div style="padding:20px;">
            {{ Form::open(array('action' => 'BookController@postSearchSingle', 'id' => 'price-books-form', 'class' => 'form-inline')) }}

                <div class='col-xs-12'>
                    <input name="isbns" type="tel" id="isbns" class="form-control input-lg" placeholder="Enter ISBNs separate by commas no spaces."  id="single-input"/>
                </div>
                <div class='col-xs-12' style="margin-top:5px;">
                    <button type="submit" class="btn btn-danger btn-lg col-xs-12">SELL YOUR BOOKS »</button>
                    </div>


            {{ Form::close() }}
</div>
@stop