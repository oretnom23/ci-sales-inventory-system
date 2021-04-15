<?php 

class Page extends FrontendController{
	public $url = "page";
	public function __construct(){
		parent::__construct();

		$this->load->model("crud_model","crud");
	}

	public function index($id = false){
		
	}

	public function view($id){
		$where = array();

		$where["slug"] = $id;
		$where["status"] = 1;
		$page = $this->crud->load("cms_page",$where);
		if($page){
			$this->title = $page["name"];
			$this->render("frontend/cms",$page);
		}else{
			show_404("page");
		}
	}
}