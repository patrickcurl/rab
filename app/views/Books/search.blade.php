@extends('layouts.master')

@section('content')

<div class="container">
    <?php $numBooks = count($books); ?>
    {{ $numBooks }}
    @foreach ($books as $key => $book)
    <div class="row" style="<?php if($key < $numBooks-1 ){echo "border-bottom:1px solid black";} ?>; padding:10px;">
        @if (strlen($book->title) > 110)
        <div class="col-md-10">
            <h2>{{ substr($book->title, 0, 110) }}...</h2>
        </div>
        @else
        <div class="col-md-10"><h3>{{ $book->title }}</h3>
        </div>
        @endif
        <div class="col-md-3 col-md-offset-1 muted">
        <img src="<?php if ($book->image_url) {echo $book->image_url; } else {echo URL::asset('img/no_image.png'); } ?>" width="200" height="300" class="img-thumbnail"><br />
        </div>

        <div class="col-md-6" style="padding-top:30px;" >
        <dl class="dl-horizontal" style="display: inline-block !important;
    vertical-align: middle !important;">
            <dt>Author:</dt><dd>{{  $book->author }}</dd>
            <dt>Publisher:</dt><dd>{{  $book->publisher }}</dd>
            <dt>Edition:</dt><dd>{{  $book->edition }}</dd>
            <dt>Weight:</dt><dd>{{ number_format($book->weight, 2) }} lbs</dd>
            <dt>ISBN:</dt><dd>{{ $book->isbn10 }} / {{ $book->isbn13 }}</dd>
            <dt>More info:</dt><dd><a href="{{ $book->amazon_url }}" target="_blank">View Book Details on Amazon</a></dd>
        </dl>
        </div>

    </div>
    @endforeach

</div>

@stop