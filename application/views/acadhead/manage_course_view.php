<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-header">
  <h1>Manage Course <small><span class="glyphicon glyphicon-arrow-right"></span> Main</small></h1>
</div>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="course">
  <thead>
    <tr>
      <th>Course ID</th>
      <th>Course Name</th>
      <th>Course Pre-requisite</th>
      <th>Course Co-requisite</th>
      <th>Course Unit Lecture</th>
      <th>Course Unit Laboratory</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td colspan="6" class="dataTables_empty">Loading data from server</td>
    </tr>
  </tbody>
  </table>
  <br><br>
  <a href=<?php echo base_url("acadhead/add_course")?> class="btn btn-primary">Add Course</a>

  
