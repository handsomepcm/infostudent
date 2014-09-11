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
					$this->db->select($name);
					$this->db->select('username');
					$query = $this->db->get('feedback_record');
					if ($query->num_rows() > 0) {
						//print_r($query->result());
						foreach ($query->result() as $value1) {
							echo $value1->username."-".$value1->$name."<br>";
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
					$this->db->select($name);
					$this->db->select('username');
					$query = $this->db->get('feedback_record');
					if ($query->num_rows() > 0) {
						//print_r($query->result());
						foreach ($query->result() as $value1) {
							echo $value1->username."-".$value1->$name."<br>";
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
					$this->db->select($name);
					$this->db->select('username');
					$query = $this->db->get('feedback_record');
					if ($query->num_rows() > 0) {
						//print_r($query->result());
						foreach ($query->result() as $value1) {
							echo $value1->username."-".$value1->$name."<br>";
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
					$this->db->select($name);
					$this->db->select('username');
					$query = $this->db->get('feedback_record');
					if ($query->num_rows() > 0) {
						//print_r($query->result());
						foreach ($query->result() as $value1) {
							echo $value1->username."-".$value1->$name."<br>";
						}
					}
					echo "</td></tr>";
				}
			}
		?>
	</table>