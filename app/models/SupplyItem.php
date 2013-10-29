<?php
class SupplyItem extends Eloquent {

	protected $table = 'SupplyItems';
	protected $fillable = array('supply_id', 'qty', 'price');

	public function order(){
		return $this->belongsTo('SupplyOrder', 'order_id');
	}

	public function supply(){
		return $this->belongsTo('Supply')->withTrashed();
	}

	// public function book(){
	// 	return $this->hasOne('Book');
	// }
}