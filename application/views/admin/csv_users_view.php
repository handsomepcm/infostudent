<div class="page-header">
  <h1>Manage Users <small><span class="glyphicon glyphicon-arrow-right"></span> CSV</small></h1>
</div>
<div class="row">
  <div class="col-md-6">
    <form class="form-horizontal" role="form" id="add_csv" method="post" accept-charset="utf-8" enctype="multipart/form-data" action="<?php echo base_url()?>admin/add_csv_users" >
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <a href="<?php echo base_url()?>admin/csv_download" class="btn btn-info">Download CSV Format</a><br><br>
      <?php
        if (isset($ierror)) 
        {
          echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'.$ierror.'</div>';
        }
      ?>
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <div class="form-group">
        <label for="csv-upload" class="col-sm-4 control-label">CSV FILE to UPLOAD</label>
        <div class="col-sm-8">
          <input type="file" class="form-control" id="csv-upload" name="csv-upload" placeholder="File" autofocus>
        </div>
      </div>
            <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
          <input type="submit" class="btn btn-primary" id="btnAddUser" value"Upload CSV">
          <a href=<?php echo base_url("admin/manage_users")?> class="btn btn-default">Cancel</a>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-6"></div>
</div>