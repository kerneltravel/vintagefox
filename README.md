# VintageFox

Weblab is a Blog built with CodeIgniter. Check it out at [vintagefox-mimzy.rhcloud.com](//vintagefox-mimzy.rhcloud.com/).

## Table of contents

 - [Introduction](#introduction)
 - [Organization](#organization)
 - [Code](#code)
 - [Author](#author)
 - [Copyright and license](#copyright-and-license)

## Introduction

### Technology

- PHP, MySQL
- CodeIgniter

### Functionality

Blog.

### Template

Template is **responsive**. It consists of:

- header
- footer
- sidebar
- content

#### Theme
[Vintage Template](//luiszuno.com).

## Organization

### Organization Scheme

Within project are following directories and files:

```
weblab/
├── application/
│   ├── controllers/
│   ├── core/
│   ├── models/
│   └── views/
├── img/
├── css/
├── fonts/
├── js/
├── system/
├── captcha/
├── smileys/
└── index.php
```

### Web Pages

Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, minima, similique consectetur perspiciatis voluptatum ipsa neque repellendus quae sed odio cumque aliquid harum officia placeat aliquam esse saepe itaque quaerat.

## Code

### Model post.php

```
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
```

## Author

**Milica Soljaga**

- <http://mimzy.github.io>
- <http://twitter.com/ReflectiveMila>

## Copyright and license

Code released under [the MIT license](http://opensource.org/licenses/MIT).