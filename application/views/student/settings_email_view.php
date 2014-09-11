<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-header">
  <h1>Settings <small><span class="glyphicon glyphicon-arrow-right"></span> Change Email</small></h1>
</div>
<form class="form-horizontal" role="form" id="change_email" method="post">
	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
	<input type='hidden' name='id' value="<?php echo $id; ?>">
	<div class="form-group">
		<label for="new_email_address" class="col-sm-4 control-label">New Email Address</label>
		<div class="col-sm-4">
			<input type="email" class="form-control" id="new_email_address" name="new_email_address" placeholder="New Email Address" required autofocus>
		</div>
	</div>
	<div class="form-group">
		<label for="confirm_email_addres" class="col-sm-4 control-label">Confirm Email Address</label>
		<div class="col-sm-4">
			<input type="email" class="form-control" id="confirm_email_address" name="confirm_email_address" placeholder="Confirm Email Address" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-4">
			<button type="submit" class="btn btn-primary" id="btnChangeEmail">Change</button>
			<a href=<?php echo base_url("student/settings")?> class="btn btn-default">Cancel</a>
		</div>
	</div>
</form>