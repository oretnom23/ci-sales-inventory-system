<?php 

class Cart extends FrontendController{
	public function __construct(){
		parent::__construct();

		$this->load->model("slider_model","slider");
	}

	public function index(){
		$session = $this->session->userdata();
		$data = array();
		$data["url"] = site_url("customer/checkout");

		$data["product"] = isset($session["cart"]) ? $session["cart"] : array();
		if(isset($session["customer"]) && count($session["customer"])){
			$data["url"] = site_url("customer/checkout");
		}else{
			$data["url"] = site_url("customer/login") . "?url=" . urlencode(site_url("customer/checkout"));
		}

		$this->title = "Cart";
		$this->script = "customer/cart/script";
		$this->render("customer/cart",$data);
	}
}