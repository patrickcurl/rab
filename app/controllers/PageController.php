<?php
class PageController extends BaseController {


	public function getJoinOurTeam(){
	    return View::make('pages.join_our_team');
	}

	public function getIndex($slug=null){
		$view = "pages.{$slug}";

		if(View::exists($view)==1){

			return View::make($view);
		} else{
			return View::make('errors.404');
		}

	}

	public function missingMethod($method, $slug=null){

		$view = "pages.{$slug[0]}";
		if(View::exists($view)==1){
			return View::make($view);
		} else
		{
			return View::make('errors.404');
		}
	}

	public function postContact(){
		$data['email'] = Input::get('email');
		$data['name'] = Input::get('name');
		$data['subject'] = Input::get('subject');
		$data['message_content'] = Input::get('message_content');
		Mail::send('emails.contact', $data, function($m) use($data){
	                        $m->to('info@recycleabook.com')->subject("RAB Contact: " .$data['subject']);

	    });
	    return Redirect::to('/p/contact');
	}

}
