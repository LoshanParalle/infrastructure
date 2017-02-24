<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	//Read Staff
	public function show_all_staff()
	{

		//Get the staff data
       /* $sql = "select s.id, s.title, s.firstname, s.surname, s.status, s.gender,e.email_address
			from opscomp.staff s
			join opscomp.emails e
			on  s.emails_id = e.id
			--where status = 'active'

			order by s.id";
        
        $query = $this->db->query($sql);
		if($query->num_rows() > 0){
		return $query->result_array();
		}else{
			echo "there is no data";
		} */
		$this->db->order_by('id');
		$query = $this->db->get('opscomp.staff');
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			echo "there is no data";
		}
	}

	public function get_latest_id(){
    $sql=$this->db->query("SELECT MAX(id) as id FROM opscomp.staff");
    return $sql->result();
		} 

	// Insert into Staff
	public function add_staff($data) 
	{	
		$staff_field = array
		(
		'title'=>$this->input->post('txtStaffTitle'),
		'firstname'=>$this->input->post('txtStaffName'),
		'surname'=>$this->input->post('txtStaffSurname'),
		'status'=>$this->input->post('txtStaffStatus'),
		'gender'=>$this->input->post('txtStaffGender')
		);
		$this->db->insert('opscomp.staff', $staff_field);
	}

	
	public function invoice()
	{
		$this->db->query("generate_invoice_xml");
	}
	
	//Update
	function edit_staff()
	{
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get('opscomp.staff');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	//update
		public function update_staff(){
		$id = $this->input->post('txtId');
		$field = array(
		'title'=>$this->input->post('txtStaffTitle'),
		'firstname'=>$this->input->post('txtStaffName'),
		'surname'=>$this->input->post('txtStaffSurname'),
		'status'=>$this->input->post('txtStaffStatus'),
		'gender'=>$this->input->post('txtStaffGender')
		);
		$this->db->where('id', $id);
		$this->db->update('opscomp.staff', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	//delete
	public function delete_staff(){
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

/* End of file home.php */
/* Location: ./application/models/home.php */

?>