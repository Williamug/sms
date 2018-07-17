<?php
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php');
include_once('includes/header2.php');
?>
<?php //error_reporting(0); ?>
<a href="attendence-view.php" class="btn btn-info">Back</a>

 
<br><br><br>
<div class="row">
    <div class="col-md-9"><h3><i class="fa fa-gear">&nbsp;Manage Student Attendence</i></h3><br><h4>Student Roll Call</h4></div><br><br>

      
    
</div>
<hr>
<?php //include_once 'includes/exam-nav.php'; ?>
<div class="as_container">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="row">
    <div class="col-md-1">
    </div>
     <div class="col-md-10">
        <div class="row">
             <div class="col-md-4">
        <div class="form-group">
          <p style="color:green">Select a class and then click Roll Call button</p>
            <label for="selectClass">Select Class</label><br>
            <select class="form-control" name="selectClass" id="selectClass">
                 <option value="">--Select--</option>
                  <?php 
                          $select_class = mysql_query("SELECT * FROM as_class");
                          while ($class = mysql_fetch_assoc($select_class)) {
                  ?>
                <option value="<?php echo $class['as_classid']; ?>"><?php echo $class['as_classname']; }?></option>
              </select>
        </div>
      </div>

        <div class="col-md-2"><br>
        <br><br>
          <button type="submit" name="manage" class="btn btn-primary">Roll Call</button>
        </div>
    </div>
    
    <hr>
    <br>
      <?php
             if (isset($_POST['manage'])) {
              $selectClass = $_POST['selectClass'];
              
              if (!empty($selectClass)) {
               echo '<div style="color: green; font-size: 14px">
                         <i class="fa fa-info"></i>&nbsp;
                         <span style="">You have selected ' . $selectClass . '</span>
                     </div>';
               echo '<br />';
               
               echo '<div style="color: blue; font-size: 16px">
                         <i class="fa fa-info-circle"></i>&nbsp;
                         <span style="text-decoration:underline">Please do not leave any empty field to avoid double work.</span>
                     </div>';
               echo '<br />';
            // selecting Student
            
             if ($selectClass) {
             
             
            $select_student = mysql_query("SELECT * FROM as_students INNER JOIN as_class USING(as_classid) 
                                                 WHERE as_classid = '$selectClass'");

                 echo '<div class="row">';
                 echo    '<div class="col-md-4">';
           echo    '<div class="form-group">';
               echo '<label for="selectStudent">Name</label><br>';

               echo '<select class="form-control" name="selectStudent" id="selectStudent">';

               echo '<option value="">--Select--</option>';
 
         while ($student = mysql_fetch_assoc($select_student)) {
          echo '<option value="' . $student['as_studentno'] .'">' . $student['as_surname'] . '&nbsp;' . $student['as_firstname'] . '&nbsp;' . $student['as_othername'] . '</option>';
                   }
                }
                   echo '</select>';
                    echo '</div>';
                    echo '</div>';

                    echo '<div class="col-md-4">';
                    echo '<br>
                         <select class="form-control" name="status">
                            <option>--select--</option>
                            <option>Present</option>
                            <option>Absent</option>
                          </select>';
                   echo '</div>';

             echo '</div>';
            echo '</div>';

                echo <<<_END
            <br>
          <div class="row">
           <div class="col-md-4"></div>
            <div class="col-md-6">
            <br>
             <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>

        
_END;
           }else{
            echo '<div style="color: blue; font-size: 20px">
                   <i class="fa fa-exclamation-triangle"></i>&nbsp;
                   <span style="text-decoration:underline">Please Select a class to continue.</span>
               </div>';
           }
        }   

            if (isset($_POST['submit'])) {
              $selectClass = $_POST['selectClass'];
              $selectStudent = $_POST['selectStudent'];
              $status = $_POST['status'];
            
              if (!empty($selectStudent) && !empty($status)) {
                  $sql = "INSERT INTO as_attendence(as_studentno, as_attendence) 
                            VALUES('$selectStudent', '$status')";
                        $res = mysql_query($sql);
                        confirm_insert($res);

                   $data_sent = 'Student Roll call done';
                   
                   header('Location: attendence-view.php?id=' . $data_sent);
                }else{
                  echo '<div style="color: red">Please you left some fields empty</div>';
                } 
             }
      ?>
    
   </div>

      </div>
</form>
</div>
<br>
<?php include_once("includes/footer.php"); ?>

