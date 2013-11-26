@extends('layouts.admin')
@section('head')

{{ HTML::script('javascripts/jquery-1.9.1.js') }}
   <!-- uploadfile -->
{{ HTML::style('stylesheets/basic.css') }}

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" />
{{ HTML::style('stylesheets/dropzone.css') }}
{{ HTML::style('stylesheets/ez-table.min.css') }}
{{ HTML::script('javascripts/dropzone.js') }}

  <style>
    a i {
     padding-right: 5px;
    }
    select.input-sm {line-height: 10px;}
    SELECT, INPUT[type="text"] {
    width: 160px;
    box-sizing: border-box;
}
SECTION {
    padding: 8px;
    background-color: #f0f0f0;
    overflow: auto;
}
SECTION > DIV {
    float: left;
    padding: 4px;
}
#btnLeft{
  width:50px;
  margin-top:50px;
}
#btnRight{
  width:50px;
  margin-top:50px;
}
SECTION > DIV + DIV {
    width:130px;
    text-align: center;
  </style>


  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.8/angular.min.js"></script>
  {{ HTML::script('javascripts/ez-table.js') }}
     <!-- x-editable (bootstrap version) -->

{{ HTML::style('stylesheets/xeditable.css') }}
{{ HTML::script('javascripts/xeditable.js') }}

<?php echo $child; // pull in _ang_files_js partial ?>
@stop
@section('body_tag')
ng-app="myApp"
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


</script>
@stop