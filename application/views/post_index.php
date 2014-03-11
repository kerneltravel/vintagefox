<!-- posts list -->
<h1>Blog Posts</h1>
<?php 
if(!isset($posts)){
?>
<p class="dropcap dark">There are currently no posts.</p>
<?php 
}else{?>
<div id="posts-list" class="cf"> 
<?php
	foreach ($posts as $row) {
?>
	<article>
		<div class="excerpt">
			<a class="post-heading" href="<?=base_url()?>posts/post/<?=$row['postID']?>"><?=$row['title']?></a>
			<p><?=substr(strip_tags($row['post']), 0,200).".."?></p>
		</div>
		<div class="meta">
			<span><a href="<?=base_url()?>posts/post/<?=$row['postID']?>">Read More</a></span> - 
			<span><a href="<?=base_url()?>posts/editpost/<?=$row['postID']?>">Edit</a> | <a href="<?=base_url()?>posts/deletepost/<?=$row['postID']?>">Delete</a></span>
		</div>
		<i class="tape"></i>
	</article>	

	<?php
	 } 
	 echo $pages;
	 ?>
</div>
<!-- ENDS posts list -->
<?php } ?>
	