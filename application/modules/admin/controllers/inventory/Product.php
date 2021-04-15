<?php 

class Product extends AdminController{
	public $url = "admin/inventory/product";
	public function __construct(){
		parent::__construct();

		$this->load->model("crud_model","crud");
		$this->load->model("product_model","product");
		$this->load->model("category_model","category");
		$this->load->model("supplier_model","supplier");
	}

	public function index(){
		$data = array();
		$where = array();

		$where["status"] = 1;
		$data["collection"] = $this->product->collection($where);

		$this->title = "Manage Products";
		$this->script = "admin/inventory/product/script";
		$this->render("admin/inventory/product",$data);
	}

	public function add(){
		$data = array();
		$data["category"] = $this->category->collection(array("status"=>1));
		$data["supplier"] = $this->supplier->collection(array("status"=>1));

		$this->title = "New Product";
		$this->script = "admin/inventory/product/new/script";
		$this->render("admin/inventory/product/new",$data);
	}

	public function save(){
		$post = $this->input->post();
		$resultset = array();

		if(count($post)){
			$post["image"] = isset($post["image"]) && $post["image"] ? implode(",",$post["image"]) : "";
			$post["created_at"] = Date("Y-m-d");
			$post["status"] = 1;

			$where = array();
			$where["sku"] = $post["sku"];

			$check = $this->crud->load("product",$where);
			if($check){
				$resultset["status"] = false;
				$resultset["message"] = "SKU already exist.";
			}else{
				$query = $this->crud->insert("product",$post);
				if($query){
					$this->notification->addSuccess("Product successfully saved.");

					$resultset["id"] = $query;
					$resultset["status"] = true;
					$resultset["url"] = site_url($this->url."/edit/".$query);
				}else{
					$resultset["status"] = false;
					$resultset["message"] = "Cannot saved product for now.";
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

		$product = $this->crud->load("product",$where);

		if($product){
			$data = array();
			$data["product"] = $product;
			$data["category"] = $this->category->collection(array("status"=>1));
			$data["supplier"] = $this->supplier->collection(array("status"=>1));

			$this->title = "Edit Product - ".$product["name"];
			$this->script = "admin/inventory/product/edit/script";
			$this->render("admin/inventory/product/edit",$data);
		}else{
			$this->notification->addError("Product not found.");
			redirect("/".$this->url,"refresh");
		}
		
	}

	public function update(){
		$post = $this->input->post();

		$resultset = array();
		$where = array();
		$data = array();

		if(count($post)){
			$where["id"] = $post["id"];
			$post["image"] = isset($post["image"]) && $post["image"] ? implode(",",$post["image"]) : "";
			$post["online"] = isset($post["online"]) ? 1 : 0;
			unset($post["id"]);

			$data = $post;
			$verify = array();
			$verify["sku"] = $post["sku"];
			$verify["id !="] = $where["id"];
			$check = $this->crud->load("product",$verify);
			if($check){
				$resultset["status"] = false;
				$resultset["message"] = "SKU already exist";
			}else{
				$query = $this->crud->update("product",$data,$where);
				if($query){
					$this->notification->addSuccess("Product successfully updated.");

					$resultset["status"] = true;
				}else{
					$resultset["status"] = false;
					$resultset["message"] = "Cannot update product for now.";
				}
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

		$where["id"] = $id;
		$data["status"] = 0;

		 $query = $this->crud->update("product",$data,$where);
		if($query){
			$this->notification->addSuccess("Product successfully deleted.");
		}else{
			$this->notification->addError("Cannot delete product for now.");
		}

		redirect($this->url,"refresh");
	}

	public function image_upload(){
		$config = array();
		$resultset = array();

		$config["upload_path"] = "./assets/images/product/";
        $config["allowed_types"] = "gif|jpg|png";
        $config["encrypt_name"] = true;

        $this->load->library("upload",$config);

        if($this->upload->do_upload("file")){
        	$config = array();
        	$data = $this->upload->data();

        	$config["image_library"] = "gd2";
        	$config["source_image"] = $data["full_path"];
        	$config["maintain_ratio"] = true;
        	$config["width"] = 640;

        	$this->load->library("image_lib",$config);

        	if($this->image_lib->resize()){
        		$resultset["status"] = true;
        		$resultset["data"] = $data;
        	}else{
        		$resultset["status"] = false;
        		$resultset["message"] =  $this->image_lib->display_errors();
        	}
        }else{
        	$resultset["status"] = false;
        	$resultset["message"] = $this->upload->display_errors();
        }

        $this->output->set_content_type("json")->set_output(json_encode($resultset));
	}
}