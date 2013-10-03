@extends('layouts.admin')
@section('head')
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="{{URL::asset('javascripts/modernizr.custom.min.js')}}"></script>
  <script>
    $(function() {
      if (!Modernizr.inputtypes['date']) {
        $('input[type=date]').datepicker();
      }
    });
  </script>

@stop
@section('container_class')
class="container-fluid page-content"
@stop
@section('content')
{{ Form::open(array('action' => 'AdminController@postUpdateOrders', 'method' => 'post')) }}
<table class="table table-striped table-hover table-condensed">
  <thead>
    <tr>
      <th>User</th>
      <th>Order</th>

    </tr>
  </thead>
  <tbody>
    @if ($orders)
      {? $i = 0; ?}
      @foreach($orders as $order)
        <tr>
          <td>
          <input type="hidden" name ="orders[{{$i}}][id]" value="{{$order->id}}" />
            @if($order->user)
              {? $user = $order->user; ?}
              <dl class="dl-horizontal">
                <dt>Name</dt>
                <dd>{{$user->first_name}} {{$user->last_name}}</dd>
                <dt>Email</dt>
                <dd>{{$user->email}}</dd>
                <dt>Phone</dt>
                <dd>{{$user->phone}}</dd>
                <dt>Payment Method</dt>
                <dd>{{$user->payment_method}}</dd>
                <dt>PayPal Email</dt>
                <dd>{{$user->paypal_email}}</dd>

                <dt>Name on Cheque</dt>
                <dd>{{$user->name_on_cheque}}</dd>


              </dl>
            @endif
          </td>
          <td>
            <dl class="dl-horizontal">
              <dt>Tracking #</dt>
              <dd>{{$order->tracking_number}}</dd>
              <dt>Date Received:</dt>
              <dd><input type="date" name="orders[{{$i}}][received_date]"  value="{? if($order->received_date) { echo date('m/d/Y', strtotime($order->received_date)); } ?}" />
              <dt>Date Paid:</dt>
              <dd><input type="date" name="orders[{{$i}}][paid_date]" value="{? if($order->paid_date) { echo date('m/d/Y', strtotime($order->paid_date)); } ?}" />
            </dl>
          </td>
        </tr>
        {? $i++; ?}
      @endforeach
    @endif
  </tbody>
</table>
<button type="submit" class="btn btn-success">Update Orders</button>
{{ Form::close() }}
@stop
@section('footer')
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });

@stop