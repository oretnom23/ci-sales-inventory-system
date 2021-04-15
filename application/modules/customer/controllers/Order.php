<?php 

 class Order extends CustomerController{
 	public function __construct(){
 		parent::__construct();

 		$this->load->model("sales_model","sales");
 	}

 	public function index(){
 		$session = $this->session->userdata();
 		$where = array();
 		$data = array();
 		
 		$where["customer_id"] = $session["customer"]["id"];
 		$where["status"] = 1;
 		$data["order"] = $this->sales->collection($where);

 		$this->title = "My Account - Order";
 		$this->sidebar = "customer/sidebar";
 		$this->script = "customer/order/script";
 		$this->render("customer/order",$data);
 	}

 	public function load($id){
 		$where = array();
 		$resultset = array();
 		$where["id"] = $id;

 		$order = $this->sales->load($where);
 		if($order){
 			$resultset["status"] = true;
 			$resultset["data"] = $this->load->view("customer/order/view",$order,true);
 		}else{
 			$resultset["status"] = false;
 			$resultset["message"] = "Order does not exist.";
 		}

 		$this->output->set_content_type("json")->set_output(json_encode($resultset));
 	}
 }