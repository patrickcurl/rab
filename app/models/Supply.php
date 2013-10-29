<?php
class Supply extends Eloquent {

	protected $table = 'supplies';
	protected $fillable = array('name', 'description');
	protected $softDelete = true;
	public function item(){
      return $this->hasMany('SupplyItem');
    }

    public static function findOrInsert($name){
    	$s = Supply::where('name', '=', $name)->first();
    	if(!isset($s)){
    		$s = new Supply();
    	}
    	return $s;
    }
	// public function book(){
	// 	return $this->hasOne('Book');
	// }
}