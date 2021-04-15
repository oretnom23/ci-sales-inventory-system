<?php

class User_model extends CI_Model{
	function __construct(){
		parent::__construct();

		$this->load->model("crud_model","crud");
	}

	function collection($where){
		$join = array();
		$resultset = array();
		$select = "user.id,user.username,user.fullname,role.name as role";

		$join["user_role as role"] = "role.id = user.role_id";

		$collection = $this->crud->join("user",$select,$join,$where);
		if($collection->num_rows()){
			$resultset = $collection->result_array();
		}

		return $resultset;
	}
}