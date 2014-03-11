<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends CI_Controller {

	public function add_comment($postID)
		{
			//nothing got posted
			if(!$_POST){
				redirect(base_url().'posts/post/'.$postID);
			}
			//not logged in
			$user_type=$this->session->userdata('user_type');
			if(!$user_type){
				redirect(base_url().'users/login');
			}
			//captcha doesn't match
			if(strtolower($this->session->userdata('captcha'))!=strtolower($_POST['captcha'])){
				redirect(base_url().'posts/post/'.$postID.'/captcha');
			}else{
				$this->load->model('comment');
				$data=array(
					'postID'=>$postID,
					'userID'=>$this->session->userdata('userID'),
					'comment'=>$_POST['comment']
				);
				$this->comment->add_comment($data);
				redirect(base_url().'posts/post/'.$postID);
			}
		}

}

/* End of file comments.php */
/* Location: ./application/controllers/comments.php */