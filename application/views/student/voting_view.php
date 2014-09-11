<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
   <h2>Vote Candidates</h2>
   <table>
   <tr><td>By Party:</td>
      <td>
         <?php echo form_open('student/vote_party'); ?>
		 <select name='party'>
         <option value='globe'/>Globe
         <option value='smart'/>Smart
         <option value='independent'/>Independent
		 </select>
         <br><input type="submit" value="Vote Party" onclick="return votep()">
         <?php echo form_close(); ?>
      </td></tr>
   <tr><td>By Position:</td>
      <td>
         <?php echo form_open('student/vote_individual'); ?>
         <table class="table">
            <tr>
               <th>&nbsp;</th><th>Globe</th><th>Smart</th><th>Independent</th><th>&nbsp;</th>
            </tr>
            <tr>
               <td>President:</td>
               <td><?php echo $pos1;?></td><td><?phpecho $pos8;?></td><td><?php echo $pos15;?></td><td><input type='radio' name='president' value='$cid'/>Abstain</td>
            </tr>
            <tr>
               <td>Vice President - External:</td>
               <td><?php echo $pos2;?></td><td><?php echo $pos9;?></td><td><?php echo $pos16;?></td><td><input type='radio' name='vpexternal'/>Abstain</td>
            </tr>
            <tr>
               <td>Vice President - Internal:</td>
               <td><?php echo $pos3;?></td><td><?php echo $pos10;?></td><td><?php echo $pos17;?></td><td><input type='radio' name='v-p-internal'/>Abstain</td>
            </tr>
            <tr>
               <td>Secretary:</td>
               <td><?php echo $pos4;?></td><td><?php echo $pos11;?></td><td><?php echo $pos18;?></td><td><input type='radio' name='secretary'/>Abstain</td>
            </tr>
            <tr>
               <td>Treasurer:</td>
               <td><?php echo $pos5;?></td><td><?php echo $pos12;?></td><td><?php echo $pos19;?></td><td><input type='radio' name='treasurer'/>Abstain</td>
            </tr>
            <tr>
               <td>Auditor:</td>
               <td><?php echo $pos6;?></td><td><?php echo $pos13;?></td><td><?php echo $pos20;?></td><td><input type='radio' name='auditor'/>Abstain</td>
            </tr>
            <tr>
               <td>PRO:</td>
               <td><?php echo $pos7;?></td><td><?php echo $pos14;?></td><td><?php echo $pos21;?></td><td><input type='radio' name='pro'/>Abstain</td>
            </tr>
         </table>
         <br><input type="submit" id="submit" value="Vote Individual" onclick="return votei()">
         <?php echo form_close(); ?>
      </td></tr>
   </table>