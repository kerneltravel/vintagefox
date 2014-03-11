<h1>Edit Post</h1>
<div id="posts-list" class="cf">
	<?php 
		if($success==1){?>
		<p class='infobox-success'>This post has been updated!</p>
	<?php }?>
	<form id="commentform" action="<?=base_url()?>posts/editpost/<?=$post['postID']?>" method="post">
		<p><label>Title: </label><input type="text" name="title" value="<?=$post['title']?>"></p>
		<p><label>Post: </label><textarea name="post" id="post" cols="30" rows="10"><?=$post['post']?></textarea></p>
		<p><input type="submit" value="Edit post"></p>
	</form>
</div>
