<?php 

class Category extends AdminController{
	public $url = "admin/inventory/category";

	public function __construct(){
		parent::__construct();

		$this->load->model("category_model","category");
		$this->load->model("crud_model","crud");
	}

	public function index(){
		$data = array();
		$where = array();

		$where["status"] = 1;
		$data["collection"] = $this->category->collection($where);

		$this->title = "Manage Category";
		$this->script = "admin/inventory/category/script";
		$this->render("admin/inventory/category",$data);
	}

	public function add(){
		$this->title = "Add Category";
		$this->script = "admin/inventory/category/new/script";
		$this->render("admin/inventory/category/new");
	}

	public function edit($id){
		$where = array();
		$data = array();
		$where["id"] = $id;

		$category = $this->crud->load("category",$where);
		if($category){
			$data["category"] = $category;

			$this->title = $category["name"];
			$this->script = "admin/inventory/category/edit/script";
			$this->render("admin/inventory/category/edit",$data);
		}else{
			$this->notification->addError("Category does not exist.");
			redirect($this->url,"refresh");
		}
	}

	public function insert(){
		$post = $this->input->post();
		$resultset = array();
		$data = array();

		$data = $post;
		$data["status"] = 1;
		$data["created_at"] = Date("Y-m-d");

		$insert = $this->crud->insert("category",$data);
		if($insert){
			$resultset["status"] = true;

			$this->notification->addSuccess("Category successfully added.");
		}else{
			$resultset["status"] = false;
			$resultset["message"] = "Something went wrong. Please try again later.";
		}

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}

	public function update(){
		$post = $this->input->post();
		$resultset = array();
		$where = array();
		$data = array();

		$where["id"] = $post["id"];
		$data["name"] = $post["name"];
		$data["description"] = $post["description"];

		$update = $this->crud->update("category",$data,$where);
		if($update){
			$resultset["status"] = true;

			$this->notification->addSuccess("Category successfully updated.");
		}else{
			$resultset["status"] = false;
			$resultset["message"] = "Something went wrong. Please try again later.";
		}

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}

	public function delete($id){
		$where = array();
		$data = array();

		$where["id"] = $id;
		$data["status"] = 0;

		$delete = $this->crud->update("category",$data,$where);
		if($delete){
			$this->notification->addSuccess("Category successfully deleted.");
		}else{
			$this->notification->addError("Something went wrong. Please try again later.");
		}

		redirect($this->url,"refresh");
	}

	public function product(){
		$post = $this->input->post();

		$data = array();
		$resultset = array();

		$data["product"] = $this->category->get_product($post["id"]);
		$resultset["status"] = true;
		$resultset["data"] = $this->load->view("admin/inventory/category/product",$data,true);

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}
}