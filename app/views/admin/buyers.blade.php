@extends('layouts.admin')
@section('head')
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css" rel="stylesheet">
   <!-- uploadfile -->
{{ HTML::style('stylesheets/basic.css');}}
?
1
{{ HTML::script('javascripts/dropzone.js') }}
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
   </script>
   <script type='text/javascript'>//<![CDATA[
$(window).load(function(){
    $(".phone").text(function(i, text) {
        text = text.replace(/(\d{3})(\d{3})(\d{4})/, "($1) $2-$3");
        return text;
    });
});//]]>

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

<h2>Supply Orders</h2>
<table class="table">
  <thead><tr><th>User Details</th><th>Items</th><th>Processed?</th></tr></thead>
<tbody>
@foreach($orders as $o)
  <tr>
    <td>{{$o->user->first_name}} {{$o->user->last_name}} <i class="fa fa-chevron-right"></i> <a href="mailto:{{$o->user->email}}"><i class="fa fa-envelope"></i></a>
        <br />{{$o->user->address}}
        <br />{{$o->user->city}}, {{$o->user->state}} {{$o->user->zip}}
        <br /><p class="phone">{{$o->user->phone }}</p>
    </td>
    <td>
      @foreach($o->items as $i)
        <strong><u>Item:</u></strong> {{ $i->supply->name }} | <strong><u>Quantity</u></strong>: {{ $i->qty }}
      @endforeach
      </td>
      <td><input type="checkbox" id="processed-{{$o->id}}" data-id="{{$o->id}}" @if($o->processed == true) checked="checked" @endif disabled="disabled"  style="float:left" />
      <div id="processed" style="float:left;margin-left:30px;"><a href="#" class="process" data-id="{{$o->id}}" data-bool="true">Yes</a> | <a href="#" class="process" data-id="{{$o->id}}" data-bool="false">no</a></div></td>
    </tr>
@endforeach
</tbody>
</table>
<form action="{{ url('admin/upload')}}" class="dropzone" id="my-awesome-dropzone">

</form>
@stop
@section('footer')

<script>
  $(function() {
    $( "#datepicker" ).datepicker();

  });
  $(document).ready(function() {

        var settings = $("#mulitplefileuploader").uploadFile({
            url: "{{ URL::to('upload') }}",
            method: "POST",
            allowedTypes:"jpg,png,gif",
            fileName: "myfile",
            autoSubmit:false,
            showStatusAfterSuccess:false,
            onSuccess:function(files,data,xhr)
            {
                $("#preview_image").attr('value',files); //set uploaded image name
                $('#myform').submit();
            },
            onError: function(files,status,errMsg)
            {
                $("#status").html("<font color='green'>Something Wrong</font>");
            }
        });

        $('.submit_form').click(function() {

            var validate = $("#myform").validationEngine('validate');
            var has_file = $(".ajax-file-upload-statusbar").length //check if there files need upload

            if(validate){
                if(has_file == true){
                    settings.startUpload();
                }else{
                    $('#myform').submit();
                }
            }
        });

@stop