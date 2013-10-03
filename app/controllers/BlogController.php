<?php
class BlogController extends BaseController {




	public function getIndex($slug=null){
		if($slug){
			$client = new Guzzle\Http\Client('http://blog.recycleabook.com/api/');
	    	$request = $client->get('get_recent_posts/?count=8');
	   		$response = $request->send();
	    	$data = $response->json();
	   	 	$data = $data['posts'];
	    $posts = array();
			return View::make("pages.blog_single");
		}
		return View::make("pages.blog_main");
	}

}
