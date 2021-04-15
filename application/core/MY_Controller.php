<?php (defined("BASEPATH")) OR exit("No direct script access allowed");

class AdminController extends MX_Controller{
	public $title = "POS";
	public $script = false;

	public function __construct(){
		parent::__construct();

		$this->load->library("notification",array("object"=>$this,"access"=>"admin"));
		$this->load->model("user_role_model","role");
		$this->load->model("crud_model","crud");
	}

	public function _remap($method,$param = array()){
		$session = $this->session->userdata();

		if(isset($session["user"]) && count($session["user"])){
			return call_user_func_array(array($this,$method),$param);
		}else{
			if($this->input->method() == "post"){
				$resultset = array();
				$resultset["status"] = false;
				$resultset["message"] = "Please login to continue.";

				$this->output->set_content_type("json")->set_output(json_encode($resultset));
			}else{
				$this->notification->addError("Please login to continue.");
				redirect("admin/login","refresh");
			}
		}
	}

	protected function _current_user(){
		$user = $this->session->userdata("user");
		$where = array();
		$where["id"] = $user["id"];
		return $this->crud->load("user",$where);
	}

	protected function _current_user_uac(){
		$user = $this->session->userdata("user");
		$where = array();
		$where["id"] = $user["role"];
		return $this->crud->load("user_role",$where);
	}

	protected function render($template,$data = array()){
		$page = array();
		$menu = array();
		$header = array();

		$menu["menu"] = $this->role->user_access_control();
		$menu["access"] = $this->_current_user_uac();
		$header["user"] = $this->_current_user();

		$page["title"] = $this->title;
		$page["head"] = $this->load->view("admin/page/head",array("title"=>$this->title),true);
		$page["header"] = $this->load->view("admin/page/header",$header,true);
		$page["menu"] = $this->load->view("admin/page/menu",$menu,true);
		$page["notification"] = $this->load->view("admin/page/notification",$this->notification->getData(),true);
		$page["content"] = $this->load->view($template,$data,true);
		$page["footer"] = $this->load->view("admin/page/footer",null,true);

		if($this->script){
			$page["script"] = $this->load->view($this->script,null,true);
		}


		$this->load->view("admin/page",$page);
	}
}

class FrontendController extends MX_Controller{
	public $title = "CHMSC Boutique";
	public $script = false;
	public $sidebar = false;

	public function __construct(){
		parent::__construct();

		$this->load->library("notification",array("object"=>$this,"access"=>"frontend"));
		$this->load->model("page_model","page");
	}

	protected function get_cms_pages(){
		$where = array();
		$where["status"] = 1;

		return $this->page->collection($where);
	}

	protected function render($template,$data = array()){
		$session = $this->session->userdata();
		$page = array();
		$header = array();

		$header["pages"] = $this->get_cms_pages();
		if(isset($session["customer"]) && count($session["customer"])){
			$header["login"] = true;
		}

		$page["title"] = $this->title;
		$page["header"] = $this->load->view("frontend/page/header",$header,true);
		$page["notification"] = $this->load->view("frontend/page/notification",$this->notification->getData(),true);
		$page["footer"] = $this->load->view("frontend/page/footer",null,true);
		$page["content"] = $this->load->view($template,$data,true);

		if($this->script){
			$page["script"] = $this->load->view($this->script,null,true);
		}

		if($this->sidebar){
			$page["sidebar"] = $this->load->view($this->sidebar,null,true);
		}

		$this->load->view("frontend/page",$page);
	}
}

class CustomerController extends FrontendController{
	public function __construct(){
		parent::__construct();
	}

	public function _remap($method,$param = array()){
		$session = $this->session->userdata();

		if(isset($session["customer"]) && count($session["customer"])){
			return call_user_func_array(array($this,$method),$param);
		}else{
			if($this->input->method() == "post"){
				$resultset = array();
				$resultset["login"] = true;
				$resultset["status"] = false;
				$resultset["message"] = "Please login to continue.";

				$this->output->set_content_type("json")->set_output(json_encode($resultset));
			}else{
				$this->notification->addError("Please login to continue.");
				redirect("customer/login","refresh");
			}
		}
	}
} 