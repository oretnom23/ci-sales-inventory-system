<?php 

class Notifications extends AdminController{
	public $url = "admin/setting/notification";

	public function __construct(){
		parent::__construct();

		$this->load->model("crud_model","crud");
		$this->load->model("product_model","product");
	}

	public function index(){
		$data = array();
		$where = array();

		$where["qty <"] = 5;
		$data["collection"] = $this->product->collection($where);

		$this->title = "Notifications";
		$this->render("admin/setting/notification",$data);
	}
}