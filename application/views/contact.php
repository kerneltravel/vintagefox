<div class="page-content">
<h2 class="heading">Contact Form</h2>
<!-- form -->
<form id="contactForm" action="#" method="post">
	<fieldset>
										
		<p>
			<label for="name" >Name</label>
			<input name="name"  id="name" type="text" class="form-poshytip" title="Enter your full name" />
		</p>
		
		<p>
			<label for="email" >Email</label>
			<input name="email"  id="email" type="text" class="form-poshytip" title="Enter your email address" />
		</p>
		
		<p>
			<label for="web">Website</label>
			<input name="web"  id="web" type="text" class="form-poshytip" title="Enter your website" />
		</p>
		
		<p>
			<label for="comments">Message</label>
			<textarea  name="comments"  id="comments" rows="5" cols="20" class="form-poshytip" title="Enter your comments"></textarea>
		</p>
		
		<!-- send mail configuration -->
		<input type="hidden" value="your@email.com" name="to" id="to" />
		<input type="hidden" value="ENter the subject here" name="subject" id="subject" />
		<input type="hidden" value="send-mail.php" name="sendMailUrl" id="sendMailUrl" />
		<!-- ENDS send mail configuration -->
		
		<p><input type="button" value="Send" name="submit" id="submit" /></p>
	</fieldset>
	
</form>
<!-- ENDS form -->	
<div class="c-1"></div>
<div class="c-2"></div>
<div class="c-3"></div>
<div class="c-4"></div>
</div>