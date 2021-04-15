<?php

class Login extends MX_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model("crud_model","crud");
	}

	public function _remap($method){
		$session = $this->session->userdata();
		if(isset($session["user"]) && count($session["user"])){
			redirect("admin/dashboard","refresh");
		}else{
			$this->$method();
		}
	}

	public function index(){
		$this->load->view("admin/login");
	}

	public function authenticate(){
		$post = $this->input->post();
		$resultset = array();

		if(count($post)){
			$where = array();
			$where["username"] = $post["username"];
			$where["password"] = md5($post["password"]);

			$user = $this->crud->load("user",$where);
			if($user){
				$resultset["status"] = true;

				$data = array();
				$data["id"] = $user["id"];
				$data["username"] = $user["username"];
				$data["fullname"] = $user["fullname"];
				$data["role"] = $user["role_id"];

				$this->session->set_userdata("user",$data);
				$this->session->set_userdata("pos",array());
			}else{
				$resultset["status"] = false;
				$resultset["message"] = "Invalid Login Credentials.";
			}
		}else{
			$resultset["status"] = false;
			$resultset["message"] = "No data found.";
		}

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}
}