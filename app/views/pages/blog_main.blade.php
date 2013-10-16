@extends('layouts.master')
@section('head')
<style>
	p:empty { display: none }
</style>
@stop
@section('hero-start')
Blog
@stop
@section('hero-end')
Posts
@stop
@section('content')






@foreach($posts as $post)

	<div class="row-fluid">
		<div class="span3">
		@if(isset($post['attachments'][0]))
		<img src= "{{$post['attachments'][0]['images']['post-thumbnail']['url']}}" title="{{$post['attachments'][0]['title']}}" />
		@endif
		</div>
		<div class="span8">
		<h3><a href="{{URL::to('blog')}}/{{$post['slug']}}" style="color:#008000">{{ $post['title'] }}</a></h3>
		{? $excerpt = strip_tags($post['excerpt'], '<p><a>'); ?}
		<?php
			$str = $post['excerpt'];
			$excerpt =  preg_replace("/<p[^>]*>[\s|&nbsp;]*<\/p>/", '', $str);
			$excerpt = strip_tags($excerpt, '<p><a>');
			echo $excerpt;
		?>
		{? // $excerpt = preg_replace('/<p[^>]*>[\s|&nbsp;]*<\/p>/', '', $excerpt); ?}



		<a href="{{URL::to('blog')}}/{{$post['slug']}}" >Read More</a>
		<hr>
		</div>
	</div>

@endforeach










@stop