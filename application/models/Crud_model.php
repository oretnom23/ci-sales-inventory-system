<?php 

class Crud_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function collection($table,$where = array(),$group = array()){
		if(count($where)){
			foreach($where as $field => $value){
				if($field == "LIKE"){
					foreach($value as $like){
						$this->db->like($like["field"],$like["value"]);
					}
				}else{
					if(is_array($value)){
					$this->db->where_in($field,$value);
					}else{
						$this->db->where($field,$value);
					}
				}
				
			}
		}

		if(count($group)){
			foreach($group as $field => $value){
				$this->db->group_by($value);
			}
		}

		return $this->db->get($table);
	}

	function load($table,$where){
		$data = $this->collection($table,$where);

		if($data->num_rows()){
			return $data->row_array();
		}else{
			return false;
		}
	}

	function insert($table,$data){
		try{
			$this->db->insert($table,$data);

			return $this->db->insert_id();
		}catch(Exception $error){
			var_dump($error);exit;
			return false;
		}
	}

	function update($table,$data,$where = array()){
		try{
			if(count($where)){
				foreach($where as $field=>$value){
					if(is_array($value)){
						$this->db->where_in($field,$value);
					}else{
						$this->db->where($field,$value);
					}
					
				}
			}

			foreach($data as $field=>$value){
				$this->db->set($field,$value);
			}

			$this->db->update($table);

			return true;
		}catch(Exception $error){
			return false;
		}
	}

	function join($table,$select = "*",$join,$where = array(),$group = array()){
		$this->db->select($select);
		$this->db->from($table);

		foreach($join as $field=>$value){
			$this->db->join($field,$value);
		}

		if(count($where)){
			foreach($where as $field=>$value){
				$this->db->where($field,$value);
			}
		}

		if(count($group)){
			foreach($group as $field => $value){
				$this->db->group_by($value);
			}
		}
		
		return $this->db->get();
	}
}