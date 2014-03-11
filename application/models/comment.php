<?php 
	class Comment extends CI_Model{
		function add_comment($data)
		{
			$this->db->insert('comments',$data);
		}
		function get_comments($postID)
		{
			$this->db->select('comments.*,users.username')->from('comments')->join('users','users.userID=comments.userID','left')->where('postID',$postID)->order_by('comments.date_added','asc');
			$query=$this->db->get();
			return $query->result_array();
		}
	}
?>