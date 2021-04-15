<?php 

class Page_model extends CI_Model{
	function __construct(){
		parent::__construct();

		$this->load->model("crud_model","crud");
	}

	function collection($where = array()){
		$resultset = array();

		$collection = $this->crud->collection("cms_page",$where);
		if($collection->num_rows()){
			foreach($collection->result_array() as $_collection){
				$row = $_collection;
				$row["created_at"] = date_format(date_create($_collection["created_at"]),"F d,Y");

				$resultset[] = $row;
			}
		}

		return $resultset;
	}
}