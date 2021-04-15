<?php

class Login extends FrontendController{
	public $url = "customer/login";
	public function __construct(){
		parent::__construct();

		$this->load->model("crud_model","crud");
	}

	public function _remap($method,$param = array()){
		$session = $this->session->userdata();

		if(isset($session["customer"]) && count($session["customer"])){
			redirect("customer/account");
		}else{
			return call_user_func_array(array($this,$method),$param);
		}
	}

	public function index(){
		$get = $this->input->get();
		$data = array();

		if(isset($get["url"]) && $get["url"]){
			$data["url"] = urldecode($get["url"]);
		}

		$this->title = "Login";
		$this->script = "customer/login/script";
		$this->render("customer/Login",$data);
	}

	public function authenticate(){
		$post = $this->input->post();
		$resultset = array();

		if(count($post)){
			$data = array();
			$data["username"] = $post["username"];
			$data["password"] = md5($post["password"]);

			$customer = $this->crud->load("customer",$data);
			if($customer){
				$session = array();
				$session["id"] = $customer["id"];
				$session["fullname"] = $customer["fullname"];
				$session["username"] = $customer["username"];

				$this->session->set_userdata("customer",$session);
				if($this->session->userdata("cart")){

				}else{
					$this->session->set_userdata("cart",array());
				}

				$resultset["status"] = true;
				if(isset($post["url"]) && $post["url"]){
					$resultset["url"] = $post["url"];
				}
			}else{
				$resultset["status"] = false;
				$resultset["message"] = "Invalid login credentials.";
			}
		}else{
			$resultset["status"] = false;
			$resultset["message"] = "No data found.";
		}

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}

	public function register(){
		$resultset = array();
		$post = $this->input->post();

		if(count($post)){
			$data = array();
			$data["username"] = $post["username"];
			$data["password"] = md5($post["password"]);
			$data["email"] = $post["email"];
			$data["fullname"] = $post["fullname"];
			$data["phone"] = $post["phone"];
			$data["created_at"] = Date("Y-m-d");
			$data["status"] = 1;

			$customer = $this->crud->insert("customer",$data);
			if($customer){
				$session = array();
				$session["id"] = $customer;
				$session["email"] = $data["email"];
				$session["phone"] = $data["phone"];
				$session["username"] = $data["username"];
				$session["fullname"] = $data["fullname"];
				
				$this->session->set_userdata("customer",$session);
				if($this->session->userdata("cart")){

				}else{
					$this->session->set_userdata("cart",array());
				}

				$resultset["status"] = true;
				if(isset($post["url"]) && $post["url"]){
					$resultset["url"] = $post["url"];
				}
				$this->notification->addSuccess("Welcome, you have successfully completed the registration.");
			}else{
				$resultset["status"] = false;
				$resultset["message"] = "Something went wrong. Please try again.";
			}
		}else{
			$resultset["status"] = false;
			$resultset["message"] = "No data found.";
		}

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}
}