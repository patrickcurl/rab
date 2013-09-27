<?php
class PageController extends BaseController {


	public function getJoinOurTeam(){
	    return View::make('pages.join-team');
	}

	public function getIndex($slug=null){
		return View::make("pages." . $slug);
	}

	public function postContact(){
		$data['email'] = 'patrickwcurl@gmail.com';
		$data['name'] = Input::get('name');
		$data['subject'] = Input::get('subject');
		$data['message_content'] = Input::get('message_content');
		Mail::send('emails.contact', $data, function($m) use($data){
	                        $m->to($data['email'])->subject("RecycleABook Contact Form: " .$data['subject']);

	    });
	    return Redirect::to('/p/contact');
	}

}
