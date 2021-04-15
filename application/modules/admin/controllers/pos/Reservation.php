<?php 

class Reservation extends AdminController{
	public $url = "admin/pos/reservation";

	public function __construct(){
		parent::__construct();

		$this->load->model("crud_model","crud");
		$this->load->model("reservation_model","reservation");
	}

	public function index(){
		$data = array();
		$where = array();

		$where["reserve.status !="] = 0;
		$data["collection"] = $this->reservation->collection($where);

		$this->title = "Reservation";
		$this->script = "admin/pos/reservation/script";
		$this->render($this->url,$data);
	}

	public function view($id){
		$data = array();
		$where = array();

		$where["id"] = $id;
		$reserve = $this->reservation->load($where);
		if($reserve){
			$data["data"] = $reserve;
			$data["item"] = $this->reservation->reservation_item($id);
			$this->title = "Reservation # ".str_pad($reserve["id"],7, "0", STR_PAD_LEFT);
			$this->render("admin/pos/reservation/view",$data);
		}else{
			$this->notification->addError("Reservation not found.");

			redirect("admin/pos/reservation","refresh");
		}
	}

	public function delete($id){
		$where = array();
		$data = array();

		$where["id"] = $id;
		$data["status"] = 0;

		$query = $this->crud->update("reservation",$data,$where);
		if($query){
			$this->notification->addSuccess("Reservation successfully deleted.");
		}else{
			$this->notification->addError("Something went wrong. Please try again later.");
		}
		
		redirect($this->url,"refresh");		
	}
}