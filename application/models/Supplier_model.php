<?php 

class Supplier_model extends CI_Model{
	function __construct(){
		parent::__construct();

		$this->load->model("crud_model","crud");
	}

	function collection($where = array()){
		$resultset = array();

		$collection = $this->crud->collection("supplier",$where);
		if($collection->num_rows()){
			$resultset = $collection->result_array();
		}

		return $resultset;
	}

	function get_product_supplier($id){
		$resultset = "";
		$where = array();
		$where["id"] = $id;

		$product = $this->crud->load("product",$where);
		if($product){
			if($product["supplier_id"]){
				$where = array();
				$where["id"] = $product["supplier_id"];
				$supplier = $this->crud->load("supplier",$where);
				if($supplier){
					$resultset = $supplier["name"];
				}
			}
		}

		return $resultset;
	}
}