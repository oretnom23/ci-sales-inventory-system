<?php 

class Product_model extends CI_Model{
	function __construct(){
		parent::__construct();

		$this->load->model("crud_model","crud");
		$this->load->model("supplier_model","supplier");
		$this->load->model("reservation_model","reserve");
	}

	function collection($where = array()){
		$resultset = array();

		$collection = $this->crud->collection("product",$where);
		if($collection->num_rows()){
			foreach($collection->result_array() as $_collection){
				$_collection["reserved"] = $this->reserve->get_product_reservation($_collection["id"]);
				$_collection["supplier"] = $this->supplier->get_product_supplier($_collection["id"]);
				$resultset[] = $_collection;
			}
		}

		return $resultset;
	}

	function availability($id,$qty){
		$where = array();
		$where["id"] = $id;
		$resultset = false;

		$product = $this->crud->load("product",$where);
		if($product){
			if($product["qty"] >= $qty){
				$resultset = true;
			}
		}

		return $resultset;
	}
}