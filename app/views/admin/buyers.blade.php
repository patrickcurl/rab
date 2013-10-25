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
@stop
@section('container_class')
class="container-fluid page-content"
@stop
@section('content')
<h2>Supply Items</h2>
<table class="table table-bordered table-striped" id="supply-list">
<thead></thead>
<tbody >
@if(isset($supplies))
  @foreach($supplies as $supply)
    <tr><td>{{$supply->name}}</td>
    <td>{{$supply->description}}</td>
    <td><a href="#" class="ajax"  data-id="{{$supply->id}}"><i class="icon-remove"></i></a></td></tr>

  @endforeach
@endif
</tbody>
</table>
<h2 id="error-code" style="color:red;"></h2>
{{ Form::open(array('action' => 'api\SuppliesController@store', 'class' => 'form-inline', 'id' => 'addSupply'))}}
  {{Form::text('name', null, array('class' => "input-large", 'placeholder'=> 'Item name')) }}
  {{Form::text('description', null, array('class' => "input-large", 'placeholder'=> 'Item Description')) }}
  {{Form::button('Add Item', array('class' => 'btn btn-success ajax', 'type' => 'submit') )}}
{{ Form::close() }}


@stop
@section('footer')
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });

@stop