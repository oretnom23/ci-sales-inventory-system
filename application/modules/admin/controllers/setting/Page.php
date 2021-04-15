<?php 

class Page extends AdminController{
	public $url = "admin/setting/page";

	public function __construct(){
		parent::__construct();

		$this->load->model("crud_model","crud");
		$this->load->model("page_model","page");
	}

	public function index(){
		$data = array();
		$where = array();

		$where["status"] = 1;
		$data["collection"] = $this->page->collection($where);
		$this->title = "CMS Page";
		$this->script = "admin/setting/page/script";
		$this->render("admin/setting/page",$data);
	}

	public function add(){
		$this->title = "New CMS Page";
		$this->script = "admin/setting/page/new/script";
		$this->render("admin/setting/page/new");
	}

	public function insert(){
		$post = $this->input->post();
		$resultset = array();
		$data = array();

		if(count($post)){
			$data = $post;
			$data["slug"] = str_replace(" ","_",strtolower($data["name"]));
			$data["status"] = 1;
			$data["created_at"] = Date("Y-m-d");

			$page = $this->crud->insert("cms_page",$data);
			if($page){
				$resultset["status"] = true;

				$this->notification->addSuccess("Page successfully added.");
			}else{
				$resultset["status"] = false;
				$resultset["message"] = "Something went wrong. Please try again later.";
			}
		}else{
			$resultset["status"] = false;
			$resultset["message"] = "No data to process.";
		}

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}

	public function edit($id){
		$data = array();
		$where = array();

		$where["id"] = $id;
		$page = $this->crud->load("cms_page",$where);
		if($page){
			$data["data"] = $page;

			$this->title = "Edit CMS Page - ". $page["name"];
			$this->script = "admin/setting/page/edit/script";
			$this->render("admin/setting/page/edit",$data);
		}else{
			$this->notification->addError("Page does not exist.");

			redirect($this->url,"refresh");
		}
	}

	public function update(){
		$post = $this->input->post();
		$resultset = array();
		$where = array();
		$data = array();

		if(count($post)){
			$data["name"] = $post["name"];
			$data["content"] = $post["content"];
			$where["id"] = $post["id"];

			$page = $this->crud->update("cms_page",$data,$where);
			if($page){
				$resultset["status"] = true;

				$this->notification->addSuccess("Page successfully updated.");
			}else{
				$resultset["status"] = false;
				$resultset["message"] = "Something went wrong. Please try again later.";
			}
		}
		else{
			$resultset["status"] = false;
			$resultset["message"] = "No data to process.";
		}

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}

	public function delete($id){
		$where = array();
		$data = array();

		$where["id"] = $id;
		$data["status"] = 0;

		$update = $this->crud->update("cms_page",$data,$where);
		if($update){
			$this->notification->addSuccess("Page successfully deleted.");
		}else{
			$this->notification->addError("Something went wrong. Please try again later.");
		}

		redirect($this->url,"refresh");
	}
}