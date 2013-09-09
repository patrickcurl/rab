@extends('layouts.master')

@section('content')



            {{ Form::open(array('action' => 'BookController@postSearchSingle', 'id' => 'price-books-form', 'class' => 'form-inline')) }}
            <div class="container clearfix" style="margin-top: 20px; margin-bottom: 30px;">
                <div class='col-md-8'>
                    <input name="isbns" type="tel" id="isbns" class="form-control input-lg" placeholder="Enter ISBNs separate by commas no spaces." />
                </div>
                <div class='col-md-4'>
                    <button type="submit" class="btn btn-danger btn-lg">SELL YOUR BOOKS »</button>
                    </div>
            </div>


            {{ Form::close() }}

@stop