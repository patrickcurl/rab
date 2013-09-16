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

  	$commissions = array(
  	                        'orders' => array(
			                	'pending' => array('amount' => 0.00, 'count' => 0),
			                	'approved' => array('amount' => 0.00, 'count' => 0),
			                	'total' => array('amount' => 0.00, 'count' => 0)
			                ),
	                        'earnings' => array(
	                        	'total_commissions' => 0.00,
	                        	'amount_paid' => 0.00,
	                        	'amount_owed' => 0.00,
	                        	'last_payment_amount' => 0.00,
	                        	'last_payment_date' => null
	                                       )

  	                        );
  	$refs = User::find($id)->refs()->get();
  	if($refs){
  		foreach($refs as $ref){
  			$orders = $ref->orders()->get();
  			if($orders){
  				foreach($orders as $order){
  					if($order->received_date == null){
  						$commissions['orders']['pending']['amount'] += $order->total_amount;
  						$commissions['orders']['pending']['count'] += 1;
  					}
  					if($order->received_date != null){
  						$commissions['orders']['approved']['amount'] += $order->total_amount;
  						$commissions['orders']['approved']['count'] += 1;
  					}
  					$commissions['orders']['total']['amount'] += $order->total_amount;
  					$commissions['orders']['total']['count'] += 1;
  				}
  			}
  		}
  	}



  	return $commissions;

  }
}