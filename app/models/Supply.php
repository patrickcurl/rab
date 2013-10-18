<?php
class Supply extends Eloquent {

	protected $table = 'supplies';
	protected $fillable = array('name', 'description', 'processed');

	public function item(){
      return $this->hasMany('SupplyItem');
    }
	// public function book(){
	// 	return $this->hasOne('Book');
	// }
}