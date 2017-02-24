<?php

 class Home extends CI_Controller {
 
 		function __construct(){
		parent:: __construct();
		//load the model inside constructor
		$this->load->model('home_model', 'h');
		$this->load->helper('url');

	}
	
	//display the home page
	function index()
	{
		$this->load->view('layout/header');
		$this->load->view('home_view');
		$this->load->view('layout/footer');

	}

    //display all the staff
    public function show_all_staff(){
		$result = $this->h->show_all_staff();
		echo json_encode($result);
	}

    //Add Employee
    public function add_staff()
    {
		$result = $this->h->add_staff();				
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function edit_staff(){
		$result = $this->h->edit_staff();
		echo json_encode($result);
	}

	public function update_staff(){
		$result = $this->h->update_staff();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}


	//delete a staff member
	public function delete_staff(){
		$result = $this->h->delete_staff();
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

	public function invoice(){
		$result = $this->h->invoice();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
 	

 	public function get_latest_id(){
	$result = $this->h->get_latest_id();
	echo json_encode($result);
	}
 	

//generate the staff for the home page
 	/*public function show_staff()
    {
        // load table library
        $this->load->library('table');
        
        // set heading
        $this->table->set_heading('#','Title', 'First Name', 'Last Name', 'status', 'gender', 'email');

        // set template
        $style = array('table_open'  => '<table class="table table-striped table-hover">');
        $this->table->set_template($style);

        
        //Get the staff data
        $sql = "select s.id, s.title, s.firstname, s.surname, s.status, s.gender,e.email_address
			from opscomp.staff s
			join opscomp.emails e
			on  s.emails_id = e.id
			where status = 'active'
			order by s.id";
        
        $query = $this->db->query($sql);
        echo $this->table->generate($query);
    }
	*/
 };