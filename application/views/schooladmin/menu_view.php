<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url();?>admin"><span class="glyphicon glyphicon-info-sign"></span> Informatics Manila - Student Information System</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url();?>users/settings"><span class="glyphicon glyphicon-user"></span> <?php echo $username?> - Settings</a></li>
        <li><a href="<?php echo base_url();?>users/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 sidebar">
      <ul class="nav nav-sidebar">
        <!--li <?php if(isset($overview)){echo $overview;} ?>>
        <a href="<?php echo base_url();?>registrar">Overview</a></li-->
        <li <?php if(isset($feedback_results)){echo $feedback_results;} ?>>
          <a>Feedback Results</a>
          <ul class="nav nav-sidebar-submenu">
            <li <?php if(isset($feedback_ratings)){echo $feedback_ratings;} ?>>
            <a href="<?php echo base_url();?>schooladmin/feedback_ratings">Ratings</a></li>
            <li <?php if(isset($feedback_text)){echo $feedback_text;} ?>>
            <a href="<?php echo base_url();?>schooladmin/feedback_text">Text</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3>School Administrator</h3>