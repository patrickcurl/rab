<html>
<head>
<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" />
<style>
.page { page-break-before:always; }
</style>
</head>
<body>
<div class="row-fluid">
<h1 style="padding-top:70px;padding-left:20px">Packing Slip</h1>
<table>
  <tr>
    <td style="padding-right:20px;"><strong>Ship To:</strong>
                <br />RecycleABook.com
                <br />Attn: Chris Harbaugh
                <br />561 Congress Park Dr
                <br />Dayton, OH 45459</td>

    <td style="padding-left:150px;"><strong>Ship From:</strong>
               <br />  @if(isset($user->first_name)) {{ $user->first_name }} @endif
               		  @if(isset($user->last_name)) {{ $user->last_name }}@endif
                <br />@if(isset($user->address)) {{ $user->address }}@endif
                <br />@if(isset($user->city)) {{ $user->city }}@endif,
                      @if(isset($user->state)) {{ $user->state }} @endif
                      @if(isset($user->zip)) {{ $user->zip }} @endif
                <br />@if(isset($user->email)) {{ $user->email }} @endif
</td>
</tr></table>


<table class="table col-md-12">
                  <tr>
                    <td>Book</td>
                    <td>QTY</td>
                    <td>Price</td>
                  </tr>
                @foreach ($items as $item)

                  <tr>
                    <td style="padding-right:20px;">
					@if(isset($item->title))
						@if (strlen($item->title) > 40)
	              			<strong>{{ substr($item->title, 0, 40) }}...</strong>
	              		@else
	              		<strong>{{ $item->title }}</strong>
	              		@endif
              		@endif
                    <br />
                    @if(isset($item->isbn13)) ISBN13: {{$item->isbn13}} @endif<br />
                    @if(isset($item->author)) Author: {{ $item->author}} @endif</td>
                    <td>@if(isset($item->qty)) {{ $item->qty}} @endif</td>
                    <td>@if(isset($item->price)) ${{ number_format($item->price, 2) }} @endif</td>
                  </tr>
                @endforeach
              </table>

</div>
<div class="well offset6 span2"><strong>Total: </strong>${{ number_format($orderTotal ,2)}}</div>
<div class="page">


<img src="{{URL::to($label)}}" height="1000" style="text-align:center;"/>
</div>
</body></html>