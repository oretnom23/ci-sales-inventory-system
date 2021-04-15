<?php 

class Sales_model extends CI_Model{
	function __construct(){
		parent::__construct();

		$this->load->model("crud_model","crud");
	}

	function collection($where = array(),$group = array()){
		$resultset = array();
		/*$join = array();
		$where = array();
		$select = "sales.id,sales.order_id,sales.reservation_id,sales.created_at,sales.status,customer.fullname";
		
		$join["customer"] = "customer.id = sales.customer_id";
		$where["sales.status"] = 1;

		return $this->crud->join("sales_order as sales",$select,$join);*/

		$collection = $this->crud->collection("sales_order",$where,$group);
		if($collection->num_rows()){
			foreach($collection->result_array() as $_collection){
				$_collection["date"] = $_collection["created_at"];
				$_collection["total"] = $this->get_total($_collection["id"]);
				$_collection["created_at"] = date_format(date_create($_collection["created_at"]),"F d, Y");

				$resultset[] = $_collection;
			}
		}

		return $resultset;
	}

	function load($where){
		$query = $this->crud->load("reservation",$where);
		if($query){
			$query["created_at"] = date_format(date_create($query["created_at"]),"F d, Y");
			$query["item"] = $this->order_item($query["id"]);

			return $query;
		}else{
			return false;
		}
	}

	function order($data){
		$order = array();
		$order["customer_name"] = $data["customer_name"];
		$order["payment_method"] = $data["payment_method"];
		$order["teller_id"] = $data["teller"];
		$order["created_at"] = Date("Y-m-d");
		$order["status"] = 1;

		if(isset($data["customer_id"])){
			$order["customer_id"] = $data["customer_id"];
		}
		if(isset($data["reservation_id"])){
			$order["reservation_id"] = $data["reservation_id"];
		}
		if(isset($data["amount_paid"])){
			$order["amount_paid"] = $data["amount_paid"];
		}

		$query = $this->crud->insert("sales_order",$order);
		if($query){
			$this->db->trans_start();
				foreach($data["item"] as $_collection){
					$item = array();
					$item["order_id"] = $query;
					$item["product_id"] = $_collection["id"];
					$item["product_name"] = $_collection["name"];
					$item["price"] = $_collection["price"];
					$item["qty"] = $_collection["qty"];
					$item["sku"] = $_collection["sku"];

					$insert = $this->crud->insert("sales_order_item",$item);
					if($insert){
						$this->update_product($item);
					}
				}
				if(isset($data["reservation_id"]) && $data["reservation_id"]){
					$update = array();
					$update["status"] = 3;

					$this->crud->update("reservation",$update,array("id"=>$data["reservation_id"]));
				}
			$this->db->trans_complete();


			if ($this->db->trans_status() === FALSE){
				return false;
			}else{
				return $query;
			}
		}else{
			return false;
		}
	}

	function update_product($data){
		$where = array();
		$update = array();

		$where["id"] = $data["product_id"];
		$product = $this->crud->load("product",$where);
		if($product){
			$update["qty"] = $product["qty"] - $data["qty"];
			$update["qty"] = $update["qty"] < 0 ? 0 : $update["qty"];

			$this->crud->update("product",$update,$where);
		}
	}

	function order_item($id){
		$where = array();
		$resultset = array();
		$where["order_id"] = $id;

		$collection = $this->crud->collection("sales_order_item",$where);
		if($collection->num_rows()){
			$resultset = $collection->result_array();
		}

		return $resultset;
	}

	function get_total($id){
		$total = 0;
		$collection = $this->order_item($id);

		foreach($collection as $_collection){
			$total = $total + ($_collection["qty"] * $_collection["price"]);
		}

		return $total;
	}
}