<?php 

class Supplier extends AdminController{
	public $url = "admin/inventory/supplier";
	public function __construct(){
		parent::__construct();

		$this->load->model("crud_model","crud");
		$this->load->model("supplier_model","supplier");
	}

	public function index(){
		$data = array();
		$where = array();

		$where["status"] = 1;
		$data["collection"] = $this->supplier->collection($where);

		$this->title = "Supplier";
		$this->script = "admin/inventory/supplier/script";
		$this->render("admin/inventory/supplier",$data); 
	}

	public function add(){
		$this->title = "New Supplier";
		$this->script = "admin/inventory/supplier/new/script";
		$this->render("admin/inventory/supplier/new");
	}

	public function insert(){
		$post = $this->input->post();
		$resultset = array();
		$data = array();

		$data = $post;
		$data["status"] = 1;

		$insert = $this->crud->insert("supplier",$data);
		if($insert){
			$resultset["status"] = true;
		}else{
			$resultset["status"] = false;
			$resultset["message"] = "Something went wrong. Please try again later.";
		}

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}

	public function edit($id){
		$data = array();
		$where = array();

		$where["id"] = $id;
		$supplier = $this->crud->load("supplier",$where);
		if($supplier){
			$data["supplier"] = $supplier;

			$this->title = "Edit Supplier - " . $supplier["name"];
			$this->script = "admin/inventory/supplier/edit/script";
			$this->render("admin/inventory/supplier/edit",$data);
		}else{
			$this->notification->addError("Supplier not found.");
			redirect($this->url,"refresh");
		}
	}

	public function update(){
		$post = $this->input->post();
		$resultset = array();
		$where = array();
		$data = array();
		
		$where["id"] = $post["id"];
		$data["name"] = $post["name"];
		$data["email"] = $post["email"];
		$data["phone"] = $post["phone"];
		
		$update = $this->crud->update("supplier",$data,$where);
		if($update){
			$resultset["status"] = true;
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
		$update = $this->crud->update("supplier",$data,$where);
		if($update){
			$this->notification->addSuccess("Supplier successfully deleted.");
		}else{
			$this->notification->addError("Something went wrong. Please try again later.");
		}

		redirect($this->url,"refresh");
	}
}