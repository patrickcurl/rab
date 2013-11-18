<?php

class Doc extends Eloquent {
	protected $table = 'docs';
	protected $fillable = array('name', 'size', 'content_type', 'description');


	public function users(){
	 	return $this->belongsToMany('User');
	}

}