<?php 

class User_role_model extends CI_Model{
	function __construct(){
		parent::__construct();

		$this->load->model("crud_model","crud");
	}

	function collection($where){
		$resultset = array();

		$collection = $this->crud->collection("user_role",$where);
		if($collection->num_rows() > 0){
			$resultset = $collection->result_array();
		}

		return $resultset;
	}

	function user_access_control(){
		$collection = array();

		$collection["inventory"] = array();
		$collection["inventory"]["product"] = array("label"=>"Product","url"=>"admin/inventory/product");
		$collection["inventory"]["category"] = array("label"=>"Category","url"=>"admin/inventory/category");
		$collection["inventory"]["supplier"] = array("label"=>"Supplier","url"=>"admin/inventory/supplier");
		$collection["inventory"]["order"] = array("label"=>"Sales Order","url"=>"admin/inventory/sales");

		$collection["pos"] = array();
		$collection["pos"]["teller"] = array("label"=>"Teller","url"=>"admin/pos/teller");
		$collection["pos"]["reservation"] = array("label"=>"Reservation","url"=>"admin/pos/reservation");

		$collection["report"] = array();
		$collection["report"]["sales"] = array("label"=>"Sales","url"=>"admin/report/sales");
		$collection["report"]["reservation"] = array("label"=>"Reservation","url"=>"admin/report/reservation");
		$collection["report"]["inventory"] = array("label"=>"Inventory","url"=>"admin/report/inventory");


		$collection["user_management"] = array();
		$collection["user_management"]["user"] = array("label"=>"User","url"=>"admin/user/manage");
		$collection["user_management"]["role"] = array("label"=>"Role","url"=>"admin/user/role");

		$collection["settings"] = array();
		$collection["settings"]["notifications"] = array("label"=>"Notifications","url"=>"admin/setting/notifications");
		$collection["settings"]["slider"] = array("label"=>"Sliders","url"=>"admin/setting/slider");
		$collection["settings"]["page"] = array("label"=>"Page","url"=>"admin/setting/page");

		return $collection;
	}
}