<?php 

class Manage extends AdminController{
	public $url = "admin/user/manage";

	public function __construct(){
		parent::__construct();

		$this->load->model("crud_model","crud");
		$this->load->model("user_model","user");
		$this->load->model("user_role_model","role");
	}

	public function index(){
		$data = array();
		$where = array();
		$user = $this->session->userdata("user");

		$where["user.id !="] = $user["id"];
		$where["user.status"] = 1;
		$data["collection"] = $this->user->collection($where);

		$this->title = "Manager User";
		$this->script = "admin/user/manage/script";
		$this->render("admin/user/manage",$data);
	}

	public function add(){
		$data = array();
		$data["role"] = $this->role->collection(array("status"=>1));

		$this->title = "New User";
		$this->script = "admin/user/manage/new/script";
		$this->render("admin/user/manage/new",$data);
	}

	public function insert(){
		$post = $this->input->post();
		$resultset = array();

		if(count($post)){
			$where = array();
			$where["username"] = $post["username"];

			$exist = $this->crud->load("user",$where);
			if($exist){
				$resultset["status"] = false;
				$resultset["message"] = "Username already exist.";
			}else{
				$data = $post;
				$data["status"] = 1;
				$data["password"] = md5($post["password"]);
				$data["created_at"] = Date("Y-m-d");
				unset($data["confirm"]);

				$user = $this->crud->insert("user",$data);
				if($user){
					$resultset["status"] = true;

					$this->notification->addSuccess("User successfully created.");
				}else{
					$resultset["status"] = false;
					$resultset["message"] = "Cannot save. Try again later.";
				}
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

		$user = $this->crud->load("user",$where);
		if($user){
			$data = array();
			$data["user"] = $user;
			$data["role"] = $this->role->collection(array("status"=>1));

			$this->title = "Edit User - ".$user["username"];
			$this->script = "admin/user/manage/edit/script";
			$this->render("admin/user/manage/edit",$data);
		}else{
			$this->notification->addError("User not found.");
			redirect($this->url,"refresh");
		}
	}

	public function update(){
		$resultset = array();
		$post = $this->input->post();

		if(count($post)){
			$where = array();
			$data = array();

			$where["id"] = $post["id"];
			$data["fullname"] = $post["fullname"];
			$data["email"] = $post["email"];
			$data["role_id"] = $post["role_id"];

			$update = $this->crud->update("user",$data,$where);
			if($update){
				$resultset["status"] = true;

				$this->notification->addSuccess("User successfully updated");
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
		$where = array();
		$data = array();

		$data["status"] = 0;
		$where["id"] = $id;

		$update = $this->crud->update("user",$data,$where);
		if($update){
			$this->notification->addSuccess("User successfully deleted.");
		}else{
			$this->notification->addError("Something went wrong. Please try again later.");
		}

		redirect($this->url,"refresh");
	}
}