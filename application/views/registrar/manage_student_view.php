<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-header">
  <h1>Manage Student <small><span class="glyphicon glyphicon-arrow-right"></span> Main</small></h1>
</div>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="student">
  <thead>
    <tr>
    <th>Student Number</th>
    <th>Student Last Name</th>
    <th>Student First Name</th>
    <th>Curriculum</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td colspan="4" class="dataTables_empty">No data from server</td>
    </tr>
  </tbody>
  </table>
  <br><br>
	<a href=<?php echo base_url("registrar/add_student")?> class="btn btn-primary">Add Student</a>
  
