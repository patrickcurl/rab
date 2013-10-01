@extends('layouts.master')
@section('hero-start')
500
@stop

@section('hero-end')
Error
@stop

@section('content')

<div class="row-fluid">
<div class="span5">
	<img src="{{URL::asset('images/500_error.jpg')}}">
</div>
<div class="span5">
	Our developers have been notified and will try to fix the issue, meanwhile - why don't you try another search?
</div>
</div>
@stop