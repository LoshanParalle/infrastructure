<?php

 class department extends CI_Controller {
 
 		function __construct(){
		parent:: __construct();
		//load the model inside constructor
		$this->load->model('department_model', 'd');
		$this->load->helper('url');

	}
	
	//display the home page
	function index()
	{
		$this->load->view('layout/header');
		$this->load->view('department_view');
		$this->load->view('layout/footer');

	}

    //display all the staff
    public function show_all_departments(){
		$result = $this->d->show_all_departments();
		echo json_encode($result);
	}

    //Add Employee
    public function add_department()
    {
		$result = $this->d->add_department();				
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function update_department(){
		$result = $this->d->update_department();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}


	//delete a staff member
	public function delete_department(){
		$result = $this->e->delete_department();
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