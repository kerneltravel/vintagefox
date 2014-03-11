			<!-- sidebar -->
        	<aside id="sidebar">
        		
        		<ul>
	        		<li class="block">
		        		<h4 class="heading">User Info</h4>
						<?php if($this->session->userdata('userID')){ ?>
						<p class="infobox-info">You are logged in! <br/> User type: <?=$this->session->userdata('user_type'); ?></p>
						<p style="text-align: center;">
							<a href="<?=base_url()?>posts/new_post">New Post</a> | 
							<a href="<?=base_url()?>users/logout">Logout</a>
						</p>
						<?php }else {?>
						<p style="text-align: center;">
							<a href="<?=base_url()?>users/register">Register</a> | 
							<a href="<?=base_url()?>users/login">Login</a>
						</p>
						<?php } ?>
	        		</li>
	        		
	        		<li class="block">
		        		<h4 class="heading">Inspirational</h4>
						Trust that still, small voice that says This might work and I will try it. Do noble things, do not dream them all day long. When we seek to discover the best in others, we somehow bring out the best in ourselves. The only way to discover the limits of the possible is to go beyond them, to the impossible. It is better to die for something than to live for nothing. There are times when a man should be content with what he has, but never with what he is.
	        		</li>

        		</ul>
        		
        	</aside>
			<!-- ENDS sidebar -->