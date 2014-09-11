<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<div class="container">
	
		<!--div class="masthead">
			<h3 class="text-muted">Informatics Manila Student Information System</h3>
		</div-->
	<center><img src="<?php echo base_url("public/images/login_banner.png")?>"></center>
	<form class="form-signin" role="form" action="<?php echo base_url();?>users/check" method="post">
		<?php echo validation_errors(); ?>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
		<h2 class="form-signin-heading">Please Login</h2>
		<input type="text" class="form-control" id="username" name="username" placeholder="Username" required autofocus>
		<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	</form>
	<center><a href="<?php echo base_url();?>users/forgot_password">Forgot Password?</a></center>