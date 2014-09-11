	<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<div class="page-header">
	  <h1>Feedback Preview</h1>
	</div>
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
	<a href=<?php echo base_url("services/manage_instrument")?> class="btn btn-info">Back</a></td></tr>