<?php

class SupplyOrder extends Eloquent {
	protected $table = 'supplyorders';
	protected $guarded = array();

	public static $rules = array();

	public function items(){
		return $this->hasMany('SupplyItem', 'order_id');
	}

	public function user(){
		return $this->belongsTo('User');
	}
}
