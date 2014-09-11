	<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<form class="form-horizontal" role="form" id="change_email" method="post" action="<?php echo base_url();?>student/feedback_submit">
	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
	<div class="panel panel-default">
  		<div class="panel-heading">Lecturer</div>
  		<div class="panel-body">
	<?php
		$ctr=0;
		foreach ($result1 as $value) {
			$ctr++;
			if ($value->type=="radio") {
				echo "<label>".$value->question." </label>&nbsp;";

				for ($i=1; $i<=5; $i++) { 
					echo "<label class='radio-inline'><input type='radio' name='$value->index_name' value='$i'>".$i."</label>";
				}
				echo"<br>";
			}
			if ($value->type=="text") {
				echo "<label>".$value->question."</label>  ";
				echo "<input type='text' name='$value->index_name'><br>";
			}
		}
	?>
		</div>
	</div>
	<div class="panel panel-default">
  		<div class="panel-heading">Classroom</div>
  		<div class="panel-body">
	<?php
		$ctr=0;
		//print_r($result2);
		foreach ($result2 as $value) {
			$ctr++;
			if ($value->type=="radio") {
				echo "<label>".$value->question." </label>&nbsp;";

				for ($i=1; $i<=5; $i++) { 
					echo "<label class='radio-inline'><input type='radio' name='$value->index_name' value='$i'>".$i."</label>";
				}
				echo"<br>";
			}
			if ($value->type=="text") {
				echo "<label>".$value->question."</label>  ";
				echo "<input type='text' name='$value->index_name'><br>";
			}
		}
	?>
		</div>
	</div>
	<div class="panel panel-default">
  		<div class="panel-heading">Course Consultant</div>
  		<div class="panel-body">
	<?php
		$ctr=0;
		foreach ($result3 as $value) {
			$ctr++;
			if ($value->type=="radio") {
				echo "<label>".$value->question." </label>&nbsp;";

				for ($i=1; $i<=5; $i++) { 
					echo "<label class='radio-inline'><input type='radio' name='$value->index_name' value='$i'>".$i."</label>";
				}
				echo"<br>";
			}
			if ($value->type=="text") {
				echo "<label>".$value->question."</label>  ";
				echo "<input type='text' name='$value->index_name'><br>";
			}
		}
	?>
		</div>
	</div>
   <div class="panel panel-default">
  		<div class="panel-heading">Others</div>
  		<div class="panel-body">
	<?php
		$ctr=0;
		foreach ($result4 as $value) {
			$ctr++;
			if ($value->type=="radio") {
				echo "<label>".$value->question." </label>&nbsp;";

				for ($i=1; $i<=5; $i++) { 
					echo "<label class='radio-inline'><input type='radio' name='$value->index_name' value='$i'>".$i."</label>";
				}
				echo"<br>";
			}
			if ($value->type=="text") {
				echo "<label>".$value->question."</label>  ";
				echo "<input type='text' name='$value->index_name'><br>";
			}
		}
	?>
		</div>
	</div>
	<br><br>
	Overall Rating: <input type='text' name='totalsum' id='totalsum' disabled=disabled size='3'/>
	<input type='submit' name='submit' value='Submit' id='submit' class="btn btn-info">
	</form>