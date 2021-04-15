<?php

class Cart extends CustomerController{
	public $url = "customer/cart";
	public function __construct(){
		parent::__construct();

		$this->load->model("reservation_model","reserve");
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

	public function add(){
		$session = $this->session->userdata();
		$post = $this->input->post();
		$resultset = array();
		if(count($post)){
			if(!isset($session["cart"])){$session["cart"] = array();}
			if(isset($session["cart"][$post["product_id"]])){
				$session["cart"][$post["product_id"]]["qty"] = $session["cart"][$post["product_id"]]["qty"] + $post["qty"];
			}else{
				$session["cart"][$post["product_id"]] = $post;
			}

			$resultset["status"] = true;
			$resultset["message"] = "Product successfully added";

			$this->session->set_userdata("cart",$session["cart"]);
			/*$this->session->set_userdata("cart",array());*/
		}else{
			$resultset["status"] = false;
			$resultset["message"] = "No data found";
		}
		
		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}

	public function update(){
		$session = $this->session->userdata();
		$post = $this->input->post();
		$resultset = array();

		if(count($post)){
			foreach($post["cart"] as $field=>$value){
				if(isset($session["cart"][$field])){
					$session["cart"][$field]["qty"] = $value["qty"];
				}
			}

			$this->session->set_userdata("cart",$session["cart"]);

			$resultset["status"] = true;
			$resultset["message"] = "Product successfully updated.";
			$resultset["data"] = $this->load->view("customer/cart/view",array("product"=>$session["cart"]),true);
		}else{
			$resultset["status"] = false;
			$resultset["message"] = "No data found.";
		}

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}

	public function delete(){
		$session = $this->session->userdata();
		$post = $this->input->post();
		$resultset = array();

		if(count($post)){
			unset($session["cart"][$post["id"]]);

			$this->session->set_userdata("cart",$session["cart"]);

			$resultset["status"] = true;
			$resultset["message"] = "Product successfully deleted.";
			$resultset["data"] = $this->load->view("customer/cart/view",array("product"=>$session["cart"]),true);
		}else{
			$resultset["status"] = false;
			$resultset["message"] = "No data found.";
		}

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}

	public function process(){
		$post = $this->input->post();
		$session = $this->session->userdata();
		$resultset = array();
		$data = array();

		$post["pick_up_date"] = isset($post["pick_up_date"]) && $post["pick_up_date"] ? $post["pick_up_date"] : Date("Y-m-d");
		$post["payment_method"] = isset($post["payment_method"]) && $post["payment_method"] ? $post["payment_method"] : "cash"; 

		$data["reserve"] = array();
		$data["reserve"]["customer_id"] = $session["customer"]["id"];
		$data["reserve"]["created_at"] = Date("Y-m-d");
		$data["reserve"]["pick_up_date"] = $post["pick_up_date"];
		$data["reserve"]["payment_method"] = $post["payment_method"];
		$data["reserve"]["status"] = 1;
		$data["item"] = $session["cart"];

		$reserve = $this->reserve->process($data);
		if($reserve){
			$resultset["status"] = true;
			$resultset["url"] = site_url("customer/cart/receipt/".$reserve);

			$this->session->set_userdata("cart",array());
			$this->notification->addSuccess("Reservation successfully placed.");
		}else{
			$resultset["status"] = false;
			$resultset["message"] = "Something went wrong. Please try again.";
		}

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}

	public function receipt($id){
		$data = array();
		$where = array();

		$where["id"] = $id;
		$data["data"] = $this->reserve->load($where);
		$data["item"] = $this->reserve->reservation_item($id);

		$this->load->view("customer/receipt",$data);
	}
}