<?php

class User_controller extends CI_Controller{

	public function index(){
		if($user_id = $this->session->userdata('user_id')){
			$data['categories'] = $this->user_model->get_categories();
			$data['count'] =  $this->user_model->countPosts($user_id);
			$data['user_id'] = $user_id;
			$this->load->view('Dashboard/header');
			$this->load->view('Dashboard/dashboard_bar',$data);
			$this->load->view('Dashboard/dashboard',$data);
			$this->load->view('Dashboard/footer');
		}
		else
		{
			return redirect('Login/user_login');
		}
		
	}

	public function create_post(){
		$data['categories'] = $this->user_model->get_categories();
		$user_id = $this->session->userdata('user_id');
		$data['user_id'] = $user_id;
		$this->load->view('Dashboard/header');
		$this->load->view('Dashboard/dashboard_bar',$data);
		$this->load->view('Dashboard/create_post',$data);
		$this->load->view('Dashboard/footer');
	}

	public function Logout(){
		$this->session->unset_userdata('user_id');
		return redirect('Login');
	}

	public function viewPosts($user_id){
		$data['categories'] = $this->user_model->get_categories();
		$data['posts'] = $this->user_model->posts($user_id);
		$data['user'] = $this->user_model->get_user($user_id);
		$data['user_id'] = $user_id;
		$this->load->view('Dashboard/header');
		$this->load->view('Dashboard/dashboard_bar',$data);
		$this->load->view('Dashboard/Posts',$data);
		$this->load->view('Dashboard/footer');
	}

	public function Inserting_post($user_id){
		$data = array(
			'title' => $this->input->post('title'),
			'user_id' => $user_id,
			'body' => $this->input->post('body'),
		);

		$category_id = $this->input->post('category');
		$post_id = $this->user_model->create_post($data);
		echo $category_id;
		$table = array(
			'category_id' => $category_id,
			'post_id' => $post_id
		);
		if($this->user_model->link_post_category($table)){
			$this->session->set_flashdata('post_added','Posted Successfully');
			return redirect('User_controller/viewPosts/'.$user_id);
		}
	}

	public function Post($post_id){
		$data['count'] = $this->user_model->Count_Likes($post_id);
		$data['categories'] = $this->user_model->get_categories();
		$user_id = $this->session->userdata('user_id');
		
		$data['user_id'] = $user_id;
		$data['post'] = $this->user_model->post($post_id);
		$this->load->view('Dashboard/header');
		$this->load->view('Dashboard/dashboard_bar',$data);
		$this->load->view('Dashboard/Post',$data);
		$this->load->view('Dashboard/footer');
	}

	public function changePassword(){
		$user_id = $this->session->userdata('user_id');
		$data['categories'] = $this->user_model->get_categories();
		$data['user_id'] = $user_id;
		$this->load->view('Dashboard/header');
		$this->load->view('Dashboard/dashboard_bar',$data);
		$this->load->view('Dashboard/change_pwd',$data);
		$this->load->view('Dashboard/footer');
	}

	public function passwordProcess(){
		if($this->user_model->checkOldPassword())
		{
			if($this->user_model->updatePassword())
			{
				$this->session->set_flashdata('Success','Password changed Successfully');
				return redirect('User_controller/changePassword');
			}
			
		}
		else{
			$this->session->set_flashdata('Invalid_Password','Password Not matched');
			return redirect('User_controller/changePassword');
		}
		
	}

	public function changeUsername(){
		$user_id = $this->session->userdata('user_id');
		$data['categories'] = $this->user_model->get_categories();
		$data['user_id'] = $user_id;
		$this->load->view('Dashboard/header');
		$this->load->view('Dashboard/dashboard_bar',$data);
		$this->load->view('Dashboard/change_uname',$data);
		$this->load->view('Dashboard/footer');
	}

	public function usernameProcess(){
		if($this->user_model->checkOldUsername())
		{
			if($this->user_model->updateUsername())
			{
				$this->session->set_flashdata('Success','Username changed Successfully');
				return redirect('User_controller/changeUsername');
			}
		}
		else{
			$this->session->set_flashdata('Invalid_Password','Username Not matched');
			return redirect('User_controller/changeUsername');
		}
	}

	public function addComment(){
		$result = $this->user_model->add_comment();
		
		if($result){
			echo json_encode("succes");
		}
		
	}

	public function editPost($post_id){
		$data['categories'] = $this->user_model->get_categories();
		$user_id = $this->session->userdata('user_id');
		$data['user_id'] = $user_id;
		$data['post'] = $this->user_model->post($post_id);
		$this->load->view('Dashboard/header');
		$this->load->view('Dashboard/dashboard_bar',$data);
		$this->load->view('Dashboard/editPost',$data);
		$this->load->view('Dashboard/footer');
	}

	public function Updating_post($post_id){
		$category_id = $this->input->post('category');
		$this->user_model->update_post($post_id);
		if($this->user_model->link_updatePost_category($category_id,$post_id)){
			$this->session->set_flashdata('post_updated','Updated Successfully');
			return redirect('User_controller/Post/'.$post_id);
		}
	}

	public function deletePost($post_id){
		if($this->user_model->deletePost($post_id)){
			$this->session->set_flashdata('delete','Post Deleted');
			redirect('User_controller/viewPosts/'.$this->session->userdata('user_id'));
		}
		else{

		}
	}

	public function deleteComment($comment_id,$post_id){
		if($this->user_model->deleteComment($comment_id)){
			return redirect('User_controller/Post/'.$post_id);
		}
	}

	public function likePost()
	{
		//Checking For User Is Already Like Post Or not
		//If User Not Liked 
		$post_id=$this->input->post('id');
		if($this->user_model->checkLikes($post_id))
		{
			if($this->user_model->like_post($post_id)){
				echo json_encode($this->user_model->Count_Likes($post_id));
			}
			else{
				$this->session->set_flashdata('Like','Error');
				redirect('User_controller/Post/'.$post_id);
			}
		}
		//If user Liked
		else{
			redirect('User_controller/Post/'.$post_id);
		}

	}

	public function countPost()
	{
		$post_id=$this->input->post('id');
		echo json_encode($this->user_model->Count_Likes($post_id));
	}

	public function fetchComment()
	{
		echo json_encode($this->user_model->get_comments());
	}
}