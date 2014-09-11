<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-header">
  <h1>Settings <small><span class="glyphicon glyphicon-arrow-right"></span> Profile</small></h1>
</div>
<div class="row">
  	<div class="col-md-6">
	  	<div class="row">
	  		<div class="col-md-4"></div>
		  	<div class="col-md-4"><h4>User ID</h4></div>
		  	<div class="col-md-4"><h5><?php echo $user_id;?></h5></div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
		  	<div class="col-md-4"><h4>Last Name</h4></div>
		  	<div class="col-md-4"><h5><?php echo $last_name;?></h5></div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
		  	<div class="col-md-4"><h4>First Name</h4></div>
		  	<div class="col-md-4"><h5><?php echo $first_name;?></h5></div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
		  	<div class="col-md-4"><h4>Password</h4></div>
		  	<div class="col-md-4"><h5>************* [<a href="<?php echo base_url("student/change_password")?>">change</a>]</h5></div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4"><h4>Email Address</h4></div>
		 	<div class="col-md-4"><h5><?php echo $email_address;?> [<a href="<?php echo base_url("student/change_email_address")?>">change</a>]</h5></div>
		</div>
  	</div>
 	<div class="col-md-6"></div>
</div>