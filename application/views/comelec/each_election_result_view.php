	<h2>Election Name: <?php echo $name ?></h2></center>
	<p>Winner is <b>HIGHLIGHTED</b></p>
	<?php
		$total1=(int)$vote1+(int)$vote8+(int)$vote15;
		$total2=(int)$vote2+(int)$vote9+(int)$vote16;
		$total3=(int)$vote3+(int)$vote10+(int)$vote17;
		$total4=(int)$vote4+(int)$vote11+(int)$vote18;
		$total5=(int)$vote5+(int)$vote12+(int)$vote19;
		$total6=(int)$vote6+(int)$vote13+(int)$vote20;
		$total7=(int)$vote7+(int)$vote14+(int)$vote21;
		$pres1="";$pres2="";$pres3="";$pres4="";$pres5="";$pres6="";$pres7="";
		$pres8="";$pres9="";$pres10="";$pres11="";$pres12="";$pres13="";$pres14="";
		$pres15="";$pres16="";$pres17="";$pres18="";$pres19="";$pres20="";$pres21="";
		$bgcolor1="";$bgcolor2="";$bgcolor3="";$bgcolor4="";$bgcolor5="";$bgcolor6="";$bgcolor7="";
		$bgcolor8="";$bgcolor9="";$bgcolor10="";$bgcolor11="";$bgcolor12="";$bgcolor13="";$bgcolor14="";
		$bgcolor15="";$bgcolor16="";$bgcolor17="";$bgcolor18="";$bgcolor19="";$bgcolor20="";$bgcolor21="";
		//president
		if ($vote1<$vote8) {
			if ($vote8<$vote15) {
				$bgcolor15="background-color:#FFFF00;font-weight:bold;;font-weight:bold;";
				$pres15="President";
			}
			else{
				$bgcolor8="background-color:#FFFF00;font-weight:bold;";
				$pres8="President";
			}
		}
		else{
			if ($vote1<$vote15) {
				$bgcolor15="background-color:#FFFF00;font-weight:bold;";
				$pres15="President";
			}
			else{
				$bgcolor1="background-color:#FFFF00;font-weight:bold;";
				$pres1="President";
			}
		}
		if ($vote2<$vote9) {
			if ($vote9<$vote16) {
				$bgcolor16="background-color:#FFFF00;font-weight:bold;";
				$pres16="Vice President - External";
			}
			else{
				$bgcolor9="background-color:#FFFF00;font-weight:bold;";
				$pres9="Vice President - External";
			}
		}
		else{
			if ($vote2<$vote16) {
				$bgcolor16="background-color:#FFFF00;font-weight:bold;";
				$pres16="Vice President - External";
			}
			else{
				$bgcolor2="background-color:#FFFF00;font-weight:bold;";
				$pres2="Vice President - External";
			}
		}
		if ($vote3<$vote10) {
			if ($vote10<$vote17) {
				$bgcolor17="background-color:#FFFF00;font-weight:bold;";
				$pres17="Vice President - Internal";
			}
			else{
				$bgcolor10="background-color:#FFFF00;font-weight:bold;";
				$pres10="Vice President - Internal";
			}
		}
		else{
			if ($vote3<$vote17) {
				$bgcolor17="background-color:#FFFF00;font-weight:bold;";
				$pres17="Vice President - Internal";
			}
			else{
				$bgcolor3="background-color:#FFFF00;font-weight:bold;";
				$pres3="Vice President - Internal";
			}
		}
		if ($vote4<$vote11) {
			if ($vote11<$vote18) {
				$bgcolor18="background-color:#FFFF00;font-weight:bold;";
				$pres18="Secretary";
			}
			else{
				$bgcolor11="background-color:#FFFF00;font-weight:bold;";
				$pres11="Secretary";
			}
		}
		else{
			if ($vote4<$vote18) {
				$bgcolor18="background-color:#FFFF00;font-weight:bold;";
				$pres18="Secretary";
			}
			else{
				$bgcolor4="background-color:#FFFF00;font-weight:bold;";
				$pres4="Secretary";
			}
		}
		if ($vote5<$vote12) {
			if ($vote12<$vote19) {
				$bgcolor19="background-color:#FFFF00;font-weight:bold;";
				$pres19="Treasurer";
			}
			else{
				$bgcolor12="background-color:#FFFF00;font-weight:bold;";
				$pres12="Treasurer";
			}
		}
		else{
			if ($vote5<$vote19) {
				$bgcolor19="background-color:#FFFF00;font-weight:bold;";
				$pres19="Treasurer";
			}
			else{
				$bgcolor5="background-color:#FFFF00;font-weight:bold;";
				$pres5="Treasurer";
			}
		}
		if ($vote6<$vote13) {
			if ($vote13<$vote20) {
				$bgcolor20="background-color:#FFFF00;font-weight:bold;";
				$pres20="Auditor";
			}
			else{
				$bgcolor13="background-color:#FFFF00;font-weight:bold;";
				$pres13="Auditor";
			}
		}
		else{
			if ($vote6<$vote20) {
				$bgcolor20="background-color:#FFFF00;font-weight:bold;";
				$pres20="Auditor";
			}
			else{
				$bgcolor6="background-color:#FFFF00;font-weight:bold;";
				$pres6="Auditor";
			}
		}
		
		if ($vote7<$vote14) {
			if ($vote14<$vote21) {
				$bgcolor21="background-color:#FFFF00;font-weight:bold;";
				$pres21="PRO";
			}
			elseif($vote7==$vote14||$vote7==$vote21)
				$bgcolor14="background-color:#FFFF00;font-weight:bold;";
				$pres14="PRO";
			}
		}
		else{
			if ($vote7<$vote21) {
				$bgcolor21="background-color:#FFFF00;font-weight:bold;";
				$pres21="PRO";
			}
			else{
				$bgcolor7="background-color:#FFFF00;font-weight:bold;";
				$pres7="PRO";
			}
		}
	?>
	
	<table>
	<tr>
	   <th>Position</th><th>Candidate</th><th>Party</th><th>Votes</th>
	</tr>
	<tr style="<?php echo $bgcolor1?>"><td><?php echo $pres1 ?></td><td><?php echo $pos1?></td><td>Globe</td><td><?php echo $vote1;?></td></tr>
	<tr style="<?php echo $bgcolor8?>"><td><?php echo $pres8 ?></td><td><?php echo $pos8?></td><td>Smart</td><td><?php echo $vote8;?></td></tr>
	<tr style="<?php echo $bgcolor15?>"><td><?php echo $pres15 ?></td><td><?php echo $pos15?></td><td>Independent</td><td><?php echo $vote15;?></td></tr>
	<tr><td colspan='2'>&nbsp;</td><td>Total Voters</td><td><?php echo $total1;?></td></tr>
	<tr><td colspan='2'>&nbsp;</td><td>Abstained</td><td><?php echo $details['voted']-$total1;?></td></tr>
	<tr><td colspan='4'>&nbsp;</td></tr>
	<tr style="<?php echo $bgcolor2?>"><td><?php echo $pres2 ?></td><td><?php echo $pos2?></td><td>Globe</td><td><?php echo $vote2;?></td></tr>
	<tr style="<?php echo $bgcolor9?>"><td><?php echo $pres9 ?></td><td><?php echo $pos9?></td><td>Smart</td><td><?php echo $vote9;?></td></tr>
	<tr style="<?php echo $bgcolor16?>"><td><?php echo $pres16 ?></td><td><?php echo $pos16?></td><td>Independent</td><td><?php echo $vote16;?></td></tr>
	<tr><td colspan='2'>&nbsp;</td><td>Total Voters</td><td><?php echo $total2;?></td></tr>
	<tr><td colspan='2'>&nbsp;</td><td>Abstained</td><td><?php echo $details['voted']-$total2;?></td></tr>
	<tr><td colspan='4'>&nbsp;</td></tr>
	<tr style="<?php echo $bgcolor3?>"><td><?php echo $pres3 ?></td><td><?php echo $pos3?></td><td>Globe</td><td><?php echo $vote3;?></td></tr>
	<tr style="<?php echo $bgcolor10?>"><td><?php echo $pres10 ?></td><td><?php echo $pos10?></td><td>Smart</td><td><?php echo $vote10;?></td></tr>
	<tr style="<?php echo $bgcolor17?>"><td><?php echo $pres17 ?></td><td><?php echo $pos17?></td><td>Independent</td><td><?php echo $vote17;?></td></tr>
	<tr><td colspan='2'>&nbsp;</td><td>Total Voters</td><td><?php echo $total3;?></td></tr>
	<tr><td colspan='2'>&nbsp;</td><td>Abstained</td><td><?php echo $details['voted']-$total3;?></td></tr>
	<tr><td colspan='4'>&nbsp;</td></tr>
	<tr style="<?php echo $bgcolor4?>"><td><?php echo $pres4 ?></td><td><?php echo $pos4?></td><td>Globe</td><td><?php echo $vote4;?></td></tr>
	<tr style="<?php echo $bgcolor11?>"><td><?php echo $pres11 ?></td><td><?php echo $pos11?></td><td>Smart</td><td><?php echo $vote11;?></td></tr>
	<tr style="<?php echo $bgcolor18?>"><td><?php echo $pres18 ?></td><td><?php echo $pos18?></td><td>Independent</td><td><?php echo $vote18;?></td></tr>
	<tr><td colspan='2'>&nbsp;</td><td>Total Voters</td><td><?php echo $total4;?></td></tr>
	<tr><td colspan='2'>&nbsp;</td><td>Abstained</td><td><?php echo $details['voted']-$total4;?></td></tr>
	<tr><td colspan='4'>&nbsp;</td></tr>
	<tr style="<?php echo $bgcolor5?>"><td><?php echo $pres5 ?></td><td><?php echo $pos5?></td><td>Globe</td><td><?php echo $vote5;?></td></tr>
	<tr style="<?php echo $bgcolor12?>"><td><?php echo $pres12 ?></td><td><?php echo $pos12?></td><td>Smart</td><td><?php echo $vote12;?></td></tr>
	<tr style="<?php echo $bgcolor19?>"><td><?php echo $pres19 ?></td><td><?php echo $pos19?></td><td>Independent</td><td><?php echo $vote19;?></td></tr>
	<tr><td colspan='2'>&nbsp;</td><td>Total Voters</td><td><?php echo $total5;?></td></tr>
	<tr><td colspan='2'>&nbsp;</td><td>Abstained</td><td><?php echo $details['voted']-$total5;?></td></tr>
	<tr><td colspan='4'>&nbsp;</td></tr>
	<tr style="<?php echo $bgcolor6?>"><td><?php echo $pres6 ?></td><td><?php echo $pos6?></td><td>Globe</td><td><?php echo $vote6;?></td></tr>
	<tr style="<?php echo $bgcolor13?>"><td><?php echo $pres13 ?></td><td><?php echo $pos13?></td><td>Smart</td><td><?php echo $vote13;?></td></tr>
	<tr style="<?php echo $bgcolor20?>"><td><?php echo $pres20 ?></td><td><?php echo $pos20?></td><td>Independent</td><td><?php echo $vote20;?></td></tr>
	<tr><td colspan='2'>&nbsp;</td><td>Total Voters</td><td><?php echo $total6;?></td></tr>
	<tr><td colspan='2'>&nbsp;</td><td>Abstained</td><td><?php echo $details['voted']-$total6;?></td></tr>
	<tr><td colspan='4'>&nbsp;</td></tr>
	<tr style="<?php echo $bgcolor7?>"><td><?php echo $pres7 ?></td><td><?php echo $pos7?></td><td>Globe</td><td><?php echo $vote7;?></td></tr>
	<tr style="<?php echo $bgcolor14?>"><td><?php echo $pres14 ?></td><td><?php echo $pos14?></td><td>Smart</td><td><?php echo $vote14;?></td></tr>
	<tr style="<?php echo $bgcolor21?>"><td><?php echo $pres21 ?></td><td><?php echo $pos21?></td><td>Independent</td><td><?php echo $vote21;?></td></tr>
	<tr><td colspan='2'>&nbsp;</td><td>Total Voters</td><td><?php echo $total7;?></td></tr>
	<tr><td colspan='2'>&nbsp;</td><td>Abstained</td><td><?php echo $details['voted']-$total7;?></td></tr>
	</table>
	<h4>Overall Number of Voters: <?php echo $details['votee']; ?>&nbsp;&nbsp;&nbsp;
    Votes Counted: <?php echo $details['voted']; ?>&nbsp;&nbsp;&nbsp;
    Voter Turnout: <?php $percent=(intval($details['voted'])/intval($details['votee']))*100; echo round($percent,2)."%"; ?></h4>

