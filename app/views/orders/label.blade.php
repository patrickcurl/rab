
<body onload="window.print();">
<img src="data:image/gif;base64,{{ $ups_label }}" width="651" style="transform: rotate(90deg);-webkit-transform: rotate(90deg); -ms-transform: rotate(90deg);-moz-transform: rotate(90deg);margin-top:150px;text-align:center"/>
<br />
<div style="page-break-before: always;">
</div>
@if (Sentry::check())
<?php

//$currentUser = Sentry::getUser();
?>
<div class="row-fluid">
<h1>Packing Slip</h1>
<table>
  <tr>
    <td style="padding-right:20px;"><strong>Ship To:</strong></td>
    <td style="width: 400px">
                <br />RecycleABook.com
                <br />Attn: Chris Harbaugh
                <br />561 Congress Park Dr
                <br />Dayton, OH 45459</td>
                </td>
    <td style="padding-right:20px;"><strong>Ship From:</strong></td>
    <td>
               <br /> {{ $user->first_name }} {{ $user->last_name }}
                <br />{{ $user->address }}
                <br />{{ $user->city }}, {{ $user->state }} {{ $user->zip }}</td>

</tr></table>


<table class="table container col-md-12">
                  <tr>
                    <td>Book</td>
                    <td>QTY</td>
                    <td>Price</td>
                  </tr>
                @foreach ($items as $item)

                  <tr>
                    <td style="padding-right:20px;">

					@if (strlen($item->title) > 40)
              			<strong>{{ substr($item->title, 0, 40) }}...</strong>
              		@else
              		<strong>{{ $item->title }}</strong>
              		@endif
                    <br />
                    ISBN13: {{$item->isbn13}}<br />
                    Author: {{ $item->author}}</td>
                    <td>{{ $item->qty}}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                  </tr>
                @endforeach
              </table>

</div>
<div class="well offset8 span2"><strong>Total: </strong>${{ number_format($orderTotal ,2)}}</div>

@endif
</body>
