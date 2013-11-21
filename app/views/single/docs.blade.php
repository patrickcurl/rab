@extends('single.master')
@section('content')
<div class="clearfix"></div>
<h2>Files &amp; Documents</h2>

<table class="table">
	<thead>
		<tr>
			<th>File</th><th>Extension</th><th>Date</th>
		</tr>
	</thead>
	<tbody>
		@foreach($files as $file)
		<tr>
			<td><a href="{{URL::to('/uploads')}}/{{$file->name}}.{{$file->ext}}">{{$file->name}}</a></td>
			<td>{{$file->ext}}</td>
			<td>{{$file->created_at}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@stop