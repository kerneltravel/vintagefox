<div class="page-content">			
<h2 class="heading">Register User</h2>
<?php if($errors!=''){ ?>
<?=$errors ?>
<?php } ?>
<?php echo form_open(base_url().'users/register',array('id'=>'contactForm'))?>
	<p><?=form_label('Username: ', 'username'); ?>
	<?php 
		$data_form = array(
			'name' => 'username',
			'size' => 50,
			'id' => 'username',
			'value' => set_value('username')
		);
		echo form_input($data_form);
	?>
	</p>
	<p><?=form_label('Email: ', 'email'); ?> 
	<?php 
		$data_form = array(
			'name' => 'email',
			'id' => 'email',
			'size' => 50,
			'value' => set_value('email')
		);
		echo form_input($data_form);
	?>
	</p>
	<p><?=form_label('Password: ', 'password'); ?> 
	<?php 
		$data_form = array(
			'name' => 'password',
			'id' => 'password',
			'size' => 50,
		);
		echo form_password($data_form);
	?>
	</p>
	<p><?=form_label('Password Confirmed: ', 'password2'); ?>
	<?php 
		$data_form = array(
			'name' => 'password2',
			'id' => 'password2',
			'size' => 50,
		);
		echo form_password($data_form);
	?>
	</p>
	<p>User type: 
	<?php 
		$options = array(
			''=> '--',
			'admin'=> 'Admin',
			'author' => 'Author',
			'user'=>'User'
		);
		$attr='id="user_type"';
		echo form_dropdown('user_type', $options,set_value('user_type','admin'),$attr);
	?>		
	</p>
	<p><?php echo form_submit('','Register'); ?></p>
<?php echo form_close(); ?>
<div class="c-1"></div>
<div class="c-2"></div>
<div class="c-3"></div>
<div class="c-4"></div>
</div>
