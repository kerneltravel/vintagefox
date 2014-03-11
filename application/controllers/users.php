<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function login()
	{
		$data['error']=0;
		if($_POST){
			$this->load->model('user');
			$username = $this->input->post('username',true);
			$password = $this->input->post('password',true);
			$type = $this->input->post('user_type',true);
			$user = $this->user->login($username,$password,$type);
			if(!$user){
				$data['error']=1;
			}else{
				$this->session->set_userdata('userID',$user['userID']);
				$this->session->set_userdata('user_type',$user['user_type']);
				redirect(base_url().'posts');
			}
		}
		//if no POST or ERROR in login
		$this->load->view('header');
		$this->load->view('login',$data);
		$this->load->view('footer');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'posts');
	}

	public function register()
	{
		$data['errors']='';
		if($_POST){
			//validation
			$config =array(
				array(
					'field' => 'username',
					'label' => 'Username',
					//is username column unique in users table
					'rules' => 'trim|required|min_length[3]|is_unique[users.username]'
				),
				array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'trim|required|min_length[5]'
				),
				array(
					'field' => 'password2',
					'label' => 'Password confirmed',
					'rules' => 'trim|required|min_length[5]|matches[password]'
				),
				array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'trim|required|is_unique[users.email]|valid_email'
				),
				array(
					'field' => 'user_type',
					'label' => 'User Type',
					'rules' => 'required'
				)
			);
			$this->load->library('form_validation');
			$this->form_validation->set_rules($config);
			$this->form_validation->set_error_delimiters('<p class="infobox-error">', '</p>');
			if($this->form_validation->run()== FALSE){
				$data['errors']=validation_errors();
			}else{
				//registration
				$data = array(
				'username' => $_POST['username'],
				'password' => sha1($_POST['password']),
				'email' => $_POST['email'],
				'user_type' => $_POST['user_type']
				 );
				$this->load->model('user');
				$userid=$this->user->create_user($data);
				$this->session->set_userdata('userID',$userid);
				$this->session->set_userdata('user_type',$_POST['user_type']);
				redirect(base_url().'posts');
			}
		}
		$this->load->helper('form');
		$this->load->view('header');
		$this->load->view('register_user',$data);
		$this->load->view('footer');
	}

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */