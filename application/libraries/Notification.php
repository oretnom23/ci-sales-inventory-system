<?php 

class Notification{
	public $ci = false;
	public $access = "admin";

	public function __construct($data){
		$this->ci = $data["object"];
		$this->access = $data["access"];
	}

	public function addSuccess($data){
		$session = $this->getSessionData();
		$session[count($session)] = array("type"=>"success","message"=>$data);

		$this->setSessionData($session);
	}

	public function addError($data){
		$session = $this->getSessionData();
		$session[count($session)] = array("type"=>"danger","message"=>$data);

		$this->setSessionData($session);
	}

	public function addWarning($data){
		$session = $this->getSessionData();
		$session[count($session)] = array("type"=>"warning","message"=>$data);

		$this->setSessionData($session);
	}

	public function getData(){
		return array("notification"=>$this->getSessionData());
	}

	protected function getSessionData(){
		$session = $this->ci->session->flashdata();
		if(isset($session["notification"][$this->access])){
			return $session["notification"][$this->access];
		}else{
			return $session["notification"][$this->access] = array();
		}
	}

	protected function setSessionData($data){
		$session = array();
		$session[$this->access] = $data;

		$this->ci->session->set_flashdata("notification",$session);
	}
}