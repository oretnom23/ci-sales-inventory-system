<?php 

class Account extends CustomerController{
	public $url = "customer/account";
	public function __construct(){
		parent::__construct();

		$this->load->model("crud_model","crud");
	}

	public function index(){
		$session = $this->session->userdata();
		$where = array();
		$data = array();

		$where["id"] = $session["customer"]["id"];
		$data["customer"] = $this->crud->load("customer",$where);



		$this->title = "My Account";
		$this->sidebar = "customer/sidebar";
		$this->script = "customer/account/script";
		$this->render("customer/account",$data);
	}

	public function password(){
		$post = $this->input->post();
		$resultset = array();
		$where = array();

		$where["id"] = $post["id"];
		$customer = $this->crud->load("customer",$where);
		if($customer){
			if($customer["password"] == md5($post["password"]["old"])){
				$data = array();
				$data["password"] = md5($post["password"]["new"]);

				$update = $this->crud->update("customer",$data,$where);
				if($update){
					$resultset["status"] = true;

					$this->notification->addSuccess("Password successfully updated.");
				}else{
					$resultset["status"] = false;
					$resultset["mesasge"] = "Something went wrong. Please try again later.";
				}
			}else{
				$resultset["status"] = false;
				$resultset["message"] = "Old password did not match.";
			}
		}else{
			$resultset["status"] = false;
			$resultset["message"] = "Customer not found.";
		}

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}

	public function update(){
		$post = $this->input->post();
		$resultset = array();
		$where = array();
		$data = array();

		$where["id"] = $post["id"];
		$data["fullname"] = $post["fullname"];
		$data["email"]  = $post["email"];
		$data["phone"] = $post["phone"];

		$update = $this->crud->update("customer",$data,$where);
		if($update){
			$resultset["status"] = true;

			$this->notification->addSuccess("Account successfully updated.");
		}else{
			$resultset["status"] = false;
			$resultset["message"] = "Something went wrong. Please try again later.";
		}

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}

	public function logout(){
		$this->session->set_userdata("customer",array());
		$this->session->set_userdata("cart",array());

		$this->notification->addSuccess("Successfully logout.");
		redirect("home","refresh");
	}
}