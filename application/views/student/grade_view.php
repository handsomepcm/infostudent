<label>Choose Grading Year and Term</label>
	<?php echo form_open("student/my_account");?>
		<label>Year:</label>
		<select name='year'>
			<option value='2013'>2013-2014</option>
			<option value='2014'>2014-2015</option>
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
		if ($result!=NULL) { ?>
			<div id="toPrint">
			<table class='table'>
				<tr><th>Course</th><th>Section</th><th>Grade</th></tr>
				<?php foreach ($result as $row) { ?>
					<tr><td><?php echo $row->course_name?></td><td><?php echo $row->section?></td>
						<td>
							<?php 
								if ((int)$row->grade<=100 && (int)$row->grade>=97){
									echo "1.00";
								}
								elseif ((int)$row->grade<=96 && (int)$row->grade>=94){
									echo "1.25";
								}
								elseif ((int)$row->grade<=93 && (int)$row->grade>=91){
									echo "1.50";
								}
								elseif ((int)$row->grade<=90 && (int)$row->grade>=88){
									echo "1.75";
								}
								elseif ((int)$row->grade<=87 && (int)$row->grade>=85){
									echo "2.00";
								}
								elseif ((int)$row->grade<=84 && (int)$row->grade>=83){
									echo "2.25";
								}
								elseif ((int)$row->grade<=82 && (int)$row->grade>=80){
									echo "2.50";
								}
								elseif ((int)$row->grade<=79 && (int)$row->grade>=77){
									echo "2.75";
								}
								elseif ((int)$row->grade<=76 && (int)$row->grade>=75){
									echo "3.00";
								}
								elseif ((int)$row->grade<=74 && $row->grade!=""){
									echo "5.00";
								}
								else{
									echo $row->grade;
								}
							?>
						</td></tr>
				<?php } ?> 
			</table>
			</div>
			<!--input type="button" value="Print" id="PrintinPopup" /-->
	<?php } if($none=="no-grade") {echo "No Grades on year and term selected";}?>	