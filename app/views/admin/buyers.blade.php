@extends('layouts.admin')
@section('head')

<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
   <!-- uploadfile -->
{{ HTML::style('stylesheets/basic.css') }}
{{ HTML::script('javascripts/dropzone.js') }}
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" />


    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>


  <style>
    a i {
     padding-right: 5px;
    }
    select.input-sm {line-height: 10px;}
  </style>

  <link rel="stylesheet" href="https://rawgithub.com/jdewit/ez-table/master/dist/ez-table.min.css">
  <script src="//code.angularjs.org/1.2.0-rc.2/angular.js"></script>
  <script src="https://rawgithub.com/jdewit/ez-table/master/dist/ez-table.min.js?v1"></script>
     <!-- x-editable (bootstrap version) -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap-editable/js/bootstrap-editable.min.js"></script>
<?php echo $child; // pull in _ang_files_js partial ?>
@stop
@section('body_tag')
ng-app="myApp"
@stop
@section('container_class')
class="container-fluid page-content"
@stop
@section('content')
<div>
        <span>Username:</span>
        <a href="#" id="username" data-type="text" data-placement="right" data-title="Enter username">superuser</a>
      </div>

      <div>
        <span>Status:</span>
        <a href="#" id="status"></a>
      </div>
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

@include('partials._ang_files')



@stop
@section('footer')

<script>
// $(document).ready(function() {
//   var settings = $("#mulitplefileuploader").uploadFile({
//             url: "{{ URL::to('upload') }}",
//             method: "POST",
//             allowedTypes:"jpg,png,gif",
//             fileName: "myfile",
//             autoSubmit:false,
//             showStatusAfterSuccess:false,
//             onSuccess:function(files,data,xhr)
//             {
//                 $("#preview_image").attr('value',files); //set uploaded image name
//                 $('#myform').submit();
//             },
//             onError: function(files,status,errMsg)
//             {
//                 $("#status").html("<font color='green'>Something Wrong</font>");
//             }
//         });
//         $('.submit_form').click(function() {
//             var validate = $("#myform").validationEngine('validate');
//             var has_file = $(".ajax-file-upload-statusbar").length //check if there files need upload

//             if(validate){
//                 if(has_file == true){
//                     settings.startUpload();
//                 }else{
//                     $('#myform').submit();
//                 }
//             }
//         });

//       });

// });
        </script>
        <script>

$(document).ready(function($) {
$('#username').editable({
    type: 'text',
    title: 'Enter username',
    success: function(response, newValue) {
        userModel.set('username', newValue); //update backbone model
    }
});

    $('button.ajax').on('click', function(event) {
        event.preventDefault();

        var url = "{{URL::to('/api/v1/supplies')}}";

        var newItem = $('#addSupply').serializeObject();
        var tbody = $('#supply-list');
        $.ajax({
            url: url,
            data: newItem,
            type: 'post',
            dataType: 'json',
            success: function(ev){
              console.log(ev);
              if(ev.error === false ){

                $('#supply-list tbody').append('<tr><td>' + ev.name + '</td><td>' + ev.description +'</td><td><a href="#" class="ajax"  data-id="' + ev.id +'"><i class="icon-remove"></i></a></td></tr>');
              } else {

               $('#error-code').text(ev.message).show().fadeOut(1500);

              }

            },
            error: function(hxr, error, status){ alert('Error'); }
        });
    });
    $('#supply-list').on('click', 'a.ajax', function(event) {
        event.preventDefault();
        var id = $(this).data('id');
        var url = "{{URL::to('/api/v1/supplies/')}}" + "/" + id;
        var row = $(this).closest('tr');
        $.ajax({
            url: url,
            type: 'delete',
            dataType: 'json',
            success: function(ev){
              if(ev.error===false){
                row.slideUp('normal', function() { row.remove(); });
              } else {
                 $('#error-code').text(ev.message).fadeIn(0).fadeOut(1500);
              }

            },
            error: function(hxr, error, status){ alert('Error'); }
        });
    });
    $('div#processed').on('click', 'a.process', function(event){
      event.preventDefault();
      var id = $(this).data('id');
      var bool = $(this).data('bool');
      var url = "{{URL::to('/api/v1/sorders/')}}" + "/" + id;
      console.log(id);
      $.ajax({
        url: url,
        type: 'patch',
        data: { processed : bool },
        success: function(ev){
          $('#processed-' + id).attr('checked', bool);


        },
        error: function(hxr, error, status){ alert('Error'); }
      });
      console.log(bool);
    });
  });

@stop