<?php

class Inventory extends AdminController{
	public function __construct(){
		parent::__construct();

		$this->load->model("reservation_model","reserve");
		$this->load->model("supplier_model","supplier");
		$this->load->model("product_model","product");
		$this->load->model("crud_model","crud");
	}

	public function index(){
		$this->title = "Inventory Report";
		$this->script = "admin/report/inventory/script";
		$this->render("admin/report/inventory");
	}

	private function get_stocks(){
		$where = array();
		$where["status"] = 1;
		$where["qty > "] = 0;

		$collection = $this->product->collection($where);

		return $collection;
	}

	private function get_sold($filter = array()){
		$join = array();
		$where = array();
		$resultset = array();
		$where["sales.status"] = 1;

		if(isset($filter["date"])){
			if(isset($filter["date"]["from"]) && $filter["date"]["from"]){
				$where["sales.created_at >="] = $filter["date"]["from"];
			}
			if(isset($filter["date"]["to"]) && $filter["date"]["to"]){
				$where["sales.created_at <="] = $filter["date"]["to"]; 
			}
		}

		$select = "item.*,item.product_name as name";
		$join["sales_order_item as item"] = "item.order_id = sales.id";

		$collection = $this->crud->join("sales_order as sales",$select,$join,$where);
		if($collection->num_rows()){
			foreach($collection->result_array() as $_collection){
				$_collection["supplier"] = $this->supplier->get_product_supplier($_collection["product_id"]);

				$resultset[] = $_collection;
			}
		}

		return $resultset;
	}

	public function generate(){
		$post = $this->input->post();

		$data = array();
		$resultset = array();
		$data["collection"] = array();
		$display = $post["display"] ? $post["display"] : "all";

		if($display == "all"){
			$data["collection"]["products_on_hand"] = $this->get_stocks();
			$data["collection"]["products_sold"] = $this->get_sold($post);
		}else if($display == "stock"){
			$data["collection"]["products_on_hand"] = $this->get_stocks();
		}else if($display == "sold"){
			$data["collection"]["products_sold"] = $this->get_sold($post);
		}else{

		}

		$resultset["status"] = true;
		$resultset["data"] = $this->load->view("admin/report/inventory/generate",$data,true);

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}

	public function generate_print(){
		$post = $this->input->get();

		$data = array();
		$data["print"] = true;
		$data["collection"] = array();
		$display = $post["display"] ? $post["display"] : "all";

		if($display == "all"){
			$data["collection"]["products_on_hand"] = $this->get_stocks();
			$data["collection"]["products_sold"] = $this->get_sold($post);
		}else if($display == "stock"){
			$data["collection"]["products_on_hand"] = $this->get_stocks();
		}else if($display == "sold"){
			$data["collection"]["products_sold"] = $this->get_sold($post);
		}else{

		}


		$this->load->view("admin/report/inventory/generate",$data);
	}
}