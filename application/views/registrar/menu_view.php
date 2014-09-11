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
        <li <?php if(isset($manage_enrollment)){echo $manage_enrollment;} ?>>
          <a href="<?php echo base_url();?>registrar/manage_enrollment">Manage Enrollment</a>
          <ul class="nav nav-sidebar-submenu">
            <li <?php if(isset($csv_enrollment)){echo $csv_enrollment;} ?>>
            <a href="<?php echo base_url();?>registrar/csv_enrollment/1">Csv Enrollment</a></li>
            <!--li <?php if(isset($csv_grades)){echo $csv_grades;} ?>>
            <a href="<?php echo base_url();?>registrar/csv_grades/1">Csv Grades</a></li-->
          </ul>
        </li>
        <li <?php if(isset($manage_student)){echo $manage_student;} ?>>
          <a href="<?php echo base_url();?>registrar/manage_student">Manage Student</a>
          <ul class="nav nav-sidebar-submenu">
            <!--li <?php if(isset($add_student)){echo $add_student;} ?>>
            <a href="<?php echo base_url();?>registrar/add_student/">Add Student</a></li-->
            <li <?php if(isset($csv_student)){echo $csv_student;} ?>>
            <a href="<?php echo base_url();?>registrar/csv_student/1">Csv Student</a></li>
          </ul>
        </li>
        <li <?php if(isset($manage_grades)){echo $manage_grades;} ?>>
          <a href="<?php echo base_url();?>registrar/manage_grades">Manage Grades</a>
          <ul class="nav nav-sidebar-submenu">
            <!--li <?php if(isset($add_transferee)){echo $add_transferee;} ?>>
            <a href="<?php echo base_url();?>registrar/add_transferee/">Add Transferee</a></li-->
            <li <?php if(isset($csv_grades)){echo $csv_grades;} ?>>
            <a href="<?php echo base_url();?>registrar/csv_grades/1">Csv Grades</a></li>
            <li <?php if(isset($csv_credited)){echo $csv_credited;} ?>>
            <a href="<?php echo base_url();?>registrar/csv_credited/1">Csv Credited Subjects</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3>Registrar</h3>