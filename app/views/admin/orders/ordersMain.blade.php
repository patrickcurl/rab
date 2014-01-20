@extends('layouts.admin')
@section('head')
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="{{URL::asset('javascripts/modernizr.custom.min.js')}}"></script>
  <script src="{{URL::asset('javascripts/moment.min.js')}}"></script>
  <script>
    $(function() {
      if (!Modernizr.inputtypes['date']) {
        $('input[type=date]').datepicker();
      }
    });
  </script>
<style>
.popover {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 1010;
  display: none;
  max-width: 500px;
  padding: 1px;
  padding-bottom:20px;
  text-align: left;
  background-color: white;
  -webkit-background-clip: padding-box;
  -moz-background-clip: padding;
  background-clip: padding-box;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  border-radius: 6px;
  -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  white-space: normal;
}
a:hover {
color: #63DB63;
text-decoration: none;
}
a {
color: #4E804E;
text-decoration: none;
}

@media (min-width: 980px) {
    tr.visible-desktop {
        display:table-row !important;
    }
    td.visible-desktop,
    th.visible-desktop {
        display:table-cell !important;
    }
}

@media (min-width: 768px) and (max-width: 979px) {
    tr.hidden-desktop,
    tr.visible-tablet {
        display:table-row !important;
    }
    td.hidden-desktop,
    th.hidden-desktop,
    td.visible-tablet,
    th.visible-tablet {
        display:table-cell !important;
    }
}

@media (max-width: 767px) {
    tr.hidden-desktop,
    tr.visible-phone {
        display:table-row !important;
    }
    td.hidden-desktop,
    th.hidden-desktop,
    td.visible-phone,
    th.visible-phone {
        display:table-cell !important;
    }
}

@media print {
    tr.visible-print {
        display:table-row !important;
    }
    td.visible-print,
    th.visible-print {
        display:table-cell !important;
    }
}

dl dt{
	float:left;
	margin-right:20px;
}
</style>
<script data-require="angular.js@*" data-semver="1.2.0-rc3-nonmin" src="http://code.angularjs.org/1.2.0-rc.3/angular.js"></script>
    <script data-require="ng-table@*" data-semver="0.3.1" src="http://bazalt-cms.com/assets/ng-table/0.3.1/ng-table.js"></script>

    <link data-require="ng-table@*" data-semver="0.3.1" rel="stylesheet" href="http://bazalt-cms.com/assets/ng-table/0.3.1/ng-table.css" />
    <link data-require="bootstrap-css@*" data-semver="3.0.0" rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />

    <link rel="stylesheet" href="style.css" />
      <script type='text/javascript' src="http://vitalets.github.io/angular-xeditable/dist/js/xeditable.js"></script>



      <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css">



      <link rel="stylesheet" type="text/css" href="http://vitalets.github.io/angular-xeditable/dist/css/xeditable.css">



      <script type='text/javascript' src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.6.0/ui-bootstrap-tpls.min.js"></script>
    <?php echo $angJS; // pull in admin.orders._angJS.php ?>
@stop
@section('container_class')
class="container-fluid page-content"
@stop
@section('body_tag')
ng-app="main"
@stop
@section('content')
	<?php echo $angView; // pull in admin.orders._angJS.php

	?>
@stop
@section('footer')


@stop