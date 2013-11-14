<?php
class Upload extends Eloquent {
	protected $table = 'files';
	protected $fillable = array('name', 'size', 'content_type', 'description');


	public function users(){
	 	return $this->belongsToMany('User');
	}

}