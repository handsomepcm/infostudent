<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-header">
  <h1>Manage Logs <small><span class="glyphicon glyphicon-arrow-right"></span> Main</small></h1>
</div>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="users">
  <thead>
    <tr>
      <th width>ID</th>
      <th width>User ID</th>
      <th width>Action</th>
      <th width>Time</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td colspan="4" class="dataTables_empty">Loading data from server</td>
    </tr>
  </tbody>
  </table>
  <br><br>
	<a href="<?php echo base_url("admin/export_clear_log")?>" class="btn btn-info" onclick="return clear_export();">Export to Clear Log</a>
  
  
