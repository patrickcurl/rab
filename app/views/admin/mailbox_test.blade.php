@extends('layouts.admin')
@section('html')

@stop
@section('head')

  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css" rel="stylesheet">
<script src="{{asset('javascripts/dtables/jquery.js')}}"></script>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="{{asset('javascripts/dtables/jquery.dataTables.js')}}"></script>



@stop
@section('body_tag')
@stop
@section('container_class')
class="container-fluid page-content"
@stop
@section('content')
@include('partials._ang_mailbox')
<div id="dynamic">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
    <thead>
        <tr>
            <th width="20%">Rendering engine</th>
            <th width="25%">Browser</th>
            <th width="25%">Platform(s)</th>
            <th width="15%">Engine version</th>
            <th width="15%">CSS grade</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
    <tfoot>
        <tr>
            <th>Rendering engine</th>
            <th>Browser</th>
            <th>Platform(s)</th>
            <th>Engine version</th>
            <th>CSS grade</th>
        </tr>
    </tfoot>
</table>
            </div>
@stop
@section('footer')

<script type="text/javascript">
            $(document).ready(function() {
                var oTable = $('#example').dataTable( {
                    "bProcessing": true,
                    "sAjaxSource": '/admin/mailbox/json'
                } );
                console.log(oTable);
            } );
        </script>
@stop