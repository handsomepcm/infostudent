<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-header">
  <h1>Manage Users <small><span class="glyphicon glyphicon-arrow-right"></span> Main</small></h1>
</div>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="users">
  <thead>
    <tr>
      <th>ID</th>
      <th width="15%">User ID</th>
      <th width="15%">Last Name</th>
      <th width="15%">First Name</th>
      <th width="15%">Privilege</th>
      <th width="15%">Email</th>
      <th width="10%">Status</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td colspan="7" class="dataTables_empty">Loading data from server</td>
    </tr>
  </tbody>
  </table>
  <br><br>
	<!--a href=<?php echo base_url("admin/add_csv_users/1")?> class="btn btn-primary">Upload CSV</a-->
  <a href=<?php echo base_url("admin/add_user")?> class="btn btn-primary">Add User</a>

  
