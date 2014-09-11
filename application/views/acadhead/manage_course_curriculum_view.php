  <!--div class="row">
  <div class="col-md-6"-->
    <h3><?php echo $course.' - '.$sy.' ('.$years.'years)';?></h3>
    <!--form class="form-horizontal" role="form" id="add_course" method="post">
      <h4>Add Subjects/Course to Curriculum</h4>
      <input type="hidden" name="id" id="id_add" value="<?php echo $id?>">
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <input type="submit" class="btn btn-success" name="add_subject" value="Add">
      <div class="form-group">
        <label for="course_unit_lec" class="col-sm-4 control-label">Subject</label>
        <div class="col-sm-8">
        <select class="form-control" id="add_subject_id" name="add_subject_id" required>
           <option value=''>--</option>
           <?php 
            foreach ($all_subjects as $row) {
              $comp=0;
              $sub1=$row->course_id;
              foreach ($result as $row2) {
                $sub2=$row2->course_id;
                if (strcmp($sub1,$sub2)==0) {
                  $comp=1;
                }
              }
              if ($comp==0) {
                 echo "<option value='$row->course_id'>$row->course_id</option>";
              }         
            }
           ?>
        </select>
        </div>
      </div>
      <div class="form-group">
        <label for="course_unit_lec" class="col-sm-4 control-label">Term</label>
        <div class="col-sm-8">
        <select class="form-control" id="add_term" name="add_term" required>
           <option value=''>--</option>
           <option value='1'>1</option>
           <option value='2'>2</option>
           <option value='3'>3</option>
        </select>
        </div>
      </div>
      <div class="form-group">
        <label for="course_unit_lec" class="col-sm-4 control-label">Year</label>
        <div class="col-sm-8">
        <select class="form-control" id="add_year" name="add_year" required>
           <option value=''>--</option>
           <option value='1'>1</option>
           <option value='2'>2</option>
           <option value='3'>3</option>
           <option value='4'>4</option>
        </select>
        </div>
      </div>
    </form>
      <br>
    <form class="form-horizontal" role="form" id="delete_course" method="post">
      <h4>Delete Subjects/Course to Curriculum</h4>
      <input type="hidden" name="id" id="id_delete" value="<?php echo $id?>">
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <input type="submit" class="btn btn-warning"  name="delete_subject" value="Delete">
      <div class="form-group">
        <label for="course_unit_lec" class="col-sm-4 control-label">Subject</label>
        <div class="col-sm-8">
        <select class="form-control" id="del_subject_id" name="del_subject_id" required>
           <option value=''>--</option>
           <?php 
            foreach ($result as $row) {
              echo "<option value='$row->course_id'>$row->course_id</option>";          }
           ?>
        </select>
        </div>
      </div>
    </form>
    </div>
    <div class="col-md-6"></div>
  </div>
  <div class="accordion" id="accordion2">
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
        Click to see the Curriculum
        </a>
      </div>
      <div id="collapseOne" class="accordion-body collapse">
        <div class="accordion-inner"-->
          <table class="table table-condensed">
          <?php 
          for ($i=1; $i <= $years ; $i++) 
          { 
            for ($j=1; $j <= 3; $j++) 
            { 
              echo "<tr><td>Year ".$i." Term ".$j."</td></tr>";
              if ($result==NULL) 
              {
                continue;
              }
              echo"<tr><td>ID</td><td>Name</td><td>Pre-requisite</td><td>Co-requisite</td><td>Lecture Units</td><td>Lab Units</td></tr>";
              foreach ($result as $row) 
              {
                if ($row->year==$i)
                {
                  if ($row->term==$j) 
                  {
                    echo "<tr><td>".$row->course_id."</td><td>".$row->course_name."</td>";
                    echo "<td>".$row->course_prereq."</td><td>".$row->course_coreq."</td>";
                    echo "<td>".$row->course_unit_lec."</td><td>".$row->course_unit_lab."</td></tr>";
                  }
                }
              } 
            }
          }

          //print_r($result);
          //print_r($all_subjects)
          ?>
          </table>
        <!--/div>
      </div>
    </div>
  </div-->