	<table class="table">
		<tr><th>Student</th><th>Voting Date</th></tr>
		<?php
			foreach ($result as $value) {
				$user_id=$value->user_id;
				echo "<tr><td>".$value->last_name.",".$value->first_name."</td><td>";
				$this->db->select('time');
				$this->db->where('user_id', $user_id); 
				$this->db->where('election_id', $id); 
				$query = $this->db->get('vote_log');
				if ($query->num_rows() > 0) {
					foreach ($query->result() as $value1) {
						echo $value1->time;
					}
				}
				else{
					echo "No Vote";
				}
				echo "</td></tr>";				
			}
		?>
	</table>