<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-header">
  <h1>Election Results</h1>
</div>
<div class="row">
  <div class="col-md-6">
    <form class="form-horizontal" role="form" id="election_results" method="post">
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <div class="form-group">
        <label for="election_name" class="col-sm-4 control-label">Voting Results</label>
        <div class="col-sm-8">
          <select class="form-control" id="voting" name="voting">
            <?php
            foreach($election as $val)
            {
                echo '<option value="'.$val['election_id'].'">'.$val['election_name'].'</option>';
            }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="election_name" class="col-sm-4 control-label">Voters List</label>
        <div class="col-sm-8">
          <select class="form-control" id="voter" name="voter">
            <?php
            foreach($election as $val)
            {
                echo '<option value="'.$val['election_id'].'">'.$val['election_name'].'</option>';
            }
            ?>
          </select>
        </div>
      </div>
    </form>
    <div id="displayed"> </div>
  </div>
  <div class="col-md-6"></div>
</div>