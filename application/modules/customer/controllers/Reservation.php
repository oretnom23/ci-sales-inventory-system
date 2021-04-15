<?php 

class Reservation extends CustomerController{
	public function __construct(){
		parent::__construct();

		$this->load->model("reservation_model","reservation");
	}

	public function index(){
		$session = $this->session->userdata();
		$where = array();
		$data = array();

		$where["reserve.customer_id"] = $session["customer"]["id"];
		$where["reserve.status !="] = 0;

		$data["reservation"] = $this->reservation->collection($where);

		$this->title = "My Account - Reservation";
		$this->sidebar = "customer/sidebar";
		$this->script = "customer/reservation/script";
		$this->render("customer/reservation",$data);
	}

	public function load($id){
		$where = array();
		$resultset = array();
		$where["id"] = $id;

		$reservation = $this->reservation->load($where);
		if($reservation){
			$reservation["item"] = $this->reservation->reservation_item($reservation["id"]);
			$resultset["status"] = true;
			$resultset["data"] = $this->load->view("customer/reservation/view",$reservation,true);
		}else{
			$resultset["status"] = false;
			$resultset["message"] = "Reservation does not exist.";
		}

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}
}