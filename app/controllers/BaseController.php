<?php
use Guzzle\Http\Client;
class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
         // $client = new Guzzle\Http\Client('http://blog.recycleabook.com/api/');
         // $request = $client->get('get_recent_posts/?count=6');
         // $response = $request->send();
         // $data = $response->json();
         // $data = $data['posts'];
         // $posts = array();

         // foreach($data as $i => $post){
         //     $posts[$i]['title'] = $post['title'];
         //     $posts[$i]['url'] = $post['url'];
         //     if (isset($post['attachments']) && $post['attachments'] != null){
         //         $posts[$i]['image'] = $post['attachments'][0]['url'];
         //     } else {
         //         $posts[$i]['image'] = URL::to('images/assets/landscapes/landscape-2-e-300x300.jpg');
         //     }
         //     if(isset($post['excerpt'])){
         //         $posts[$i]['excerpt'] = $post['excerpt'];
         //     } else {
         //         $posts[$i]['excerpt'] = 'Click below ot read more...';
         //     }

         //      }
         //       View::share("posts", $posts);
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

		public function __construct(){
		$this->beforeFilter("csrf", array("on"=>array("post", "put", "patch", "delete")));




    $state_list = array(
          "" => "", // Base or Default case.
          "AL"=>"Alabama", "AK"=>"Alaska",
          "AZ"=>"Arizona", "AR"=>"Arkansas",
          "CA"=>"California", "CO"=>"Colorado",
          "CT"=>"Connecticut", "DE"=>"Delaware",
          "DC"=>"District Of Columbia", "FL"=>"Florida",
          "GA"=>"Georgia", "HI"=>"Hawaii",
          "ID"=>"Idaho", "IL"=>"Illinois",
          "IN"=>"Indiana", "IA"=>"Iowa",
          "KS"=>"Kansas", "KY"=>"Kentucky",
          "LA"=>"Louisiana", "ME"=>"Maine",
          "MD"=>"Maryland", "MA"=>"Massachusetts",
          "MI"=>"Michigan", "MN"=>"Minnesota",
          "MS"=>"Mississippi", "MO"=>"Missouri",
          "MT"=>"Montana", "NE"=>"Nebraska",
          "NV"=>"Nevada", "NH"=>"New Hampshire",
          "NJ"=>"New Jersey", "NM"=>"New Mexico",
          "NY"=>"New York",  "NC"=>"North Carolina",
          "ND"=>"North Dakota", "OH"=>"Ohio",
          "OK"=>"Oklahoma",  "OR"=>"Oregon",
          "PA"=>"Pennsylvania", "RI"=>"Rhode Island",
          "SC"=>"South Carolina", "SD"=>"South Dakota",
          "TN"=>"Tennessee", "TX"=>"Texas",
          "UT"=>"Utah", "VT"=>"Vermont",
          "VA"=>"Virginia", "WA"=>"Washington",
          "WV"=>"West Virginia", "WI"=>"Wisconsin",
          "WY"=>"Wyoming");
		View::share("state_list", $state_list);

	}



}