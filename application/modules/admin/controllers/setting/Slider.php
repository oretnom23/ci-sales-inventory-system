<?php 

class Slider extends AdminController{
	public $url = "admin/setting/slider";

	public function __construct(){
		parent::__construct();

		$this->load->model("slider_model","slider");
		$this->load->model("crud_model","crud");
	}

	public function index(){
		$data = array();
		$data["collection"] = $this->slider->collection(array("status"=>1));

		$this->title = "Home Slider";
		$this->script = "admin/setting/slider/script";
		$this->render("admin/setting/slider",$data);
	}

	public function upload_image(){
		$config = array();
		$resultset = array();

		$config["upload_path"] = "./assets/images/slider/";
        $config["allowed_types"] = "gif|jpg|png";
        $config["encrypt_name"] = true;

        $this->load->library("upload",$config);

        if($this->upload->do_upload("file")){
        	$config = array();
        	$data = $this->upload->data();

        	$config["image_library"] = "gd2";
        	$config["source_image"] = $data["full_path"];
        	$config["maintain_ratio"] = true;
        	$config["width"] = 900;

        	$this->load->library("image_lib",$config);

        	if($this->image_lib->resize()){
        		$insert = array();
        		$insert["file"] = $data["file_name"];
        		$insert["created_at"] = Date("Y-m-d");
        		$insert["status"] = 1;

        		$query = $this->crud->insert("slider",$insert);
        		if($query){
        			$data["id"] = $query;
        			
        			$resultset["status"] = true;
        			$resultset["data"] = $data;
        		}else{
        			$resultset["status"] = false;
        			$resultset["message"] = "Something went wrong. Please try again later.";
        		}
        	}else{
        		$resultset["status"] = false;
        		$resultset["message"] =  $this->image_lib->display_errors();
        	}
        }else{
        	$resultset["status"] = false;
        	$resultset["message"] = $this->upload->display_errors();
        }

        $this->output->set_content_type("json")->set_output(json_encode($resultset));
	}

	public function delete($id){
		$where = array();
		$data = array();

		$data["status"] = 0;
		$where["id"] = $id;

		$delete = $this->crud->update("slider",$data,$where);
		if($delete){
			$this->notification->addSuccess("Slider successfully deleted.");
		}else{
			$this->notification->addError("Something went wrong. Please try again later.");
		}

		redirect($this->url,"refresh");
	}
}