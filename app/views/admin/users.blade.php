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
#addUser .input-medium{
  margin-bottom:0px;
}
</style>
@stop
@section('container_class')
class="container-fluid page-content"
@stop
@section('content')
<h2>Add User</h2>
@foreach($errors->get('first_name') as $message)
              <p class="text-error">{{$message}}</p>
@endforeach
@foreach($errors->get('last_name') as $message)
              <p class="text-error">{{$message}}</p>
@endforeach
@foreach($errors->get('email') as $message)
              <p class="text-error">{{$message}}</p>
@endforeach
@foreach($errors->get('password') as $message)
              <p class="text-error">{{$message}}</p>
@endforeach
{{ Form::open(array('action' => 'AdminController@postAddUser', 'id' => 'addUser')) }}
  {{ Form::text('first_name', null, array('placeholder' => 'First name', 'class' => 'input-medium')) }}
  {{ Form::text('last_name', null, array('placeholder' => 'Last name', 'class' => 'input-medium')) }}
  {{ Form::email('email', null, array('placeholder' => 'Email', 'class' => 'input-medium')) }}
  {{ Form::password('password', array('placeholder' => 'Password', 'class' => 'input-medium')) }}
  {{ Form::password('password_confirmation', array('placeholder' => 'Confirm Password', 'class' => 'input-medium')) }}
  <br /><br />
  <label class="checkbox inline">
    <input type="checkbox" name="groups[admin]"> Admin
  </label>
  <label class="checkbox inline">
    <input type="checkbox" name="groups[customers]"> Customer
  </label>
  <label class="checkbox inline">
    <input type="checkbox" name="groups[buyers]"> Buyer
  </label>
<br /><br />

  {{ Form::button('Add User', array('type' => 'submit', 'class' => 'btn btn-primary')) }}

{{ Form::close() }}
<h4><a href="{{URL::to('/admin/users/admin')}}">Admins</a> | <a href="{{URL::to('/admin/users/buyers')}}">Buyers</a> | <a href="{{URL::to('/admin/users/customers')}}">Customers</a>
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
                @if($user->phone)
                  <dt>Phone</dt>
                  <dd>{{$user->phone}}</dd>
                @endif
                @if($user->payment_method)
                  <dt>Payment Method</dt>
                  <dd>{{$user->payment_method}} </dd>
                @endif
                @if($user->paypal_email)
                <dt>PayPal Email</dt>
                <dd>{{$user->paypal_email}}</dd>
                @endif
                @if($user->name_on_cheque)
                <dt>Name on Cheque</dt>
                <dd>{{$user->name_on_cheque}}</dd>
                @endif

                <dt>Permission Groups</dt>
                <dd>
                   @foreach($groups as $group)
                     <label class="checkbox" for="">
                      <input type="checkbox" @if ($user->inGroup($group)) checked="checked" @endif> {{$group->name}}
                    </label>
                   @endforeach

                </dd>
                <dd><a href="{{URL::to('users/edit')}}/{{$user->id}}">Edit User</a></dd>
                <dd><a href="{{URL::to('users/delete')}}/{{$user->id}}">Delete User</a></dd>
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