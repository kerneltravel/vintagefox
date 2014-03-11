<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('post');
	}

	public function index($start=0)
	{
		$data['posts']=$this->post->get_posts(3,$start);
		$this->load->library('pagination');
		$config['base_url']=base_url().'posts/index';
		$config['total_rows']=$this->post->get_posts_count();
		$config['per_page']=3;
		$config['full_tag_open'] = '<div class="page-navigation cf">';
		$config['full_tag_close'] = '</div>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<div class="nav-next">';
		$config['prev_tag_close'] = '</div>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<div class="nav-previous">';
		$config['next_tag_close'] = '</div>';
		$config['display_pages'] = FALSE;
		$this->pagination->initialize($config);
		$data['pages']=$this->pagination->create_links();
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('post_index',$data);
		$this->load->view('footer');
	}

	function post($postID)
	{
		$this->load->model('comment');
		$data['comments']=$this->comment->get_comments($postID);
		$data['post']=$this->post->get_post($postID);
		$this->load->helper('captcha');
		$vals=array(
			'img_path'=>'./captcha/',
			'img_url'=>base_url().'captcha/',
			'img_width'=>150,
			'img_height'=>30
		);
		$cap=create_captcha($vals);
		$this->session->set_userdata('captcha',$cap['word']);
		$data['captcha']=$cap['image'];
		//smileys ;)
		$this->load->helper('smiley');
		$this->load->library('table');
		$image_arrays=get_clickable_smileys(base_url().'smileys/','comment');
		$col_array=$this->table->make_columns($image_arrays,8);
		$data['smiley_table']=$this->table->generate($col_array);

		$this->load->helper('form');
		$this->load->view('header');
		$this->load->view('aside');
		$this->load->view('post',$data);
		$this->load->view('footer');
	}

	public function new_post()
	{
		if(!$this->correct_permissions("author")){
			redirect(base_url().'users/login');
		}
		if($_POST){
			$data = array(
				'title' => $_POST['title'],
				'post' => $_POST['post'],
				'active' => 1
				 );
			$this->post->insert_post($data);
			redirect(base_url().'posts/');
		}else{
			//just showing a form
			$this->load->view('header');
			$this->load->view('new_post');
			$this->load->view('footer');
		}
	}

	public function correct_permissions($required)
	{
		$user_type=$this->session->userdata('user_type');
		if($required=="user"){
			if($user_type){
				return true;
			}
		}elseif($required=="author"){
			if($user_type=="author" || $user_type=="admin"){
				return true;
			}
		}elseif($required=="admin"){
			if($user_type=="admin"){
				return true;
			}
		}
	}

	public function editpost($postID)
		{
			$data['success']=0;
			if(!$this->correct_permissions("author")){
			redirect(base_url().'users/login');
			}
			if($_POST){
				$data_post = array(
					'title' => $_POST['title'],
					'post' => $_POST['post'],
					'active' => 1
					);
				$this->post->update_post($postID,$data_post);
				$data['success'] = 1;
			}
			$data['post']=$this->post->get_post($postID);
			$this->load->view('header');
			$this->load->view('aside');
			$this->load->view('edit_post',$data);
			$this->load->view('footer');
		}
		
		public function deletepost($postID)
		{
			if(!$this->correct_permissions("admin")){
			redirect(base_url().'users/login');
			}
			$this->post->delete_post($postID);
			redirect(base_url().'posts/');
		}


}

/* End of file posts.php */
/* Location: ./application/controllers/posts.php */