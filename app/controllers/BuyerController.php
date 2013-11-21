<?php

class BuyerController extends BaseController {


	public function getDocs()
	{
		$user = Sentry::getUser();
		$data['files'] = $user->docs()->get();
		return View::make('single.docs', $data);
	}

}