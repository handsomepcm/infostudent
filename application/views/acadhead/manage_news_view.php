<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-header">
  <h1>Manage News <small><span class="glyphicon glyphicon-arrow-right"></span> Main</small></h1>
</div>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="news">
  <thead>
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Image</th>
      <th>Type</th>
      <th>Date Posted</th>
      <th>Date Updated</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td colspan="5" class="dataTables_empty">Loading data from server</td>
    </tr>
  </tbody>
  </table>
  <br><br>
  <a href=<?php echo base_url("acadhead/input_news")?> class="btn btn-primary">Add News</a>

  
