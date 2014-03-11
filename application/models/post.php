<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Model {

	function get_posts($num=20,$start=0)
 	{
		$this->db->order_by('date_added', 'desc');
		$query=$this->db->get_where('posts',array('active' => 1),$num,$start);
 		return $query->result_array();
 	}

 	function get_posts_count()
 	{
 		$this->db->select('postID')->from('posts')->where('active',1);
 		$query=$this->db->get();
 		return $query->num_rows();
 	}

 	function get_post($postID)
 	{
 		$this->db->select()->from('posts')->where(array('active' => 1, 'postID' => $postID))->order_by('date_added','desc');
 		$query = $this->db->get();
 		return $query->first_row('array');
 	}

 	function insert_post($data)
 	{
 		$this->db->insert('posts',$data);
 		return $this->db->insert_id();
 	}


 	function update_post($postID,$data)
 	{
 		$this->db->where('postID',$postID);
 		$this->db->update('posts',$data);
 	}

 	function delete_post($postID)
 	{
		$this->db->where('postID',$postID);
		$this->db->delete('posts');
 	}

 	function query()
 	{
 		$query = $this->db->query("select * from posts 
 		where active=1 order by date_added desc limit 0,20;");
 	}

}

/* End of file post.php */
/* Location: ./application/models/post.php */