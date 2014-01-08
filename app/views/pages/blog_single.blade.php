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






<?php // print_r($post); ?>

	<div class="row-fluid">
		<div class="span3">
		@if(isset($post['attachments'][0]))
		<img src= "{{$post['attachments'][0]['images']['post-thumbnail']['url']}}" title="{{$post['attachments'][0]['title']}}" />
		@endif
		</div>
		<div class="span8">
		<h3><a href="{{URL::to('blog')}}/{{$post['slug']}}" style="color:#008000">{{ $post['title_plain'] }}</a></h3>

		<?php
			$str = $post['content'];
			$content =  preg_replace("/<p[^>]*>[\s|&nbsp;]*<\/p>/", '', $str);
			//$content = strip_tags($content, '<p><a>');
			echo $content;
		?>
		{? // $content = preg_replace('/<p[^>]*>[\s|&nbsp;]*<\/p>/', '', $content); ?}



		<hr>
		</div>
	</div>










@stop