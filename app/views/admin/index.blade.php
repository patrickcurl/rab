@extends('layouts.admin')
@section('head')
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


@stop
@section('container_class')
class="container-fluid page-content"
@stop
@section('content')

Total Orders: {{ $o['total'] }} | Paid: {{ $o['paid'] }} | Unpaid: {{ $o['unpaid'] }} | Received: {{ $o['rec'] }} | Not Received: {{ $o['no-rec'] }}

@stop
@section('footer')





@stop