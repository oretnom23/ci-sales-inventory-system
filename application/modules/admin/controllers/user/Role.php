<?php 

class Role extends AdminController{
	public $url = "admin/user/role";

	public function __construct(){
		parent::__construct();

		$this->load->model("crud_model","crud");
		$this->load->model("user_role_model","role");
	}

	public function index(){
		$data = array();

		$data["roles"] = $this->role->collection(array("status"=>1));

		$this->title = "Manage User Roles";
		$this->script = "admin/user/role/script";
		$this->render("admin/user/role",$data);
	}

	public function add(){
		$data = array();
		$data["uac"] = $this->role->user_access_control();
		$this->title = "New User Role";
		$this->script = "admin/user/role/new/script";
		$this->render("admin/user/role/new",$data);
	}

	public function insert(){
		$post = $this->input->post();
		$resultset = array();

		if(count($post)){
			$data = array();
			$data["name"] = $post["name"];
			$data["status"] = 1;
			$data["created_at"] = Date("Y-m-d");

			if($post["access"] == "all"){
				$data["access"] = $post["access"];
			}else{
				$data["access"] = serialize($post["uac"]);
			}

			$insert = $this->crud->insert("user_role",$data);
			if($insert){
				$resultset["status"] = true;

				$this->notification->addSuccess("User role successfully created.");
			}else{
				$resultset["status"] = false;
				$resultset["message"] = "Something went wrong. Please try again later.";
			}
		}else{
			$resultset["status"] = false;
			$resultset["message"] = "No data found.";
		}

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}

	public function edit($id){
		$where = array();
		$where["id"] = $id;

		$role = $this->crud->load("user_role",$where);
		if($role){
			$data = array();
			$data["role"] = $role;
			$data["uac"] = $this->role->user_access_control();

			$this->title = "Edit User Role - ".$role["name"];
			$this->script = "admin/user/role/edit/script";
			$this->render("admin/user/role/edit",$data);
		}else{
			$this->notification->addError("User role not found.");

			redirect($this->url,"refresh");
		}
	}

	public function update(){
		$post = $this->input->post();
		$resultset = array();
		$where = array();
		$data = array();

		if(count($post)){
			$where["id"] = $post["id"];
			$data["name"] = $post["name"];

			if($post["access"] == "all"){
				$data["access"] = $post["access"];
			}else{
				$data["access"] = serialize($post["uac"]);
			}

			$update = $this->crud->update("user_role",$data,$where);
			if($update){
				$resultset["status"] = true;

				$this->notification->addSuccess("User role successfully updated.");
			}else{
				$resultset["status"] = false;
				$resultset["message"] = "Something went wrong. Please try again later.";
			}

		}else{
			$resultset["status"] = false;
			$resultset["message"] = "No data found.";
		}

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}

	public function delete($id){
		$resultset = array();
		$where = array();
		$data = array();

		$where["id"] = $id;
		$data["status"] = 0;

		$update = $this->crud->update("user_role",$data,$where);
		if($update){
			$this->notification->addSuccess("User role successfully deleted.");
		}else{
			$this->notification->addError("Something went wrong. Please try again later.");
		}

		redirect($this->url,"refresh");
	}
}