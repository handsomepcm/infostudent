<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url();?>admin"><span class="glyphicon glyphicon-info-sign"></span> Informatics Manila - Student Information System</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url();?>users/settings"><span class="glyphicon glyphicon-user"></span> <?php echo $username?> - Settings</a></li>
        <li><a href="<?php echo base_url();?>users/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 sidebar">
      <ul class="nav nav-sidebar">
        <!--li <?php if(isset($overview)){echo $overview;} ?>>
        <a href="<?php echo base_url();?>registrar">Overview</a></li-->
        <li <?php if(isset($manage_election)){echo $manage_election;} ?>>
        <a href="<?php echo base_url();?>comelec/manage_election">Manage Election</a>
          <ul class="nav nav-sidebar-submenu">
            <li <?php if(isset($add_election)){echo $add_election;} ?>>
            <a href="<?php echo base_url();?>comelec/add_election">Add Election</a></li>
          </ul>
        </li>
        <li <?php if(isset($manage_candidates)){echo $manage_candidates;} ?>>
        <a href="<?php echo base_url();?>comelec/manage_candidates">Manage Candidates</a></li>
        <li>
        <a href="">Control Panel</a>
          <ul class="nav nav-sidebar-submenu">
            <li <?php if(isset($filing_control)){echo $filing_control;} ?>>
            <a href="<?php echo base_url();?>comelec/filing_control">Filing</a></li>
            <li <?php if(isset($voting_control)){echo $voting_control;} ?>>
            <a href="<?php echo base_url();?>comelec/voting_control">Voting</a></li>
          </ul>
        </li>
        <li <?php if(isset($election_results)){echo $election_results;} ?>>
        <a href="<?php echo base_url();?>comelec/election_results">View Election Results</a></li>
      </ul>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3>Comelec</h3>