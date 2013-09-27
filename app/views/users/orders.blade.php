@extends('layouts.master')
@section('hero-start')
View Order
@stop
@section('hero-end')
History
@stop
@section('content')
<?php $currentUser = Sentry::getUser(); ?>
<br />
@foreach ($orders as $g => $order)
<div class="row-fluid">
  <div class="span4">
  <h4 class="offset2">Order Info</h4>
  <?php $orderNum = $g+1; ?>
  <dl class="dl-horizontal">
    <dt>Order #:</dt><dd>{{ $orderNum }}</dd>
    <dt>Order Date:</dt><dd>{{$order['created_at']->format("n/d/Y") }}</dd>
    <dt>Total: </dt><dd>${{ number_format($order['total_amount'],2) }}</dd>
    <dt>Received Date:</dt> <dd>@if($order['received_date']) {{ date("n/d/Y", strtotime($order['received_date'])) }} @else Pending @endif</dd>
    <dt>Payment Date:</dt> <dd>@if($order['paid_date']) {{ date("n/d/Y", strtotime($order['paid_date'])) }} @else Pending @endif</dd>
    <dt>Shipping Label:</dt><dd><a href="#" class="" onClick='document.getElementById("ifr").src="{{URL::to('orders/label/' . $order['id']) }}";'>Click to Print</a></dd>

              <iframe id='ifr' frameborder="0" scrolling="no" width="0" height="0" /></iframe></dl>
  </div>
  <div class="span8">
    <h4 class="offset1">Items</h4>
    <ul class="unstyled">
      @foreach($order['items'] as $i => $item)
        <li><a href="{{URL::to('/book/'. $item['slug'])}}">{{$item['title']}}</a> - <span style="color:#39993D;">${{ number_format($item['price'],2) }}</span></li>
        <li>QTY: {{$item['qty']}}</li>
<hr />
      @endforeach
    </ul>
    <h4 class="offset1">Comments</h4>
      {{ $order['comments'] }}
  </div>
</div><hr />
@endforeach




<!-- orders -->

@stop