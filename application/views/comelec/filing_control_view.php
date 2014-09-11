<div class="page-header">
  <h1>Control Panel <small><span class="glyphicon glyphicon-arrow-right"></span> Filing</small></h1>
</div>
<h3>Guide:</h3>
  <p>Click on the input box to input time.</p>
  <p>Once the start and end time of the Filing is set, the students can now file their candidacy.</p>
  <p>It is not advisible to edit time while the Filing has started.</p>
  <p>If you want to end the Filing abruptly, click Force End.</p>
  <p>If Filing has ended this page cannot be edited.</p>
<div class="row">
  <div class="col-md-6">
    <form class="form-horizontal" role="form" id="filing_control" method="post">
      <fieldset <?php echo $fieldset?>>
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <div class="form-group">
        <label for="filing_status" class="col-sm-4 control-label">Status</label>
        <div class="col-sm-8">
           <input class="form-control" value="<?php echo $filing_status?>" readonly>
        </div>
      </div>
      <div class="form-group">
        <label for="filing_start" class="col-sm-4 control-label">Start</label>
        <div class="col-sm-8">
          <input class="form-control" id="filing_start" name="filing_start" placeholder="Filing Start" value="<?php echo $filing_start?>">
        </div>
      </div>
      <div class="form-group">
        <label for="filing_end" class="col-sm-4 control-label">End</label>
        <div class="col-sm-8">
          <input class="form-control" id="filing_end" name="filing_end" placeholder="Filing End" value="<?php echo $filing_end?>">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
          <button type="submit" class="btn btn-primary" id="btnSaveFiling">Save</button>
          <a href=<?php echo base_url("comelec/manage_election")?> class="btn btn-default">Cancel</a>
          <button type="submit" class="btn btn-danger" id="btnForceEndFiling">Force End</button>
        </div>
      </div>
      </fieldset>
    </form>
  </div>
  <div class="col-md-6"></div>
</div>