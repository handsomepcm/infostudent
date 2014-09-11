<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-header">
  <h1>Submit Candidacy</h1>
</div>
<form class="form-horizontal" role="form" id="input_candidacy" method="post">
	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
	<div class="form-group">
        <label for="reason" class="col-sm-4 control-label">Reason</label>
        <div class="col-sm-8">
          <textarea class="form-control" id="reason" name="reason" rows='4' cols='100'></textarea>
        </div>
      </div>
	<div class="form-group">
        <label for="privilege" class="col-sm-4 control-label">Party</label>
        <div class="col-sm-8">
          <div class="radio">
            <label>
              <input type="radio" name="party" id="party1" value="globe">
              Globe
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="party" id="party2" value="smart">
              Smart
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="party" id="party3" value="independent">
              Independent
            </label>
          </div>
        </div>
    </div>
	<div class="form-group">
        <label for="privilege" class="col-sm-4 control-label">Position</label>
        <div class="col-sm-8">
          <div class="radio">
            <label>
              <input type="radio" name="position" id="position1" value="president">
              President
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="position" id="position2" value="vpexternal">
              Vice President External 
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="position" id="position3" value="vpinternal">
              Vice President Internal 
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="position" id="position4" value="secretary">
              AcadHead
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="position" id="position5" value="treasurer">
              Treasurer
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="position" id="position6" value="auditor">
              Auditor
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="position" id="position6" value="pro">
              PRO
            </label>
          </div>
        </div>
     </div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-4">
			<button type="submit" class="btn btn-primary" id="btnChangeEmail">Submit</button>
		</div>
	</div>
</form>