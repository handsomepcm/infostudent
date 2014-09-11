<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-header">
  <h1>Manage Election <small><span class="glyphicon glyphicon-arrow-right"></span> Main</small></h1>
</div>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="election">
  <thead>
    <tr>
      <th>ID</th>
      <th>Election Name</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td colspan="3" class="dataTables_empty">Loading data from server</td>
    </tr>
  </tbody>
  </table>
  <br><br>
  <a href=<?php echo base_url("comelec/add_election")?> class="btn btn-primary">Add Election</a>

  
