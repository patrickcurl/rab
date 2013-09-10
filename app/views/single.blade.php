@extends('layouts.master')

@section('content')


<div class="col-md-12" style="margin-top:100px;">
            {{ Form::open(array('action' => 'BookController@postSearchSingle', 'id' => 'price-books-form', 'class' => 'form-inline')) }}
            <div class="container clearfix" style="margin-top: 20px; margin-bottom: 30px;">
                <div class='col-md-12'>
                    <input name="isbns" type="tel" id="isbns" class="form-control input-lg" placeholder="Enter ISBNs separate by commas no spaces." />
                </div>
                <div class='col-xs-12' style="margin-top:2px;">
                    <button type="submit" class="btn btn-danger btn-lg col-xs-12">SELL YOUR BOOKS »</button>
                    </div>
            </div>


            {{ Form::close() }}
</div>
@stop