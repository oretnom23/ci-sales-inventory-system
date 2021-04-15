<?php 

class Slider_model extends CI_Model{
	public function __construct(){
		parent::__construct();

		$this->load->model("crud_model","crud");
	}

	public function collection($where = array()){
		$resultset = array();
		
		$collection = $this->crud->collection("slider",$where);
		if($collection->num_rows()){
			$resultset = $collection->result_array();
		}

		return $resultset;
	}
}