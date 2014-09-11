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
        <li <?php if(isset($manage_instrument)){echo $manage_instrument;} ?>>
          <a href="<?php echo base_url();?>services/manage_instrument">Manage Instrument</a>
          <ul class="nav nav-sidebar-submenu">
            <li <?php if(isset($manage_instrument_lecturer)){echo $manage_instrument_lecturer;} ?>>
            <a href="<?php echo base_url();?>services/manage_instrument_lecturer">Lecturer</a></li>
            <li <?php if(isset($manage_instrument_classroom)){echo $manage_instrument_classroom;} ?>>
            <a href="<?php echo base_url();?>services/manage_instrument_classroom">Classroom</a></li>
            <li <?php if(isset($manage_instrument_course)){echo $manage_instrument_course;} ?>>
            <a href="<?php echo base_url();?>services/manage_instrument_course">Course Consultation</a></li>
            <li <?php if(isset($manage_instrument_others)){echo $manage_instrument_others;} ?>>
            <a href="<?php echo base_url();?>services/manage_instrument_others">Others</a></li>
            <li <?php if(isset($input_instrument)){echo $input_instrument;} ?>>
            <a href="<?php echo base_url();?>services/input_instrument">Add Instrument</a></li>
          </ul>
        </li>
        <li <?php if(isset($feedback_preview)){echo $feedback_preview;} ?>>
        <a href="<?php echo base_url();?>services/feedback_preview">Feedback Preview</a></li>
        <li <?php if(isset($feedback_activation)){echo $feedback_activation;} ?>>
        <a href="<?php echo base_url();?>services/feedback_activation">Feedback Activation</a></li>
        <li <?php if(isset($feedback_results)){echo $feedback_results;} ?>>
          <a>Feedback Results</a>
          <ul class="nav nav-sidebar-submenu">
            <li <?php if(isset($feedback_ratings)){echo $feedback_ratings;} ?>>
            <a href="<?php echo base_url();?>services/feedback_ratings">Ratings</a></li>
            <li <?php if(isset($feedback_text)){echo $feedback_text;} ?>>
            <a href="<?php echo base_url();?>services/feedback_text">Text</a></li>
            <li <?php if(isset($feedback_student_list)){echo $feedback_student_list;} ?>>
            <a href="<?php echo base_url();?>services/feedback_student_list">Student List</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3>Services</h3>