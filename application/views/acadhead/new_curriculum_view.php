<h3><?php echo $course.' - '.$sy.' ('.$years.'years)';?></h3>
<table class="table table-condensed">
	<?php 
	for ($i=1; $i <= $years ; $i++) 
	{ 
		for ($j=1; $j <= 3; $j++) 
		{ 
			echo "<tr><td>Year ".$i." Term ".$j."</td></tr>";
			if ($curriculum_data==NULL) 
			{
				continue;
			}
			echo"<tr><td>ID</td><td>Name</td><td>Pre-requisite</td><td>Co-requisite</td><td>Lecture Units</td><td>Lab Units</td></tr>";
			foreach ($curriculum_data as $row) 
			{
				if ($row->year==$i)
				{
					if ($row->term==$j) 
					{
						echo "<tr><td>".$row->course_id."</td><td>".$row->course_name."</td>";
						echo "<td>".$row->pre_req."</td><td>".$row->co_req."</td>";
						echo "<td>".$row->lec_unit."</td><td>".$row->lab_unit."</td></tr>";
					}
				}
			} 
		}
	}

	//print_r($result);
	//print_r($all_subjects)
	?>
</table>