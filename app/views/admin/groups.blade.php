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
<h2>Groups</h2>
<ul>
    @foreach ($groups as $group)
        <li>{{$group->name}}</li>
    @endforeach
</ul>
{{ Form::open(array('action' => 'AdminController@postAddGroup', 'method' => 'post'))}}
<div class="input-append">
  <input class="span2" id="appendedInputButton" type="text" name="group_name">
  <button class="btn" type="submit">Add Group</button>
</div>

{{ Form::close() }}
@stop
@section('footer')
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });

@stop