@extends('layouts.admin')
@section('head')
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script>
  $(function() {
    $( ".datepicker" ).datepicker();
  });
  </script>

@stop
@section('container_class')
class="container-fluid page-content"
@stop
@section('content')



<ul class="nav nav-tabs admin-tabs" id="myTab">
  <li><a href="#orders" data-toggle="tab">Orders</a></li>
  <li><a href="#users" data-toggle="tab">Users</a></li>

</ul>
<div class="tab-content">
<div class="tab-pane active" id="orders">
  {{ Form::open(array('action' => 'AdminController@postUpdateOrders', 'method' => 'post')) }}
    <div class="col-md-1"></div>
    <table class="table">
        <thead>
        <tr>
          <th>User</th>
          <th>Items</th>
          <th>Tracking Number</th>
          <th>Total</th>
          <th>Date Received / Date Paid</th>

          <th>Comments</th>
          <th>Date Created</th>
        </tr>
      </thead>

      <tbody> @if ($orders)
                <?php $count = 0; ?>
                @foreach ($orders as $order)
                <tr>
                <input type="hidden" name ="orders[{{$count}}][id]" value="{{$order->id}}" />
                  <td >@if ($order->user) {{ $order->user->first_name }} {{ $order->user->last_name }} @endif</td>
                  <td> <?php $itemCount = Item::where('order_id', '=', $order->id)->count(); echo $itemCount ?></td>
                  <td>{{ $order->tracking_number}}</td>
                  <td>{{ number_format($order->total_amount, 2) }}</td>
                  <td class="col-md-3">
                      <div class="container">


                      <div class="input-group">
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="button">Date Received:</button>
                        </span>
                        <input type="text" class="form-control datepicker"  name="orders[{{$count}}][received_date]" readonly>
                        <span class="input-group-addon glyphicon glyphicon-calendar" style="background-color: #488A46;"></span>
                      </div><br />
                      <div class="input-group ">
                        <div class="input-group-btn" >
                          <button class="btn btn-default" type="button" style="padding-right:50px;">Date Paid:</button>
                        </div>
                        <input type="text" class="form-control datepicker" name="orders[{{$count}}][paid_date]" readonly>
                        <span class="input-group-addon glyphicon glyphicon-calendar" style="background-color: #488A46;"></span>
                      </div>

                  </td>

                  <td ><textarea name="orders[{{$count}}][comments]" rows="3" cols="60"/>{{ $order->comments }}</textarea></td>
                  <td >{{date_format($order->created_at, 'm-d-Y') }}</td>
                </tr>
                <?php $count++; ?>
                @endforeach
                @endif
                </tbody>
    </table><div ><button type="submit" name="update_orders" class="btn btn-lg btn-cart">Update Orders</button></div>
    <div style="clear:left;float:left;"><?php echo $orders->links(); ?></div>

         {{ Form::close() }}
</div>
<div class="tab-pane" id="users">

    <table class="table  col-md-12">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Payment Info</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $count = 0; ?>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>
                    {{ $user->address }}
                    <br />{{ $user->city }}, {{ $user->state }}
                    <br />{{ $user->zip }}
                </td>
                <td>Method: {{ $user->payment_method }}
                    <br />Paypal Email: {{ $user->paypal_email }}
                    <br />Name on Cheque: {{ $user->name_on_cheque }}
                </td>
                <td>Joined: {{ date('m/d/Y', strtotime($user->created_at)) }}</td>
                <td><a href="{{ url('users/edit') }}/{{$user->id}}">Edit user</a></td>
               </tr>
            <?php $count++; ?>
            @endforeach

            </tbody>
          </table>
           <div ><button type="submit" name="update_users" class="btn btn-lg btn-cart">Update Users</button>
        </div>
         <div style="clear:left;float:left;"><?php echo $users->links(); ?></div>

                {{ form::close() }}
</div>
</div>



    </div>
@stop
@section('footer')
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
<?php
// $count = 0;
//  foreach ($orders as $order){
?><!-- <script>
// $(function(){
//   $("#received_date_<?php echo $count; ?>").datepicker();

// });
// $(function(){
// $("#paid_date_<?php echo $count; ?>").datepicker();
// });
</script> -->
<?php
//  $count++;
// }

?>
 <script>
 //$('#myTab a').click(function (e) {
//   e.preventDefault()
//   $(this).tab('show')
// })

</script>
@stop