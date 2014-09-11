<div class="page-header">
  <h1>Manage Users <small><span class="glyphicon glyphicon-arrow-right"></span> Add</small></h1>
</div>
<div class="row">
  <div class="col-md-6">
    <form class="form-horizontal" role="form" id="add_user" method="post">
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <div class="form-group">
        <label for="user_id" class="col-sm-4 control-label">User ID</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="user_id" name="user_id" placeholder="User ID" required autofocus>
        </div>
      </div>
      <div class="form-group">
        <label for="first_name" class="col-sm-4 control-label">First Name</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required>
        </div>
      </div>
      <div class="form-group">
        <label for="last_name" class="col-sm-4 control-label">Last Name</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required>
        </div>
      </div>
      <div class="form-group">
        <label for="email_address" class="col-sm-4 control-label">Email Address</label>
        <div class="col-sm-8">
          <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Email Address" required>
        </div>
      </div>
      <div class="form-group">
        <label for="privilege" class="col-sm-4 control-label">Privilege</label>
        <div class="col-sm-8">
          <div class="radio">
            <label>
              <input type="radio" name="privilege" id="privilege1" value="administrator">
              Administrator
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="privilege" id="privilege2" value="comelec">
              Comelec
            </label>
          </div>
          <!--div class="radio">
            <label>
              <input type="radio" name="privilege" id="privilege3" value="student">
              Student
            </label>
          </div-->
          <div class="radio">
            <label>
              <input type="radio" name="privilege" id="privilege4" value="acadhead">
              AcadHead
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="privilege" id="privilege5" value="registrar">
              Registrar
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="privilege" id="privilege6" value="services">
              Services
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
          <button type="submit" class="btn btn-primary" id="btnAddUser">Save</button>
          <a href=<?php echo base_url("admin/manage_users")?> class="btn btn-default">Cancel</a>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-6"></div>
</div>