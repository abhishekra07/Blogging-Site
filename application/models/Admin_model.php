<?php

class Admin_model extends CI_Model{
	public function checkAdminCredential(){
		$this->db->where(array('username'=>$this->input->post('username'),'password'=>$this->input->post('password')));
		$query = $this->db->get('admin');
		if($query->num_rows()>0)
		{
			return true;
		}
		else{
			return false;
		}
	}
}