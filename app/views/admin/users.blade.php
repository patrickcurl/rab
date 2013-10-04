@extends('layouts.admin')
@section('head')
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
   <script>
  $(function() {
    $( "#datepicker2" ).datepicker();
  });
  </script>
  <style>
.popover {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 1010;
  display: none;
  max-width: 500px;
  padding: 1px;
  padding-bottom:20px;
  text-align: left;
  background-color: white;
  -webkit-background-clip: padding-box;
  -moz-background-clip: padding;
  background-clip: padding-box;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  border-radius: 6px;
  -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  white-space: normal;
}
a:hover {
color: #63DB63;
text-decoration: none;
}
a {
color: #4E804E;
text-decoration: none;
}
</style>
@stop
@section('container_class')
class="container-fluid page-content"
@stop
@section('content')
<table class="table table-striped">
    <thead><tr><th>User Details</th><th>Orders</th></tr></thead>
    {? $i = 0; ?}
    <tbody>

    @foreach($users as $user)
    {? ?}
        <tr>
          <td>
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

                <dd><a href="{{URL::to('users/edit')}}/{{$user->id}}">Edit User</a></dd>
                <dt>Permission Groups</dt>
                <dd>
                   @foreach($groups as $group)
                     <label class="checkbox" for="">
                      <input type="checkbox" @if ($user->inGroup($group)) checked="checked" @endif> {{$group->name}}
                    </label>
                   @endforeach

                </dd>
              </dl>


          </td>
          <td>
              @foreach($user->orders as $order)
            <ul class="unstyled">
              <li><strong>Order ID:</strong> {{$order->id }}
                  <ul class="unstyled">
                      <li><strong>Total:</strong> {{ number_format($order->total_amount, 2) }}</li>
                      <li>
                         <ul > @foreach ($order->items as $item)
                              <li> <a href="{{URL::to('book')}}/{{{$item->book->slug}}}" class="book-item"
                data-content="<div>
                                <div style='float:left;width:150px;'>
                                    <img src='{{$item->book->image_url}}' width='100' />
                                </div>
                                <div style='float:left;width:300px;margin-left:5px'>
                                    <strong>Author</strong>: {{$item->book->author}}<br />
                                    <strong>Publisher</strong>: {{$item->book->publisher}}<br />
                                    <strong>Edition</strong>: {{$item->book->edition}}<br />
                                    <strong>Weight</strong>: {{number_format($item->book->weight, 2) }}<br />
                                    <strong>ISBN10</strong>: {{$item->book->isbn10}}<br />
                                    <strong>ISBN13</strong>: {{$item->book->isbn13}}<br />
                                    <strong>Price</strong>: ${{number_format($item->price, 2)}}



                                </div>
                              </div>"
                data-title="{{$item->book->slug}}"
                >{{$item->book->title}}</a>
                              </li>
                          @endforeach </ul>
                      </li>
                  </ul>
              </li>
            </ul>
            @endforeach
          </td>
        </tr>
    @endforeach

    </tbody>
    </table>
@stop
@section('footer')
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
</script>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){

$('.book-item').popover({
    placement: "bottom",
    trigger: "hover",
    html: true,

});

});//]]>
</script>
@stop