<?php 

class Dashboard extends AdminController{
	public function __construct(){
		parent::__construct();
		$this->load->model("sales_model","sales");
	}

	public function index(){
		$data = array();
		$data["lifetime"] = 0;
		$data["total"] = 0;
		$sales = 0;
		
		$sales = $this->sales->collection(array("status"=>1));
		if(count($sales)){
			foreach($sales as $_sale){
				$data["lifetime"] = $data["lifetime"] + $this->sales->get_total($_sale["id"]);
			}
		}

		$data["total"] = count($sales);
		$data["average"] = $data["lifetime"] > 0 ? $data["lifetime"] / $data["total"] : 0;


		$this->title = "Dashboard";
		$this->render("admin/dashboard",$data);
	}
}