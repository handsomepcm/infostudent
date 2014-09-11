<div class="page-header">
  <h1>Feedback Activation</h1>
</div>
<h3>Guide:</h3>
  <p>Click on the input box to input time.</p>
  <p>Once the start and end time of the feedback is set, the students can now answer the feedback.</p>
  <p>It is not advisible to edit time while the feedback has started.</p>
  <p>If you want to end the feedback abruptly, click Force End.</p>
<div class="row">
  <div class="col-md-6">
    <form class="form-horizontal" role="form" id="feedback_control" method="post">
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <div class="form-group">
        <label for="filing_status" class="col-sm-4 control-label">Status</label>
        <div class="col-sm-8">
           <input class="form-control" value="<?php echo $feedback_status?>" readonly>
        </div>
      </div>
      <div class="form-group">
        <label for="feedback_start" class="col-sm-4 control-label">Start</label>
        <div class="col-sm-8">
          <input class="form-control" id="feedback_start" name="feedback_start" placeholder="Filing Start" value="<?php echo $feedback_start?>">
        </div>
      </div>
      <div class="form-group">
        <label for="feedback_end" class="col-sm-4 control-label">End</label>
        <div class="col-sm-8">
          <input class="form-control" id="feedback_end" name="feedback_end" placeholder="Filing End" value="<?php echo $feedback_end?>">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
          <button type="submit" class="btn btn-primary" id="btnSaveFeedback">Save</button>
          <a href=<?php echo base_url("services/manage_instrument")?> class="btn btn-default">Cancel</a>
          <button type="submit" class="btn btn-danger" id="btnForceEndFeedback">Force End</button>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-6"></div>
</div>