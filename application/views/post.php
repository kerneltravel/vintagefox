<?php 
	if(!isset($post)){?>
<p class="dropcap dark">This page was accessed incorectly.</p>
<?php
	}else{ ?>
	<!-- posts list -->
	<div id="posts-list" class="cf"> 
		<?php 
		//better use session
		if ($this->uri->segment(4)=='captcha') {
			echo "<p class='infobox-error'>The captcha code was incorrect.</p><br/>";
		}
		 ?>
		<article>
			<div class="excerpt">
				<a href="#" class="post-heading" ><?=$post['title']?></a>
				<p><?=$post['post']?></p>
			</div>
			<i class="tape"></i>
		</article>
		<!-- comments list -->
		<div id="comments-wrap">
			<h4 class="heading">Comments</h4>
			<?php if(count($comments)>0){
				foreach ($comments as $row) {?>
			<ol class="commentlist">      
				<li class="comment even thread-even depth-1">
					<div class="comment-body cf">
				     	<img alt='' src='http://0.gravatar.com/avatar/4f64c9f81bb0d4ee969aaf7b4a5a6f40?s=35&amp;d=&amp;r=G' class='avatar avatar-35 photo' height='35' width='35' />      
				     	<div class="comment-author vcard"><?=$row['username']?></div>
				        <div class="comment-meta commentmetadata">
					  		<span class="comment-date"><?=date('m/d/Y H:i A',strtotime($row['date_added']))?></span>
						</div>
				  		<div class="comment-inner">
					   		<p>
					   		<?php $str=$row['comment'];
								$str=parse_smileys($str,base_url().'smileys');
								echo $str;
								?>
							</p>
				 		</div>
			     	</div>
				</li>		
			</ol>
			<?php }
			}else{?>
			<p class="dropcap dark">There are currently no comments!</p>
			<?php } ?>
		</div>
		<!-- ENDS comments list -->
		<!-- Respond -->				
		<div id="respond">
			<h4 class="heading">Leave a Reply <small></small></h4>
			<?php 
				echo smiley_js();
				echo $smiley_table."<br/>";
				echo form_open(base_url().'comments/add_comment/'.$post['postID'], array('id'=>'commentform'));
			 ?>
			<p class="comment-form-comment">
				<label for="comment">Comment</label>
				<?php 
					$data_form=array(
					'name'=>'comment',
					'id'=>'comment' ,
					'cols'=>'45',
					'rows'=>'8' ,
					'aria-required'=>'true'
				);
				echo form_textarea($data_form);
				?>
			</p>									
			<p>Captcha code:<br/><?=$captcha?><br/></p>
			<?php 
				$data_form=array(
					'name'=>'captcha'
				);
				echo form_input($data_form);
			?>
			<p class="form-submit">
				<?php echo form_submit('', 'Add Comment', 'id=submit'); ?>
			</p>
			
			<?php echo form_close(); ?>	
		</div>
		<!-- ENDS Respond -->
 </div>
<!-- ENDS posts list -->	
<?php } ?>