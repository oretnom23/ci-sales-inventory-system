<?php 

class Sales extends AdminController{
	public $url = "admin/inventory/sales";
	public function __construct(){
		parent::__construct();

		$this->load->model("crud_model","crud");
		$this->load->model("sales_model","sales");
	}

	public function index(){
		$data = array();
		$collection = $this->sales->collection(array("status"=>1));

		$data["collection"] = $collection;

		$this->title = "Manage Sales Order";
		$this->script = "admin/inventory/sales/script";
		$this->render("admin/inventory/sales",$data);
	}

	public function view($id){
		$data = array();
		$where = array();
		$where["id"] = $id;

		$order = $this->crud->load("sales_order",$where);
		if($order){
			$data["order"] = $order;
			$data["order"]["total"] = $this->sales->get_total($order["id"]);
			$data["item"] = $this->sales->order_item($order["id"]);

			$this->title = "View Order #".str_pad($order["id"],7, "0", STR_PAD_LEFT);
			$this->render("admin/inventory/sales/view",$data);
		}else{
			$this->notification->addError("Order not found.");
			redirect($this->url,"refresh");
		}
	}

	public function delete($id){
		$data = array();
		$where = array();

		$data["status"] = 0;
		$where["id"] = $id;

		$query = $this->crud->update("sales_order",$data,$where);
		if($query){
			$this->notification->addSuccess("Order successfully deleted.");
		}else{
			$this->notification->addError("Something went wrong please try again.");
		}
		
		redirect($this->url,"refresh");
	}
}