<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-header">
  <h1>Manage Grades <small><span class="glyphicon glyphicon-arrow-right"></span> Main</small></h1>
</div>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="grades">
  <thead>
    <tr>
    <th>Student Number</th>
    <th>Student Last Name</th>
    <th>Student First Name</th>
    <th>Course Name</th>
    <th>Grades</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td colspan="5" class="dataTables_empty">No data from server</td>
    </tr>
  </tbody>
  </table>
  <br><br>
  <a href=<?php echo base_url("registrar/csv_grades/1")?> class="btn btn-primary">Upload CSV file with Grades</a>
  
