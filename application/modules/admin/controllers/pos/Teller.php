<?php 

class Teller extends AdminController{
	public $url = "admin/pos/teller";
	public function __construct(){
		parent::__construct();

		$this->load->model("crud_model","crud");
		$this->load->model("sales_model","sales");
		$this->load->model("product_model","product");
		$this->load->model("reservation_model","reservation");
	}

	protected function get_current_total($data,$format = true){
		$total = 0;

		foreach($data as $_data){
			$total = $total + ($_data["qty"] * $_data["price"]);
		}

		return $format ? number_format($total,2) : $total;
	}

	public function index($id = false){
		$data = array();
		$payment = array("cash","credit_card");
		$data["payment"] = $payment;

		if($id){
			$where = array();
			$where["id"] = $id;

			$reservation = $this->reservation->load($where);
			if($reservation){
				$reserve = array();
				$reserve["reservation_id"] = $reservation["id"];
				$reserve["customer_id"] = $reservation["customer_id"];
				$reserve["customer"] = $reservation["customer"];
				$reserve["payment_method"] = $reservation["payment_method"];

				$item = array();
				$data["reserve"] = $reserve;
				$collection = $this->reservation->reservation_item($reservation["id"]);
				foreach($collection as $_collection){
					$_collection["id"] = $_collection["product_id"];
					$_collection["name"] = $_collection["product_name"];

					$item[$_collection["product_id"]] = $_collection;
				}

				$this->session->set_userdata("pos",$item);
			}
		}

		$session = $this->session->userdata();
		$data["product"] = $product = $this->product->collection();
		$data["order"] = isset($session["pos"]) ? $session["pos"] : array();
		$data["total"] = $this->get_current_total($data["order"],false);
		$data["teller"] = $id ? false : true;

		$this->title = "POS Teller";
		$this->script = "admin/pos/teller/script";
		$this->render("admin/pos/teller",$data);
	}

	public function add(){
		$session = $this->session->userdata();
		$post = $this->input->post();
		$resultset = array();
		$qty = 0;

		if(!isset($session["pos"])){$session["pos"] = array();}

		if(isset($session["pos"][$post["id"]])){
			$qty = $session["pos"][$post["id"]]["qty"] + $post["qty"];
			$session["pos"][$post["id"]]["qty"] = $session["pos"][$post["id"]]["qty"] + $post["qty"];
		}else{
			$qty = $post["qty"];
			$session["pos"][$post["id"]]["id"] = $post["id"];
			$session["pos"][$post["id"]]["qty"] = $post["qty"];
			$session["pos"][$post["id"]]["sku"] = $post["sku"];
			$session["pos"][$post["id"]]["name"] = $post["name"];
			$session["pos"][$post["id"]]["price"] = $post["price"];
		}
		
		$available = $this->product->availability($post["id"],$qty);
		if($available){
			$this->session->set_userdata("pos",$session["pos"]);
			/*$this->session->set_userdata("pos",array());*/

			$resultset["status"] = true;
			$resultset["data"] = $this->load->view("admin/pos/teller/order",array("product"=>$session["pos"]),true);
			$resultset["total"] = $this->get_current_total($session["pos"]);
			$resultset["total_amount"] = $this->get_current_total($session["pos"],false);
			$resultset["message"] = "Product successfully added.";
		}else{
			$resultset["status"] = false;
			$resultset["message"] = "Product quantity exceeds available stock.";
		}
		

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}

	public function edit(){
		$session = $this->session->userdata();
		$post = $this->input->post();
		$resultset = array();

		if(count($post)){
			foreach($post as $name=>$value){
				$session["pos"][$name]["qty"] = $value;
			}

			$available = $this->product->availability($name,$value);

			if($available){
				$this->session->set_userdata("pos",$session["pos"]);

				$resultset["status"] = true;
				$resultset["data"] = $this->load->view("admin/pos/teller/order",array("product"=>$session["pos"]),true);
				$resultset["total"] = $this->get_current_total($session["pos"]);
				$resultset["total_amount"] = $this->get_current_total($session["pos"],false);
				$resultset["message"] = "Product successfully updated.";
			}else{
				$resultset["status"] = false;
				$resultset["message"] = "Product quantity exceeds available stock.";
			}
		}else{
			$resultset["status"] = false;
			$resultset["message"] = "No data found.";
		}

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}

	public function delete(){
		$session = $this->session->userdata();
		$post = $this->input->post();
		$resultset = array();

		if(count($post)){
			unset($session["pos"][$post["id"]]);

			$this->session->set_userdata("pos",$session["pos"]);

			$resultset["status"] = true;
			$resultset["data"] = $this->load->view("admin/pos/teller/order",array("product"=>$session["pos"]),true);
			$resultset["total"] = $this->get_current_total($session["pos"]);
			$resultset["total_amount"] = $this->get_current_total($session["pos"],false);
			$resultset["message"] = "Product successfully removed.";
		}else{
			$resultset["status"] = false;
			$resultset["message"] = "No data found.";
		}

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}

	public function process(){
		$session = $this->session->userdata();
		$post = $this->input->post();
		$resultset = array();

		if(isset($session["pos"]) && count($session["pos"])){
			$data = $post;
			$data["teller"] = $session["user"]["id"];
			$data["item"] = $session["pos"];

			$order = $this->sales->order($data);
			if($order){
				$this->session->set_userdata("pos",array());
				
				$resultset["status"] = true;
				$resultset["message"] = "Order successfully saved.";
				$resultset["url"] = site_url("admin/pos/teller/receipt/".$order);

				$this->notification->addSuccess("Order successfully saved.");
			}else{
				$resultset["status"] = false;
				$resultset["message"] = "Something went wrong. Please try again.";
			}

		}else{
			$resultset["status"] = false;
			$resultset["message"] = "No item found.";
		}

		$this->output->set_content_type("json")->set_output(json_encode($resultset));
	}

	public function cancel(){
		$this->session->set_userdata("pos",array());
		$this->notification->addSuccess("Order successfully cancelled.");

		redirect("admin/pos/teller");
	}

	public function receipt($id){
		$data = array();
		$where = array();

		$where["id"] = $id;
		$data["data"] = $this->crud->load("sales_order",$where);
		$data["data"]["teller"] = $this->crud->load("user",array("id"=>$data["data"]["teller_id"]));
		$data["item"] = $this->sales->order_item($id);

		$data["data"]["total"] = $this->sales->get_total($id);

		$this->load->view("admin/inventory/sales/receipt",$data);
	}
}