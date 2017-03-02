<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Computer_model extends CI_Model {

	//Read Staff
	public function show_all_computers()
	{
		$this->db->order_by('id');
		$query = $this->db->get('opscomp.computers');
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			echo "there is no data";
		}
	}

	// Insert into Staff
	public function add_computer() 
	{	
		$computer_field = array
		(
		'computer_name'=>$this->input->post('txtComputer'),
		'computer_type'=>$this->input->post('txtComputerType'),
		'os_version'=>$this->input->post('txtComputerOS'),
		'staff_id'=>$this->input->post('txtComputerOwner')
		);
		$this->db->insert('opscomp.computers', $computer_field);

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
	function edit_computer()
	{
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get('opscomp.computers');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	//update
		public function update_computer(){
		$id = $this->input->post('txtId');
		$field = array(
		'computer_name'=>$this->input->post('txtComputer'),
		'computer_type'=>$this->input->post('txtComputerType'),
		'os_version'=>$this->input->post('txtComputerOS'),
		'staff_id'=>$this->input->post('txtComputerOwner')
		);
		$this->db->where('id', $id);
		$this->db->update('opscomp.computers', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	//delete
	public function delete_computer(){
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$this->db->delete('opscomp.computers');
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