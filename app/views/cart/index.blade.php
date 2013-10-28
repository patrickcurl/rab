@extends('layouts.master')
@section('hero-start')
View Your
@stop
@section('hero-end')
Cart
@stop
@section('content')


    {{ Form::open(array('url' => 'cart/update', 'method' => 'post')) }}

    <table class="table">
      <tr>
          <td>Book</td>
          <td>Price</td>
          <td>Quantity</td>
          <td>Subtotal</td>
          <td></td>
        </tr>
        <?php $count = 0; ?>
    @foreach ($cart as $item)
    <tr><td>
            <div class="row">
            <div class="col-md-3"><img src="{{ $item->options->image_url }}" width="50%" /></div>
            <div class="col-md-7">
              @if (strlen($item->options->title) > 70)
              <strong>{{ substr($item->options->title, 0, 70) }}...</strong>
              @else
              <strong>{{ $item->options->title }}</strong>
              @endif
              <br />
              Author: {{ $item->options->author }}<br />
              Publisher: {{ $item->options->publisher }}<br />
              Edition: {{ $item->options->edition }}<br />
              Weight: {{ number_format($item->options->weight,2) }}<br />
              ISBN10: {{ $item->options->isbn10 }} <br />
              ISBN13: {{ $item->options->isbn13 }}</div>
            </div>
            </td>
            <td>${{ $item->price }}</div></td>
            <input type="hidden" name="items[{{$count}}][id]" value="{{ $item->rowid }}">
            <?php if($item->qty > 5){ $qty = 5;} else { $qty = $item->qty; } ?>
            <td><input class="form-control" type="number" max="5" name="items[{{$count}}][qty]" value="{{ $qty }}" style="width:50px;" /></td>
            <td>${{ number_format($item->subtotal, 2) }}</td>
            <td> <a href="{{ URL::to('cart/remove')}}?itemId={{$item->rowid}}"><img src="img/cross.png" /></a>

          </tr>
          <?php $count++; ?>
    @endforeach
    test
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td>Total: ${{ number_format(Cart::total(), 2) }}</td>
    </tr>
    <tr>
      <td colspan="5">
 <div class="pull-right clearfix">
   <button type="submit" name="update_cart" class="btn btn-primary">Update Cart</button>
        {{ form::close() }}
        <a href="{{ URL::to('cart/empty') }}" class="btn btn-danger">Empty Cart</a>
        <a href="{{ URL::to('cart/checkout') }}" class="btn btn-success">Check Out</a>

        </div>

      </td>
    </tr>
  </table>

@stop