<?php

 class Emails extends CI_Controller {
 
 		function __construct(){
		parent:: __construct();
		//load the model inside constructor
		$this->load->model('email_model', 'e');
		$this->load->helper('url');

	}
	
	//display the home page
	function index()
	{
		$this->load->view('layout/header');
		$this->load->view('email_view');
		$this->load->view('layout/footer');

	}

    //display all the staff
    public function show_all_emails(){
		$result = $this->e->show_all_emails();
		echo json_encode($result);
	}

    //Add Employee
    public function add_email()
    {
		$result = $this->e->add_email();				
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function update_email(){
		$result = $this->e->update_email();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}


	//delete a staff member
	public function delete_email(){
		$result = $this->e->delete_email();
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