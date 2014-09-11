<label>Choose Schedule Year and Term</label>
	<?php echo form_open("student/my_account_schedule");?>
		<label>Year:</label>
		<select name='year'>
			<option value='2012'>2012-2013</option>
			<option value='2013'>2013-2014</option>
			<option value='2014'>2014-2015</option>
			<option value='2015'>2015-2016</option>
		</select>
		<label>Term:</label>
		<select name='term'>
			<option value='1'>01</option>
			<option value='2'>02</option>
			<option value='3'>03</option>
			<option value='4'>04</option>
		</select>
		<input type="submit" name="submit" value="Submit">
	<?php echo form_close(); ?>
	<?php 
		if ($result[0]!=NULL) { ?>
			<div id="toPrint">
			<table class="table">
				<tr><th>Course</th><th>Section</th><th>Days</th><th>Time</th><th>Room</th><th>Lecturer</th></tr>
				<?php 
				for ($i=0; $i < 10; $i++) {
					if ($result[$i]==true) {
						foreach ($result[$i] as $row) {
						echo "<tr><td>$row->course_name</td><td>$row->section</td><td>$row->days</td>
						<td>$row->time</td><td>$row->room</td>
						<td>$row->lecturer</td></tr>";
						}
					}
					else {
						break;
					}
				}
				?>
			</table>
			</div>
			<!--input type="button" value="Print" id="PrintinPopup" /-->

	<?php } if($none=="no-sched") {echo "No Schedule on year and term selected";}?>	