<?php
class SupplyItem extends Eloquent {

	protected $table = 'supply_items';
	protected $fillable = array('supply_id', 'qty', 'price');

	public function order(){
		return $this->belongsTo('Order');
	}

	public function book(){
		return $this->belongsTo('Supply');
	}
	// public function book(){
	// 	return $this->hasOne('Book');
	// }
}