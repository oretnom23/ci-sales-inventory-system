<?php 

class Product extends FrontendController{
	public $url = "product";
	public function __construct(){
		parent::__construct();

		$this->load->model("crud_model","crud");
		$this->load->model("product_model","product");
		$this->load->model("category_model","category");
	}

	public function index($id = false){
		if($id){
			$this->view($id);
		}else{
			$data = array();
			$where = array();
			$filter = array();
			$get = $this->input->get();
			$price = isset($get["filter"]["price"]) && $get["filter"]["price"] ? explode(",",$get["filter"]["price"]) : array(10,1000);
			$category = isset($get["filter"]["category"]) && count($get["filter"]["category"]) ? $get["filter"]["category"] : array();
			$search = isset($get["filter"]["search"]) && $get["filter"]["search"] ? $get["filter"]["search"] : "";

			$where["status"] = 1;
			$where["online"] = 1;
			$where["price >= "] = $price[0];
			$where["price <= "] = $price[1];

			if(count($category)){
				$where["category_id"] = $category;
			}
			if($search){
				$like = array();
				$like["field"] = "name";
				$like["value"] = $search;

				$where["LIKE"][] = $like;
			}

			$filter["price"] = implode(",",$price);
			$filter["category"] = $category;
			$filter["search"] = $search;

			$data["product"] = $this->product->collection($where);
			$data["category"] = $this->category->collection(array("status"=>1));

			$data["filter"] = $filter;

			$this->title = "Product";
			$this->script = "frontend/product/script";
			$this->render("frontend/product",$data);
		}
	}

	public function view($id){
		$where = array();
		$resultset = array();
		$where["id"] = $id;

		$product = $this->crud->load("product",$where);
		if($product){
			$data = array();
			$data["product"] = $product;

			$this->title = $product["name"];
			$this->script = "frontend/product/view/script";
			$this->render("frontend/product/view",$data);
		}else{
			redirect($this->url,"refresh");
			$this->notification->addError("Product does not exist.");
		}
	}

	public function add_to_cart(){
		$session = $this->session->userdata();
		$post = $this->input->post();
		$resultset = array();
		if(count($post)){
			if(!isset($session["cart"])){$session["cart"] = array();}
			if(isset($session["cart"][$post["product_id"]])){
				$session["cart"][$post["product_id"]]["qty"] = $session["cart"][$post["product_id"]]["qty"] + $post["qty"];
			}else{
				$session["cart"][$post["product_id"]] = $post;
			}

			$available = $this->product->availability($post["product_id"],$session["cart"][$post["product_id"]]["qty"]);
			if($available){
				$resultset["status"] = true;
				$resultset["message"] = "Product successfully added";

				$this->session->set_userdata("cart",$session["cart"]);
			}else{
				$resultset["status"] = false;
				$resultset["message"] = "Requested product quantity exceeds the available stocks";
			}
			
			/*$this->session->set_userdata("cart",array());*/
		}else{
			$resultset["status"] = false;
			$resultset["message"] = "No data found";
		}
		
		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}

	public function update_cart(){
		$session = $this->session->userdata();
		$post = $this->input->post();
		$resultset = array();
		$url = site_url("customer/checkout");

		if(count($post)){
			$available = false;

			foreach($post["cart"] as $field=>$value){
				if(isset($session["cart"][$field])){
					$available = $available + $this->product->availability($field,$value["qty"]);
					$session["cart"][$field]["qty"] = $value["qty"];
				}
			}

			if($available){
				$this->session->set_userdata("cart",$session["cart"]);
			}
			

			if(isset($session["customer"]) && count($session["customer"])){
				$url = site_url("customer/checkout");
			}else{
				$url = site_url("customer/login") . "?url=" . urlencode(site_url("customer/checkout"));
			}

			if($available){
				$resultset["status"] = true;
				$resultset["message"] = "Product successfully updated.";
				$resultset["data"] = $this->load->view("customer/cart/view",array("product"=>$session["cart"],"url"=>$url),true);
			}else{
				$resultset["status"] = false;
				$resultset["message"] = "Requested product quantity exceeds the available stocks";
			}
			
		}else{
			$resultset["status"] = false;
			$resultset["message"] = "No data found.";
		}

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}

	public function delete_from_cart(){
		$session = $this->session->userdata();
		$post = $this->input->post();
		$resultset = array();
		$url = site_url("customer/checkout");

		if(count($post)){
			unset($session["cart"][$post["id"]]);

			$this->session->set_userdata("cart",$session["cart"]);

			if(isset($session["customer"]) && count($session["customer"])){
				$url = site_url("customer/checkout");
			}else{
				$url = site_url("customer/login") . "?url=" . urlencode(site_url("customer/checkout"));
			}

			$resultset["status"] = true;
			$resultset["message"] = "Product successfully deleted.";
			$resultset["data"] = $this->load->view("customer/cart/view",array("product"=>$session["cart"]),true);
		}else{
			$resultset["status"] = false;
			$resultset["message"] = "No data found.";
		}

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}
}