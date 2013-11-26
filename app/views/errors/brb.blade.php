@extends('layouts.error')
@section('hero-start')
Scheduled
@stop

@section('hero-end')
Maintenance
@stop

@section('content')

<div class="row-fluid">
<div class="span5">
	<img src="{{URL::asset('images/brb.jpg')}}">
</div>
<div class="span5">

	<p style="margin-top:50px;">The minions are busy updating the site, we will be back shortly!</p>
</div>
</div>
@stop