<?php

class Reservation_model extends CI_Model{
	function __construct(){
		parent::__construct();

		$this->load->model("crud_model","crud");
	}

	function load($where){
		$resultset = array();

		$query = $this->crud->load("reservation",$where);
		if($query){
			$query["customer"] = "N/A";
			$query["total"] = $this->get_total($query["id"]);
			$query["created_at"] = date_format(date_create($query["created_at"]),"F d, Y");
			$query["pick_up_date"] = date_format(date_create($query["pick_up_date"]),"F d, Y");

			switch($query["status"]){
				case 1 : $query["status_label"] = "Pending"; break;
				case 2 : $query["status_label"] = "Cancel"; break;
				case 3 : $query["status_label"] = "Complete"; break;
				default : $query["status_label"] = "Pending"; break;
			}
			$customer = $this->crud->load("customer",array("id"=>$query["customer_id"]));
			if($customer){
				$query["customer"] = $customer["fullname"];
			}
			return $query;
		}else{
			return false;
		}
	}

	function process($data){
		$query = $this->crud->insert("reservation",$data["reserve"]);

		if($query){
			$this->db->trans_start();
				foreach($data["item"] as $_collection){
					unset($_collection["image"]);
					$item = $_collection;
					$item["reservation_id"] = $query;

					$this->crud->insert("reservation_item",$item);
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

	function collection($where = array(),$group = array()){
		$resultset = array();
		$group = array();
		$join = array();

		$select = "reserve.id,reserve.created_at,reserve.status,customer.fullname,customer.email";
		$join["customer"] = "customer.id = reserve.customer_id";

		$collection = $this->crud->join("reservation as reserve",$select,$join,$where,$group);
		if($collection->num_rows()){
			foreach($collection->result_array() as $_collection){


				$row = array();
				$row["id"] = $_collection["id"];
				$row["customer"] = $_collection["fullname"];
				// $row["phone"] = $_collection["phone"];
				$row["email"] = $_collection["email"];
				$row["total"] = $this->get_total($_collection["id"]);
				$row["date"] = $_collection["created_at"];
				$row["created_at"] = date_format(date_create($_collection["created_at"]),"F d, Y");
				$row["status_id"] = $_collection["status"];

				switch($_collection["status"]){
					case 1 : $row["status"] = "Pending"; break;
					case 2 : $row["status"] = "Cancel"; break;
					case 3 : $row["status"] = "Complete"; break;
					default : $row["status"] = "Pending"; break;
				}

				if(strtolower($row["status"]) == "pending"){
					$today = date_create();
					$date = date_create($_collection["created_at"]);
					date_add($date,date_interval_create_from_date_string("3 days"));
					
					if($today > $date){
						$row["status"] = "Cancelled";
						$row["status_id"] = 4;
					}
				}

				$resultset[] = $row;
			}
		}

		return $resultset;
	}

	function reservation_item($id){
		$where = array();
		$resultset = array();

		$where["reservation_id"] = $id;
		$collection = $this->crud->collection("reservation_item",$where); 
		if($collection->num_rows() > 0){
			foreach($collection->result_array() as $_collection){
				$where = array();
				$where["id"] = $_collection["product_id"];

				$product = $this->crud->load("product",$where);
				$_collection["description"] = $product["description"];
				
				$resultset[] = $_collection;
			}
		}

		return $resultset;
	}

	function get_total($id){
		$total = 0;
		$collection = $this->reservation_item($id);

		foreach($collection as $_collection){
			$total = $total + ($_collection["qty"] * $_collection["price"]);
		}

		return $total;
	}

	function get_product_reservation($id){
		$total = 0;
		$join = array();
		$where = array();

		$select = "reservation_item.qty";
		$join["reservation_item"] = "reservation_item.reservation_id = reserve.id";
		$where["reservation_item.product_id"] = $id;
		$where["reserve.status"] = 1;
		$collection = $this->crud->join("reservation as reserve",$select,$join,$where);;

		if($collection->num_rows()){
			foreach($collection->result_array() as $_collection){
				$total = $total + $_collection["qty"];
			}
		}
		
		return $total;
	}
}