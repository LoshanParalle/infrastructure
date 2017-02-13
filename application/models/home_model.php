<?php

class Home_model extends CI_Model {

	public function show_all_staff()
	{
		//Get the staff data
        $sql = "select s.id, s.title, s.firstname, s.surname, s.status, s.gender,e.email_address
			from opscomp.staff s
			join opscomp.emails e
			on  s.emails_id = e.id
			where status = 'active'
			order by s.id";
        
        $query = $this->db->query($sql);

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			echo "there is no data";
		}
	}

	// add a staff member
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
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	

	public function edit_user($data, $id) 
	{	

		//ci default insert method
		$this->db->where(['id' => $id]);
		$this->db->update('opscomp.users', $data);
	}
	


	public function delete_user($id) 
	{	

		//ci default insert method
		$this->db->where(['id' => $id]); 
		$this->db->delete('opscomp.users');
	}
	
}

/* End of file home.php */
/* Location: ./application/models/home.php */

?>