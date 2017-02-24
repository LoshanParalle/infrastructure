<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model {

	//Read Staff
	public function show_all_emails()
	{
		$this->db->order_by('id');
		$query = $this->db->get('opscomp.emails');
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			echo "there is no data";
		}
	}

	// Insert into Staff
	public function add_email() 
	{	
		$email_field = array
		(
		'email_address'=>$this->input->post('txtEmail'),
		'password'=>$this->input->post('txtEmailPassword')
		);
		$this->db->insert('opscomp.emails', $email_field);

		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	//Update
	function edit_email()
	{
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get('opscomp.emails');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	//update
		public function update_email(){
		$id = $this->input->post('txtId');
		$field = array(
		'email'=>$this->input->post('txtStaffTitle'),
		'password'=>$this->input->post('txtStaffName')	
		);
		$this->db->where('id', $id);
		$this->db->update('opscomp.emails', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	//delete
	public function delete_email(){
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$this->db->delete('opscomp.emails');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
}

/* End of file home.php */
/* Location: ./application/models/email_model.php */

?>