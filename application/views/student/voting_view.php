<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
   <h2>Vote Candidates</h2>

   <div class="panel panel-default">
      <div class="panel-heading">By Party:</div>
      <div class="panel-body">
         <table>
         <tr>
            <td>
            <form class="form-horizontal" role="form" id="vote_party" method="post">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      		<select name='party'>
               <option value="">Select Party</option>
               <option value='globe'/>Globe
               <option value='smart'/>Smart
               <option value='independent'/>Independent
      		</select>
            <input type="submit" id="btnVoteParty" value="Vote Party">
            </form>
            </td></tr>
         </table>
      </div>
   </div>
   <div class="panel panel-default">
      <div class="panel-heading">By Position:</div>
      <div class="panel-body">
         <table>
         <tr>
            <td>
               <form class="form-horizontal" role="form" id="vote_individual" method="post">
               <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
               <table class="table">
                  <tr>
                     <th>&nbsp;</th><th>Globe</th><th>Smart</th><th>Independent</th><th>&nbsp;</th>
                  </tr>
                  <tr>
                     <td>President:</td>
                     <td><?php echo $pos1;?></td><td><?php echo $pos8;?></td><td><?php echo $pos15;?></td><td><input type='radio' name='president'/>Abstain</td>
                  </tr>
                  <tr>
                     <td>Vice President - External:</td>
                     <td><?php echo $pos2;?></td><td><?php echo $pos9;?></td><td><?php echo $pos16;?></td><td><input type='radio' name='vpexternal'/>Abstain</td>
                  </tr>
                  <tr>
                     <td>Vice President - Internal:</td>
                     <td><?php echo $pos3;?></td><td><?php echo $pos10;?></td><td><?php echo $pos17;?></td><td><input type='radio' name='vpinternal'/>Abstain</td>
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
               <input type="submit" id="btnVoteIndividual" value="Vote Individual">
               </form>
            </td></tr>
         </table>
      </div>
   </div>