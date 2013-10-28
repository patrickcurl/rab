<?php
namespace api;
  use Illuminate\Support\Facades\View;
  use Illuminate\Routing\Controllers\Controller;

class SupplyOrdersController extends \Controller {
	protected static $restful = true;
	public function index(){
		$supplies = \Supply::all();
		return $supplies;
	}
	public function destroy($id){
		$supply = \Supply::find($id);
		$supply->delete();
		$response = array('error' => false,
			               'message' => 'Item deleted.');

			return \Response::json($response);

	}

	public function update($id){
		$order = \SupplyOrder::find($id);
		$processed = \Request::get('processed');
		if($isset($processed) && $processed == "on" ){
			$order->processed = 1;
			$order->save();
			return \Response::json(array(
        		'error' => false,
        		'processed' => true),
        		200
    		);
		} else {
			$order->processed = 0;
			$order->save();
			return \Response::json(array(
        		'error' => false,
        		'processed' => false),
        		200
    		);
		}

		return \Response::json(array(
        	'error' => true,
        	'processed' => false),
        	200
    		);
	}



	public function __construct(){
		$this->beforeFilter("api_admin_auth", array("on"=>array("post", "put", "patch", "delete")));
	}
}