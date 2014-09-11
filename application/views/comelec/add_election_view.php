<div class="page-header">
  <h1>Manage Election <small><span class="glyphicon glyphicon-arrow-right"></span> Add</small></h1>
</div>
<h3>Warning:</h3>
<p>Adding an Election will cause other elections to be deactivated.</p>
<div class="row">
  <div class="col-md-6">
    <form class="form-horizontal" role="form" id="add_election" method="post">
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <div class="form-group">
        <label for="curi_name" class="col-sm-4 control-label">Election Name</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="election_name" name="election_name" placeholder="Name" required autofocus>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
          <button type="submit" class="btn btn-primary" id="btnAddUser">Save</button>
          <a href=<?php echo base_url("comelec/manage_election")?> class="btn btn-default">Cancel</a>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-6"></div>
</div>