<?php

class BuyerController extends BaseController {
    public function __construct(){
        $this->beforeFilter("buyer_auth");
    }

	public function getDocs()
	{
		$user = Sentry::getUser();
		$data['files'] = $user->docs()->get();

        // If this errors - make sure that 'users' => array ( .. 'model' => 'User' ...)
        // is in app/config/packages/cartalyst/sentry/config.php and that User model Extends Sentry.
        // If file doesn't exist run php artisan config:publish Cartalyst/Sentry

        return View::make('single.docs', $data);
	}

}