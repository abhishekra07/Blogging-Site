<?php
class Login extends CI_Controller{
	public function index(){
		$data['posts'] = $this->user_model->get_posts();
		$user_id = $this->session->userdata('user_id');
		if($user_id)
		{
			$data['categories'] = $this->user_model->get_categories();
			$data['count'] =  $this->user_model->countPosts($user_id);
			$data['categories'] = $this->user_model->get_categories();
			$data['user_id'] = $user_id;
			$this->load->view('Dashboard/header');
			$this->load->view('Dashboard/dashboard_bar',$data);
			$this->load->view('Home/index',$data);
			$this->load->view('Dashboard/footer');
		}
		else{
			$this->load->view('Home/main_header');
			$this->load->view('Home/index',$data);
			$this->load->view('Home/main_footer');
		}
	}

	
	public function check(){
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('pwd')  );  

			$user_id = $this->user_model->check($data);

			if($user_id){

				$this->session->set_userdata('user_id',$user_id);
				return redirect('User_controller');
			}

			else{
				$this->session->set_flashdata('login_failed','Incorrect Username/Password');
				$this->load->view('Dashboard/login');		}
		}
	
	//Authenticate user login to blog web page
	public function user_login(){
		if($this->session->userdata('user_id'))
		{
			return redirect('User_controller');
		}
		else{
			$this->load->view('Dashboard/login');
		}
		
	}

	//to register user
	public function register(){
		$data = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
		);
		if($this->user_model->register($data)){
			$data['user'] = $data;
			$this->load->view('blog/header');
			$this->load->view('blog/dashboard',$data);
			$this->load->view('blog/footer');
		}
		else{
			redirect('Login');
		}
	}
	
	//add comment
	public function comment($post_id){
		$data = array(
			'post_id' => $post_id,
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'comment_body' => $this->input->post('comment_body'),
		);
		$this->user_model->create_comment($data);
		redirect('Login/post/'.$post_id);
	
	}
	//logout from application
	public function Logout(){
		$this->session->unset_userdata('user_id');
		redirect('Login/user_login');
	}

	//add new blog post
	public function create_post($user_id){
		$data = array(
			'user_id'=> $user_id,
			'title' => $this->input->post('title'),
			'body' => $this->input->post('body')
		);
		$category_id = $this->input->post('category');
		if($this->user_model->create_post($data)){


			echo "<script>alert('Post Created Successfully');</script>";
		}
		else{
			redirect('Login/Create');
		}
	}
	
	//add like to post
	public function Like($post_id){
		$this->user_model->increase_likes($post_id);
		//revert response to user
	}
	 
	public function Post($post_id){
		$data['categories'] = $this->user_model->get_categories();
		$data['post'] = $this->user_model->post($post_id);
		$data['count'] = $this->user_model->Count_Likes($post_id);
		$data['comments'] = $this->user_model->get_comments($post_id);
		if($user_id = $this->session->userdata('user_id'))
		{
			$data['user_id'] = $user_id;
			$this->load->view('Dashboard/header');
			$this->load->view('Dashboard/dashboard_bar',$data);
			$this->load->view('Dashboard/Post',$data);
			$this->load->view('Dashboard/footer');
		}
		else{
			$this->load->view('Home/main_header');
			$this->load->view('Home/Post',$data);
			$this->load->view('Home/main_footer');
		}
	}
	public function about(){
		if($user_id = $this->session->userdata('user_id'))
		{
			$data['categories'] = $this->user_model->get_categories();
			$data['count'] =  $this->user_model->countPosts($user_id);
			$data['user_id'] = $user_id;
			$this->load->view('Dashboard/header');
			$this->load->view('Dashboard/dashboard_bar',$data);
			$this->load->view('Home/about');
			$this->load->view('Dashboard/footer');
		}
		else{
			$this->load->view('Home/main_header');
			$this->load->view('Home/about');
			$this->load->view('Home/main_footer');
		}
	}

	public function contact(){
		if($user_id = $this->session->userdata('user_id'))
		{
			$data['categories'] = $this->user_model->get_categories();
			$data['count'] =  $this->user_model->countPosts($user_id);
			$data['user_id'] = $user_id;
			$this->load->view('Dashboard/header');
			$this->load->view('Dashboard/dashboard_bar',$data);
			$this->load->view('Home/contact');
			$this->load->view('Dashboard/footer');
		}
		else{
			$this->load->view('Home/main_header');
			$this->load->view('Home/contact');
			$this->load->view('Home/main_footer');
		}
	}
	
	//check admin session
	public function loginforYk(){
		if($this->session->userdata('admin_name')){
			redirect('Admin');
		}
		else{
			$this->load->view('Home/Login');
		}
	}

	//authenticate admin user
	public function AdminAuthentication(){
		if($this->Admin_model->checkAdminCredential())
		{
			$this->session->set_userdata('admin_name','Yk');
			redirect('Admin');
		}
		else{
			//redirect back to page from where its called
		}
	}
}
