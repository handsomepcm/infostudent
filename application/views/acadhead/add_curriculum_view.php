<div class="page-header">
  <h1>Manage Curriculum <small><span class="glyphicon glyphicon-arrow-right"></span> Add</small></h1>
</div>
<div class="row">
  <div class="col-md-6">
    <form class="form-horizontal" role="form" id="add_curriculum" method="post">
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <div class="form-group">
        <label for="curi_name" class="col-sm-4 control-label">Name</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="curi_name" name="curi_name" placeholder="Name" required>
        </div>
      </div>
      <div class="form-group">
        <label for="description" class="col-sm-4 control-label">Description</label>
        <div class="col-sm-8">
          <textarea class="form-control" id="description" name="description" rows='4' cols='10'></textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="years" class="col-sm-4 control-label">Years</label>
        <div class="col-sm-8">
          <select class="form-control" id="years" name="years" required>
            <option value="">Select Years</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="school_year" class="col-sm-4 control-label">School Year</label>
        <div class="col-sm-8">
          <select class="form-control" id="school_year" name="school_year" required>
            <option value="">Select School Year</option>
            <option value="2014-2015">2014-2015</option>
            <option value="2015-2016">2015-2016</option>
            <option value="2016-2017">2016-2017</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
          <button type="submit" class="btn btn-primary" id="btnAddUser">Save</button>
          <a href=<?php echo base_url("acadhead/manage_curriculum")?> class="btn btn-default">Cancel</a>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-6"></div>
</div>