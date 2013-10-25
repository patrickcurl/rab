<?php
namespace api;
  use Illuminate\Support\Facades\View;
  use Illuminate\Routing\Controllers\Controller;

class SuppliesController extends \Controller {
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
	public function store(){

		$item = new \Supply();
		$item->name = \Input::get('name');
		$item->description = \Input::get('description');
		$item->save();
		$item->error = false;
		$item->message = "Item added.";
		return $item;
	}

	public function __construct(){
		$this->beforeFilter("api_admin_auth", array("on"=>array("post", "put", "patch", "delete")));
	}
}