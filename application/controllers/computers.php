<?php

 class Computers extends CI_Controller {
 
 		function __construct(){
		parent:: __construct();
		//load the model inside constructor
		$this->load->model('computer_model', 'c');
		$this->load->helper('url');

	}
	
	//display the home page
	function index()
	{
		$this->load->view('layout/header');
		$this->load->view('computer_view');
		$this->load->view('layout/footer');

	}

    //display all the staff
    public function show_all_computers(){
		$result = $this->c->show_all_computers();
		echo json_encode($result);
	}

    //Add Employee
    public function add_computer()
    {
		$result = $this->c->add_computer();				
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function update_computer(){
		$result = $this->c->update_computer();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}


	//delete a staff member
	public function delete_computer(){
		$result = $this->c->delete_computer();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

    //logout of the home page and direct to the login page
 	public function logout()
 	{
 		$this->load->model('login_model');
 		$this->load->view('login_view');
 	}
 	
 };