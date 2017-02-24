<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_m extends CI_Model{
	public function showAllEmployee(){
		$this->db->order_by('id');
		$query = $this->db->get('opscomp.staff');
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			echo "there is no data";
		}
	}

	public function addEmployee(){
		$staff_field = array
		(
		'title'=>$this->input->post('txtStaffTitle'),
		'firstname'=>$this->input->post('txtStaffName'),
		'surname'=>$this->input->post('txtStaffSurname'),
		'status'=>$this->input->post('txtStaffStatus'),
		'gender'=>$this->input->post('txtStaffGender')
		);
		$this->db->insert('opscomp.staff', $staff_field);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function editEmployee(){
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get('opscomp.staff');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateEmployee(){
		$id = $this->input->post('txtId');
		$field = array(
		'firstname'=>$this->input->post('txtEmployeeName'),
		'surname'=>$this->input->post('txtAddress')
		);
		$this->db->where('id', $id);
		$this->db->update('opscomp.staff', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function deleteEmployee(){
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$this->db->delete('opscomp.staff');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}