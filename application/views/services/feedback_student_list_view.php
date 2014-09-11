	<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<table class="table">
		<tr><th>Student</th><th>Date of Evaluation</th></tr>
		<?php
			foreach ($result as $value) {
				$user_id=$value->user_id;
				echo "<tr><td>".$value->last_name.",".$value->first_name."</td><td>";
				$this->db->select('time');
				$this->db->where('user_id', $user_id); 
				$query = $this->db->get('feedback_log');
				if ($query->num_rows() > 0) {
					foreach ($query->result() as $value1) {
						echo $value1->time;
					}
				}
				else{
					echo "No Feedback";
				}
				echo "</td></tr>";				
			}
		?>
	</table>