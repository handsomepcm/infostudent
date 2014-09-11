<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
	if (isset($announce)) 
	{
		foreach($announce as $row)
		{
?>
<hr>		
<div class="blog-post">
	<h2 class="blog-post-title">Announcement</h2>
	<h2><?php echo"$row->title";?></h2>
	<p class="blog-post-meta">
	<?php 
		if ($row->date_updated != NULL) 
		{
			echo"$row->date_updated";
		}
		else
		{
			echo"$row->date_posted";	
		}
	?>
	</p>
	<?php
		if ($row->image != "0.jpg") 
		{
	?>
	<img src="<?php echo base_url("assets/uploads/images/$row->image");?>" class="img-thumbnail" height="200px" width="250px">
	<?php		
		}
	?>
	
	<?php echo"$row->content";?>
</div><!-- /.blog-post -->
<?php 
		}
	}
?>
<?php
	foreach($news as $row)
	{
?>
<hr>		
<div class="blog-post">
	<h2 class="blog-post-title">News</h2>
	<h2><?php echo"$row->title";?></h2>
	<p class="blog-post-meta">
	<?php 
		if ($row->date_updated != NULL) 
		{
			echo"$row->date_updated";
		}
		else
		{
			echo"$row->date_posted";	
		}
	?>
	</p>
	<?php
		if ($row->image != "0.jpg") 
		{
	?>
	<img src="<?php echo base_url("assets/uploads/images/$row->image");?>" class="img-thumbnail">
	<?php		
		}
	?>
	
	<?php echo"$row->content";?>
</div><!-- /.blog-post -->
<?php 
	}
?>
<?php
	foreach($event as $row)
	{
?>
<hr>		
<div class="blog-post">
	<h2 class="blog-post-title">Event</h2>
	<h2><?php echo"$row->title";?></h2>
	<p class="blog-post-meta">
	<?php 
		if ($row->date_updated != NULL) 
		{
			echo"$row->date_updated";
		}
		else
		{
			echo"$row->date_posted";	
		}
	?>
	</p>
	<?php
		if ($row->image != "0.jpg") 
		{
	?>
	<img src="<?php echo base_url("assets/uploads/images/$row->image");?>" class="img-thumbnail">
	<?php		
		}
	?>
	
	<?php echo"$row->content";?>
</div><!-- /.blog-post -->
<?php 
	}
?>
