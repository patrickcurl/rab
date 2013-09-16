<?php
use Cartalyst\Sentry\Users\Eloquent\User as SentryUserModel;
class User extends SentryUserModel {

  public function orders(){
    return $this->hasMany('Order');
  }

  public function aff(){
  	return $this->belongsTo('User', 'referred_by');
  }

  public function refs(){
  	return $this->hasMany('User', 'referred_by');
  }







  public static function getCommissions($id){
  	// $commData = array(
  	//                         orders => array(
			//                 	'pending' => 0,
			//                 	'approved' => 0,
			//                 ),
  	//                         commissions => array(
	  // 	                    'pending' => 0.00,
	  // 	                    'approved' => 0.00
  	//                         	                     ),
  	//                         payments => array(

  	//                         )

  	//                         );
  	// $commData['orders']['pending'] = Order->where()

  }
}