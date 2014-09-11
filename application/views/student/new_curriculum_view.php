<h3>Curriculum Code: <?php echo $course." ".$sy?></h3>
	<table class="table table-condensed">
    <?php 
    	$units=0;
        for ($i=1; $i <= $years ; $i++) { 
          for ($j=1; $j <= 3; $j++) { 
            echo "<tr><td colspan='7'><strong>Year ".$i." Term ".$j."<strong></td></tr>";
            if ($result==NULL) {
              continue;
            }
            echo"<tr><td>ID</td><td>Name</td><td>Pre-requisite</td><td>Co-requisite</td><td>Lecture Units</td><td>Lab Units</td><td>Grade</td></tr>";
            foreach ($result as $row) {
              if ($row->year==$i) {
                if ($row->term==$j) {
                  echo "<tr><td>".$row->course_id."</td><td>".$row->course_name."</td>";
                  echo "<td>".$row->pre_req."</td><td>".$row->co_req."</td>";
                  echo "<td>".$row->lec_unit."</td><td>".$row->lab_unit."</td><td>";
                  foreach ($grades as $value) {
                  	if (strcmp($value->course_name, $row->course_id)==0) {
                  		echo"<strong>";
								if ((int)$value->grade<=100 && (int)$value->grade>=97){
									echo "1.00";
								}
								elseif ((int)$value->grade<=96 && (int)$value->grade>=94){
									echo "1.25";
								}
								elseif ((int)$value->grade<=93 && (int)$value->grade>=91){
									echo "1.50";
								}
								elseif ((int)$value->grade<=90 && (int)$value->grade>=88){
									echo "1.75";
								}
								elseif ((int)$value->grade<=87 && (int)$value->grade>=85){
									echo "2.00";
								}
								elseif ((int)$value->grade<=84 && (int)$value->grade>=83){
									echo "2.25";
								}
								elseif ((int)$value->grade<=82 && (int)$value->grade>=80){
									echo "2.50";
								}
								elseif ((int)$value->grade<=79 && (int)$value->grade>=77){
									echo "2.75";
								}
								elseif ((int)$value->grade<=76 && (int)$value->grade>=75){
									echo "3.00";
								}
								elseif ((int)$value->grade<=74 && $value->grade !=""){
									if ($value->grade=="Credited")
									{
										echo "Credited";
									}
									else
									{
										echo "5.00";
									}
								}
								else{
									echo $value->grade;
								}
						echo"</strong>";
						$units=$units+3;
                  	}
                  }
                  echo "</td></tr>";
                }
              }
            } 
          }
        }   
    ?>
    </table>
    <table>
 		<tr>
		 	<td colspan="7"><h5>Grading System</h5>
		 	<ul id="double">
		 		<li>1.00 = 97-100</li>
		 		<li>1.25 = 94-96</li>
		 		<li>1.50 = 91-93</li>
		 		<li>1.50 = 88-90</li>
		 		<li>1.50 = 85-87</li>
		 		<li>1.50 = 83-84</li>
		 		<li>1.50 = 80-82</li>
		 		<li>1.50 = 77-79</li>
		 		<li>1.50 = 75-76</li>
		 		<li>5.00 = Failed</li>
		 		<li>INC = Incomplete</li>
		 	</ul></td>
		 </tr>
	</table>
	<table>
 		<tr>
		 	<td colspan="2"><h5>Units</h5>
		 		<ul id="double">
		 			<li>Earned:<?php echo $units;?></li>
		 			<li>Required:
		 				<?php 
		 					if ($course=="BSIT"&&$sy=="2007-2008") {
		 						$req=168;
		 					}
							if ($course=="BSBA"&&$sy=="2007-2008") {
		 						$req=168;
		 					}
		 					echo $req;
		 				?>
		 			</li>
		 			<li>Remaining: <?php echo $req-$units;?></li>
		 		</ul>
		 	</td>
 		</tr>
 	</table>