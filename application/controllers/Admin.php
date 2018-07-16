<?php


class Admin extends CI_Controller{
	public function index(){
		
		if($this->session->userdata('admin_name')){
			$this->load->view('admin/admin_header');
			$this->load->view('admin/index');
			$this->load->view('admin/admin_footer');
		}
		else{
			redirect('Login/loginforYk');
		}
		
	}

	public function logout()
	{
		$this->session->unset_userdata('admin_name');
		redirect('Login');
	}
}