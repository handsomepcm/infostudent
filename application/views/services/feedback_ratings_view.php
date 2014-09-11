	<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<table class="table">
		<tr><td colspan="2"><h3>Lecturer</h3></td></tr>
		<?php
			$sum=0;
			$ctr=0;
			foreach ($result as $value) {
				$name=$value->index_name;
				if($value->personnel=="lecturer"){
					$question=$value->question;
					echo "<tr><td>".$question."</td><td>";
					$this->db->select_avg($name);
					$query = $this->db->get('feedback_record');
					if ($query->num_rows() > 0) {
						foreach ($query->result() as $value1) {
							echo round($value1->$name,2)."<br>";
							$sum=$sum+$value1->$name;
							$ctr++;
						}
					}
					echo "</td></tr>";
				}				
			}
		?>
		<tr><td colspan="2"><h3>Classroom</h3></td></tr>
		<?php
			foreach ($result as $value) {
				$name=$value->index_name;
				if($value->personnel=="classroom"){
					$question=$value->question;
					echo "<tr><td>".$question."</td><td>";
					$this->db->select_avg($name);
					$query = $this->db->get('feedback_record');
					if ($query->num_rows() > 0) {
						foreach ($query->result() as $value1) {
							echo round($value1->$name,2)."<br>";
							$sum=$sum+$value1->$name;
							$ctr++;
						}
					}
					echo "</td></tr>";
				}
			}
		?>
		<tr><td colspan="2"><h3>Course Consultant</h3></td></tr>
		<?php
			foreach ($result as $value) {
				$name=$value->index_name;
				if($value->personnel=="courseconsult"){
					$question=$value->question;
					echo "<tr><td>".$question."</td><td>";
					$this->db->select_avg($name);
					$query = $this->db->get('feedback_record');
					if ($query->num_rows() > 0) {
						foreach ($query->result() as $value1) {
							echo round($value1->$name,2)."<br>";
							$sum=$sum+$value1->$name;
							$ctr++;
						}
					}
					echo "</td></tr>";
				}
			}
		?>
		<tr><td colspan="2"><h3>Others</h3></td></tr>
		<?php
			foreach ($result as $value) {
				$name=$value->index_name;
				if($value->personnel=="others"){
					$question=$value->question;
					echo "<tr><td>".$question."</td><td>";
					$this->db->select_avg($name);
					$query = $this->db->get('feedback_record');
					if ($query->num_rows() > 0) {
						foreach ($query->result() as $value1) {
							echo round($value1->$name,2)."<br>";
							$sum=$sum+$value1->$name;
							$ctr++;
						}
					}
					echo "</td></tr>";
				}
			}
		?>
	</table>
	<h3>Overall Rating: <?php $ave=$sum/$ctr; echo round($ave,2);?></h4>