@extends('single.master')
@section('content')
<div class="clearfix"></div>
<h2>Order Supplies</h2>
{{ Form::open(array('action' => 'SuppliesController@postOrder'))}}
<table class="table">
<thead>
<tr><th>Item</th><th>Description</th><th>QTY</th></tr>
</thead>
<tbody>

@foreach($supplies as $i => $item)
{{Form::hidden("newItems[$i][id]", $item->id)}}
<tr><td>{{$item->name}}</td><td>{{$item->description}}</td><td>{{ Form::text("newItems[$i][qty]") }}</td></tr>
@endforeach


</tbody>
</table>
{{ Form::button('Order Supplies', array('type' => 'submit', 'class' => 'btn btn-success')) }}
{{ Form::close() }}
@stop