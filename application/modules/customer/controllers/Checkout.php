<?php

class Checkout extends CustomerController{
	public $url = "customer/checkout";
	public function __construct(){
		parent::__construct();

		$this->load->model("reservation_model","reserve");
	}

	public function index(){
		$session = $this->session->userdata();

		if(isset($session["cart"]) && count($session["cart"])){
			$data = array();
			$data["product"] = $session["cart"];

			$this->title = "Reservation";
			$this->script = "customer/checkout/script";
			$this->render("customer/checkout",$data);
		}else{
			$this->notification->addError("No item in the cart to be reserved.");
		}
	}
}