<?php
use Carbon\Carbon;
class Order extends Eloquent {

	protected $table = 'orders';
	protected $fillable = array('user_id', 'tracking_number', 'total_amount', 'received_date', 'paid_date', 'comments');

	public function items(){
		return $this->hasMany('Item');
	}
  public static function gDate()
{ $tmpdate = self::created_at;
     if ($tmpdate == "0000-00-00" || $tmpdate == "") {
          return null;
      } else {
          return date('m/d/Y',strtotime($tmpdate));
      }
}

	public function user(){
		return $this->belongsTo('User');
	}

  public static function setDate($date, $field){
    if ($date){

     $fieldVal = date('Y-m-d', (strtotime($date)));
    } else {
      $fieldVal = '';
    }
   //return var_dump($fieldVal);
    return $fieldVal;
  }

  public static function getDate($date, $field) {
      $tmpdate = self::$field;
      if ($tmpdate == "0000-00-00" || $tmpdate == "") {
          return "";
      } else {
          return date('m/d/Y',strtotime($tmpdate));
      }
  }

}