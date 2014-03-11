<div class="page-content">			
<h2 class="heading">Login</h2>
<?php 
	if($error==1){?>
	<p class="infobox-error">Your user/pass did not match.</p>
<?php } ?>
<form id="contactForm" action="<?=base_url()?>users/login" method="post">
	<p><label>Username: </label><input type="text" name="username" class="form-poshytip" title="Enter your username" ></p>
	<p><label>Password: </label><input type="password" name="password" class="form-poshytip" title="Enter your password" ></p>
	<p>User type: 
		<select name="user_type" id="usertype">
			<option value="" selected="selected">--</option>
			<option value="admin">Admin</option>
			<option value="author">Author</option>
			<option value="user">User</option>
		</select>
	</p>
	<p><input type="submit" value="login"></p>
</form>
<div class="c-1"></div>
<div class="c-2"></div>
<div class="c-3"></div>
<div class="c-4"></div>
</div>