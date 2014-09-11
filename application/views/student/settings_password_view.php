<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-header">
  <h1>Settings <small><span class="glyphicon glyphicon-arrow-right"></span> Change Password</small></h1>
</div>
<form class="form-horizontal" role="form" id="change_password" method="post">
	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
	<input type='hidden' name='id' value="<?php echo $id; ?>">
	<div class="form-group">
		<label for="old_password" class="col-sm-4 control-label">Old Password</label>
		<div class="col-sm-4">
			<input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password" required autofocus>
		</div>
	</div>
	<div class="form-group">
		<label for="new_password" class="col-sm-4 control-label">New Password</label>
		<div class="col-sm-4">
			<input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password" required>
		</div>
	</div>
	<div class="form-group">
		<label for="confirm_new_password" class="col-sm-4 control-label">Confirm New Password</label>
		<div class="col-sm-4">
			<input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" placeholder="Confirm New Password" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-4">
			<button type="submit" class="btn btn-primary" id="btnChangePassword">Change</button>
			<a href=<?php echo base_url("student/settings")?> class="btn btn-default">Cancel</a>
		</div>
	</div>
</form>