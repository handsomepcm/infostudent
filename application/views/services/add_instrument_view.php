<div class="page-header">
  <h1>Manage Instrument <small><span class="glyphicon glyphicon-arrow-right"></span> <?php echo $page_title;?></small></h1>
</div>
<fieldset <?php echo $fieldset?>>
<div class="row">
  <div class="col-md-6">
    <form class="form-horizontal" role="form" id="input_instrument" method="post">
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <input type="hidden" name="index_name" value="<?php echo (isset($index_name)) ? $index_name : "" ?>">
      <div class="form-group">
        <label for="type" class="col-sm-4 control-label">Personnel</label>
        <div class="col-sm-8">
          <div class="radio">
            <label>
              <input type="radio" name="personnel" id="lecturer" value="lecturer" <?php echo (isset($personnel)) ? ($personnel=="lecturer") ? "checked" : "" : "" ?>>
              Lecturer
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="personnel" id="classroom" value="classroom" <?php echo (isset($personnel)) ? ($personnel=="classroom") ? "checked" : "" : "" ?>>
              Classroom
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="personnel" id="courseconsult" value="courseconsult" <?php echo (isset($personnel)) ? ($personnel=="courseconsult") ? "checked" : "" : "" ?>>
              Course Consultation
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="personnel" id="others" value="others" <?php echo (isset($personnel)) ? ($personnel=="others") ? "checked" : "" : "" ?>>
              Others
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="question" class="col-sm-4 control-label">Question</label>
        <div class="col-sm-8">
          <textarea class="form-control" id="question" name="question" rows='4' cols='100'><?php echo (isset($question)) ? $question : "" ?></textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="type" class="col-sm-4 control-label">Type</label>
        <div class="col-sm-8">
          <div class="radio">
            <label>
              <input type="radio" name="type" id="radio" value="radio" <?php echo (isset($type)) ? ($type=="radio") ? "checked" : "" : "" ?>>
              Rating
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="type" id="text" value="text" <?php echo (isset($type)) ? ($type=="text") ? "checked" : "" : "" ?>>
              Text
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
          <button type="submit" class="btn btn-primary" id="btnAddInstrument">Save</button>
          <a href=<?php echo base_url("services/manage_instrument")?> class="btn btn-default">Cancel</a>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-6"></div>
  </fieldset>
</div>