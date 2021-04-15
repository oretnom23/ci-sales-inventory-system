<?php 

class Home extends FrontendController{
	public function __construct(){
		parent::__construct();

		$this->load->model("slider_model","slider");
	}

	public function index(){
		$data = array();
		$data["slider"] = $this->slider->collection(array("status"=>1));

		$this->title = "Home";
		$this->render("frontend/home",$data);
	}
}