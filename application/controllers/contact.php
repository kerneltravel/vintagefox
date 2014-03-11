<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function index()
	{
		$this->load->view('contact_header');
		$this->load->view('contact');
		$this->load->view('footer');
	}

}

/* End of file contact.php */
/* Location: ./application/controllers/contact.php */