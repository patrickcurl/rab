<?php
class BlogController extends BaseController {




	public function getIndex($slug=null){
		if($slug){
			return View::make("pages.blog_single");
		}
		return View::make("pages.blog_main");
	}

}
