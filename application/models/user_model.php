<?php
class User_model extends CI_Model{
	public function check($data){
	$query =  $this->db->get_where('user',['username' => $data['username'], 'password'=>$data['password']]);
	if($query->num_rows() == 1)
	{
		return $query->row()->id;
	}
	else{
		return false;
	}
 }
	 public function posts($user_id){
	 	$this->db->order_by("id","DESC");
	 	$query = $this->db->get_where('posts',['user_id'=>$user_id]);
	 	return $query->result_array();
	 }

	 public function post($id){
	 	$query = $this->db->get_where('posts',['id'=>$id]);
	 	return $query->row_array();
	 }

	 public function register($data){
	 	return $this->db->insert('user',$data);
	 }

	 public function create_post($data){
	 	$this->db->insert('posts',$data);
	 	$this->db->trans_complete();
    	return $this->db->insert_id();
	 }
	 // public function increase_likes($post_id){
	 // 	$this->bd->get_where('like',array('post_id'=>$post_id));

	 // }
	 // 
	 
	 public function get_categories(){
	 	$query = $this->db->get('categories');
	 	return $query->result_array();
	 }

	 public function countPosts($user_id){
	 	$query = $this->db->get_where('posts',array('user_id'=>$user_id));
	 	return $query->num_rows();
	 }

	 public function get_user($user_id){
	 	$query = $this->db->get_where('user',array('id'=>$user_id));
	 	return $query->result_array();
	 }

	 public function link_post_category($table){
	 	return $this->db->insert('post_category',$table);
	 }

	 public function get_posts(){
	 	$this->db->order_by("rand()");
	 	$this->db->limit(4);
	 	$query = $this->db->get('posts');
	 	return $query->result_array();
	 }

	public function checkOldPassword(){
	 	$user_id = $this->session->userdata('user_id');
	 	$query = $this->db->get_where('user',array('id'=>$user_id,'password'=>$this->input->post('cpwd')));
	 	if($query->num_rows()==1)
	 	{
	 		return TRUE;
	 	}
	 	else{
	 		return FALSE;
	 	}
	 }

	 public function updatePassword()
	 {
	 	$user_id = $this->session->userdata('user_id');
	 	$this->db->set('password',$this->input->post('npwd'));
	 	$this->db->where(['id'=>$user_id]);
	 	return $this->db->update('user');
	 }

	 public function checkOldUsername(){
	 	$user_id = $this->session->userdata('user_id');
	 	$query = $this->db->get_where('user',array('id'=>$user_id,'username'=>$this->input->post('cuname')));
	 	if($query->num_rows()==1)
	 	{
	 		return TRUE;
	 	}
	 	else{
	 		return FALSE;
	 	}
	 }

	 public function updateUsername()
	 {
	 	$user_id = $this->session->userdata('user_id');
	 	$this->db->set('username',$this->input->post('nuname'));
	 	$this->db->where(['id'=>$user_id]);
	 	return $this->db->update('user');
	 }

	 public function add_comment(){

	 	$data = array(
			'post_id' => $this->input->post('id'),
			'user_id' => $this->session->userdata('user_id'),
			'comment_content' => $this->input->post('comment_content'),
		);
		$this->db->insert('comment',$data);
		if($this->db=affected_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	 }

	 public function get_comments(){
	 	$post_id = $this->input->post('id');
	 	$query = $this->db->get_where('comment',array('post_id'=>$post_id));
	 	if($query->num_rows()>0){
	 		$query = $query->result_array();
	 		$output = "";
	 		foreach ($query as $row) {
	 			$output .= "<span>".$row['posted_at']."</span>
	 			<p>".$row['comment_content']."<a style='float:right;''>Delete</a></p>";
	 			return $output;
	 		}
	 	}
	 	else{
	 		return  $output = "<p>No Comments</p>";
	 	}
	 	
	 }

	 public function update_post($post_id){
	 		$data = array(
			'title' => $this->input->post('title'),
			'user_id' => $this->session->userdata('user_id'),
			'body' => $this->input->post('body'),
		);
	 	$this->db->set($data);
	 	$this->db->where('id',$post_id);
	 	$this->db->update('posts');
	 }

	 public function link_updatePost_category($category_id,$post_id){
	 	$this->db->set('category_id',$category_id);
	 	$this->db->where('post_id',$post_id);
	 	return $this->db->update('post_category');
	 }

	 public function deletePost($post_id){
	 	$this->db->where('id',$post_id);
	 	return $this->db->delete('posts');
	 }

	public function deleteComment($comment_id){
		$this->db->where('id',$comment_id);
		return $this->db->delete('comment');
	}

	public function checkLikes($post_id){

		$this->db->where(array('post_id'=>$post_id,'user_id'=>$this->session->userdata('user_id')));
		$query = $this->db->get('likes');
		if($query->num_rows()>0)
		{
			return false;
		}
		else{
			return true;
		}
	}

	public function like_post($post_id){
		return $this->db->insert('likes',array('user_id'=>$this->session->userdata('user_id'),'post_id'=>$post_id));
	}

	public function Count_Likes($post_id){
		$this->db->where('post_id',$post_id);
		$query = $this->db->get('likes');
		return $query->num_rows();
	}
}