<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	function create_user($data)
	{
		$this->db->insert('users',$data);
	}
	function login($username,$password,$type)
	{
		$where = array(
				'username' => $username,
				'password' => sha1($password),
				'user_type' => $type
		 		);
		$this->db->select()->from('users')->where($where);
		$query = $this->db->get();
		return $query->first_row('array');
	}
	function get_emails()
	{
		$this->db->select('email')->from('users');
		$query=$this->db->get();
		return $query->result_array();
	}

}

/* End of file user.php */
/* Location: ./application/models/user.php */