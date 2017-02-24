<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department_model extends CI_Model {

	//Read Staff
	public function show_all_departments()
	{
		$this->db->order_by('id');
		$query = $this->db->get('opscomp.department');
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			echo "there is no data";
		}
	}

	// Insert into Staff
	public function add_department() 
	{	
		$department_field = array
		(
		'name'=>$this->input->post('txtDepartment'),
		'department_head'=>$this->input->post('txtDepartmentHead'),
		'description'=>$this->input->post('txtDepartmentDescription')
		);
		$this->db->insert('opscomp.department', $department_field);

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
	function edit_department()
	{
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get('opscomp.department');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	//update
		public function update_department(){
		$id = $this->input->post('txtId');
		$field = array(
		'name'=>$this->input->post('txtDepartment'),
		'department_head'=>$this->input->post('txtDepartmentHead'),
		'description'=>$this->input->post('txtDepartmentDescription')
		);
		$this->db->where('id', $id);
		$this->db->update('opscomp.department', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	//delete
	public function delete_department(){
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$this->db->delete('opscomp.department');
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