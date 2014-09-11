  <div class="masthead">
    <center><img src="<?php echo base_url("public/images/banner.png")?>"></center>
  </div>
  <div class="blog-masthead">
    <div class="container">
      <nav class="blog-nav">
        <a class="blog-nav-item <?php if(isset($home)){echo $home;} ?>" href="<?php echo base_url();?>student"><span class="glyphicon glyphicon-home"></span> Home</a>
        <a class="blog-nav-item <?php if(isset($my_account)){echo $my_account;} ?>" href="<?php echo base_url();?>student/my_account"><span class="glyphicon glyphicon-th-large"></span> My Account</a>
        <a class="blog-nav-item <?php if(isset($sc_voting)){echo $sc_voting;} ?>" href="<?php echo base_url();?>student/sc_voting"><span class="glyphicon glyphicon-ok"></span> SC Voting</a>
        <a class="blog-nav-item <?php if(isset($feedback)){echo $feedback;} ?>" href="<?php echo base_url();?>student/feedback"><span class="glyphicon glyphicon-list"></span> Feedback</a>
        <a class="blog-nav-item <?php if(isset($settings)){echo $settings;} ?>" href="<?php echo base_url();?>student/settings"><span class="glyphicon glyphicon-user"></span> <?php echo $username?></a>
        <a class="blog-nav-item" href="<?php echo base_url();?>users/logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a>
      </nav>
    </div>
  </div>
  <div class="container">
    <br>
