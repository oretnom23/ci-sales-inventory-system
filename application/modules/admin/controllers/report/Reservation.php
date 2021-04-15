<?php

class Reservation extends AdminController{
	public function __construct(){
		parent::__construct();
		$this->load->model("reservation_model","reserve");
	}

	public function index(){
		$this->title = "Reservation Report";
		$this->script = "admin/report/reservation/script";
		$this->render("admin/report/sales");
	}

	public function generate($print = false){
		$post = array();

		if($this->input->method() == "post"){
			$post = $this->input->post();
		}else{
			$post = $this->input->get();
		}

		$resultset = array();
		$where = array();
		$group = array();
		$data = array();
		$data["collection"] = array();

		if(isset($post["date"])){
			if(isset($post["date"]["from"]) && $post["date"]["from"]){
				$where["reserve.created_at >="] = $post["date"]["from"];
			}
			if(isset($post["date"]["to"]) && $post["date"]["to"]){
				$where["reserve.created_at <="] = $post["date"]["to"]; 
			}
		}

		if(isset($post["display"]) && $post["display"]){
			$data["display"] = true;

			switch($post["display"]){
				case "days" : $group[] = "reserve.created_at";break;
				case "months" : $group[] = "MONTH(reserve.created_at)";break;
				case "years" : $group[] = "YEAR(reserve.created_at)";break;
				default:$group[] = "reserve.created_at";break;
			}
		}else{
			$data["display"] = false;
		}

		if($print){
			$data["print"] = true;
		}

		$collection = $this->reserve->collection($where,$group);
		if(count($collection)){
			if($data["display"]){
				$data["display_by"] = $post["display"];
				$date = $where;
				foreach($collection as $_collection){
					$where = $date;

					switch($post["display"]){
						case "days" : $where["reserve.created_at"] = $_collection["date"];break;
						case "months" : 
							$where["MONTH(reserve.created_at)"] = date_format(date_create($_collection["date"]),"m");
							$where["YEAR(reserve.created_at)"] = date_format(date_create($_collection["date"]),"Y");
						break;
						case "years" : 
							$where["YEAR(reserve.created_at)"] = date_format(date_create($_collection["date"]),"Y");
						break;
						default:$where["reserve.created_at"] = $_collection["date"];break;
					}

					$subCollection = $this->reserve->collection($where,array());
					$data["collection"][$subCollection[0]["date"]] = $subCollection;
				}
			}else{
				$data["collection"] = $collection;
			}

			if($print){
				$this->load->view("admin/report/reservation/generate",$data);
				return;
			}else{
				$resultset["status"] = true;
				$resultset["data"] = $this->load->view("admin/report/reservation/generate",$data,true);
			}
		}else{
			$resultset["status"] = false;
			$resultset["message"] = "No sales report generated.";
		}

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}
}