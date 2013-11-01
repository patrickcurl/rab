<?php
class Item extends Eloquent {
	use Codesleeve\Stapler\Stapler;
	protected $table = 'files';
	protected $fillable = array('book_id', 'qty', 'price');


	// public function book(){
	// 	return $this->hasOne('Book');
	// }

	public function __construct(array $attributes = array()) {

	    $this->hasAttachedFile('file', [
	    ]);

    	parent::__construct($attributes);
	}

// A profile picture belongs to a user.
	public function user(){
    	return $this->belongsTo('User');
	}
}