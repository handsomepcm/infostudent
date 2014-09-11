<div class="page-header">
  <h1>Manage Course <small><span class="glyphicon glyphicon-arrow-right"></span> Add</small></h1>
</div>
<div class="row">
  <div class="col-md-6">
    <form class="form-horizontal" role="form" id="add_course" method="post">
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <div class="form-group">
        <label for="course_id" class="col-sm-4 control-label">Course ID</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="course_id" name="course_id" placeholder="Course ID" required autofocus>
        </div>
      </div>
      <div class="form-group">
        <label for="course_name" class="col-sm-4 control-label">Course Name</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Course Name" required>
        </div>
      </div>
      <div class="form-group">
        <label for="course_prereq" class="col-sm-4 control-label">Course Prerequisite</label>
        <div class="col-sm-8">
          <select class="form-control" id="course_prereq" name="course_prereq">
            <option value="">Select</option>
            <?php
            foreach($subject_list as $val)
            {
                echo '<option value="'.$val['course_id'].'">'.$val['course_id'].'</option>';
            }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="course_coreq" class="col-sm-4 control-label">Course Corequisite</label>
        <div class="col-sm-8">
          <select class="form-control" id="course_coreq" name="course_coreq">
            <option value="">Select</option>
            <?php
            foreach($subject_list as $val)
            {
                echo '<option value="'.$val['course_id'].'">'.$val['course_id'].'</option>';
            }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="course_unit_lec" class="col-sm-4 control-label">Course Unit Lecture</label>
        <div class="col-sm-8">
          <select class="form-control" id="course_unit_lec" name="course_unit_lec">
            <option value="">Select</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="course_unit_lab" class="col-sm-4 control-label">Course Unit Laboratory</label>
        <div class="col-sm-8">
          <select class="form-control" id="course_unit_lab" name="course_unit_lab">
            <option value="">Select</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
          <button type="submit" class="btn btn-primary" id="btnAddUser">Save</button>
          <a href=<?php echo base_url("acadhead/manage_course")?> class="btn btn-default">Cancel</a>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-6"></div>
</div>