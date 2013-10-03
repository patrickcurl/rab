@extends('layouts.master')
@section('hero-start')
Sell Textbooks Get
@stop
@section('hero-end')
Cash
@stop
@section('content')
<div class="row-fluid">
	<h2>{{ $book->title }}</h2>
	<div class="span4"><img src="{{$book->image_url}}" title="{{$book->title}}" /></div>
	<div class="span6">
		<dl class="dl-horizontal">
			<dt>Author: </dt><dd>{{$book->author}}</dd>
			<dt>Publisher: </dt><dd>{{$book->publisher}}</dd>
			<dt>Edition: </dt><dd>{{$book->edition}}</dd>
			<dt>Weight: </dt><dd>{{$book->weight}}</dd>
			<dt>ISBN10: </dt><dd>{{$book->isbn10}}</dd>
			<dt>ISBN13: </dt><dd>{{$book->isbn13}}</dd>
			<dt>Current Price: </dt><dd>${{ number_format($book->price, 2)}}</dd>

		</dl>
	</div>
</div>
@stop