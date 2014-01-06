<?php
use  Guzzle\Http\Exception\ServerErrorResponseException;

    View::creator(array('layouts.master', 'single.master'), function($view){

	    try{
	    	if Cache::has('blogJson'){
	    		$data = Cache::get('blogJson');
	    	} else {
	    		$client = new Guzzle\Http\Client('http://blog.recycleabook.com/api/');
	    		$request = $client->get('get_recent_posts/?count=8');
	    		$response = $request->send();
	    		$data = $response->json();
	    	}

		    $data = $data['posts'];
		    $posts = array();

		    foreach($data as $i => $post){
		        $posts[$i]['title'] = $post['title'];
		        $posts[$i]['url'] = $post['url'];
		        if (isset($post['attachments']) && $post['attachments'] != null){
		            $posts[$i]['image'] = $post['attachments'][0]['url'];
		        } else {
		            $posts[$i]['image'] = URL::to('images/assets/landscapes/landscape-2-e-300x300.jpg');
		        }
		        if(isset($post['excerpt'])){
		            $posts[$i]['excerpt'] = $post['excerpt'];
		        } else {
		            $posts[$i]['excerpt'] = 'Click below to read more...';
		        }

		    }
	    	$view->with('posts', $posts);
	    } catch(ServerErrorResponseException $e){
	    	//var_dump($e);
	    	// foreach($e as $ex){
	    	// 	echo $ex->getMessage() . "\n";
	    	// }
	    }



    });

    View::creator('layouts.admin', function($view){
    	$totalUsers = DB::table('users')->count();
        $online = new SentryUsersOnline;
        $onlineUsers = $online->getUsersCount();
        $onlineGuests = $online->getGuestsCount();
        $view->with(
                    array(
                          'totalUsers' => $totalUsers,
                          'onlineUsers' => $online->getUsersCount(),
                          'onlineGuests' => $online->getGuestsCount()
                          )
                    );
    });

?>