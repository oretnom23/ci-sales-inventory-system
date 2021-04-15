<?php

class Account extends AdminController{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		
	}

	public function logout(){
		$this->session->set_userdata("user",array());
		$this->session->set_userdata("pos",array());

		redirect("admin/login","refresh");
	}
}