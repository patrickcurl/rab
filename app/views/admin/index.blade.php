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
<div style="height:600px;"><iframe src="http://stats.recycleabook.com/index.php?module=Widgetize&action=iframe&moduleToWidgetize=Dashboard&actionToWidgetize=index&idSite=1&period=week&date=yesterday" frameborder="0" marginheight="0" marginwidth="0" width="100%" height="100%"></iframe></div>
@stop
@section('footer')





@stop