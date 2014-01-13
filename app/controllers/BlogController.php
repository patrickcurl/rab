<?php
use Carbon\Carbon;
class BlogController extends BaseController {




	public function getIndex($slug=null){
		if(isset($slug)){
			$client = new Guzzle\Http\Client('http://blog.recycleabook.com/api/');
	    	$request = $client->get('get_recent_posts/?count=8');
	   		$response = $request->send();
	    	$data = $response->json();
	   	 	$data = $data['posts'];
	    $posts = array();
	    return $slug;
			return View::make("pages.blog_single", $data);
		} else {
			$page = Input::get('page');
			$page = (isset($page)) ? $page : 1;
			$data = self::blogJson("get_posts/?count=20&page={$page}");


			return View::make("pages.blog_main", array('posts' => $data['posts']));
		}
	}


	// public static function blogJson($req){
	// 	if (Cache::has('blogJson')){
	// 		return Cache::get('blogJson');
	// 	} else {
	// 		$client = new Guzzle\Http\Client('http://blog.recycleabook.com/api/');
	// 		$request = $client->get($req);
	// 		// e.g. $request = $client->get('get_recent_posts/?count=8');
	// 		$response = $request->send();
	// 		$data = $response->json();
	// 		$expiresAt = Carbon::now()->addMinutes(1440);
	// 		Cache::put('blogJson', $data, $expiresAt);
	// 		return Cache::get('blogJson');
	// 	}

	// }

	public static function singlePostJson($slug){
		if(isset($slug)){
			if (Cache::has("post-{$slug}")){
			return Cache::get("post-{$slug}");
		} else {
			$client = new Guzzle\Http\Client('http://blog.recycleabook.com/api/');
			$request = $client->get("get_post?slug={$slug}");
			// e.g. $request = $client->get('get_recent_posts/?count=8');
			$response = $request->send();
			$data = $response->json();
			$expiresAt = Carbon::now()->addMinutes(43200);
			Cache::put("post-{$slug}", $data, $expiresAt);
			//return Cache::get('blogJson');
			return $data;
		}
	} else {
		return null;
	}


	}


	public function missingMethod($slug=null){

		if(isset($slug)){
			$slug = $slug[0];
			$post = self::singlePostJson($slug);
			if(isset($post['status']) &&  $post['status'] == "error"){
				View::make('errors.404');
			} else{
				return View::make("pages.blog_single", array('post' => $post['post']));
			}

		}
		return $slug;
	}
}
