<?php
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php');
include_once('includes/header2.php');
?>
<?php //error_reporting(0); ?>
<a href="admin.php" class="btn btn-info">Back</a>

  <br><br><br>
<!-- <h3 align="center">Name of the school.</h3>
<h4 align="center">Receipt</h4> -->
<?php include_once 'includes/exam-nav.php'; ?>
<div class="as_container">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="row">
    <div class="col-md-1">
    </div>
     <div class="col-md-10">
        <div class="row">
             <div class="col-md-4">
				<div class="form-group">
					<p style="color:green">Select a class and then click Manage Marks button</p>
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
		    <br><br><br>
			    <button type="submit" name="manage" class="btn btn-primary">Manage Marks</button>
		    </div>
		</div>
		
		<hr>
		<br>
		  <?php
             if (isset($_POST['manage'])) {
             	$selectClass = $_POST['selectClass'];
             	 
             	 echo '<div style="color: blue; font-size: 20px">
             	           <i class="fa fa-info-circle"></i>&nbsp;
             	           <span style="text-decoration:underline">Please do not leave any empty field to avoid double work.</span>
             	       </div>';
             	 echo '<br />';

             	// selecting subjects

             	if (!empty($selectClass)) {
             	
                $select_subject = mysql_query("SELECT * FROM as_subjects");
             	echo '<div class="row">';
                 echo    '<div class="col-md-4">';
				   echo    '<div class="form-group">';
             	 echo '<label for="selectSubject">Select Subject</label><br>';

             	 echo '<select class="form-control" name="selectSubject" id="selectSubject">';

             	 echo '<option value="">--Select--</option>';
 
				 while ($subject = mysql_fetch_assoc($select_subject)) {
				 	echo '<option value="' . $subject['as_subject_id'] .'">' . $subject['as_subjectname'] . '</option>';
                 }

                 echo '</select>';
                       echo '</div>';
			       echo '</div>';
			   

			      // selecting term
			      $select_term = mysql_query("SELECT * FROM as_term");
             
                 echo    '<div class="col-md-4">';
				   echo    '<div class="form-group">';
             	 echo '<label for="selectTerm">Select Term</label><br>';

             	 echo '<select class="form-control" name="selectTerm" id="selectTerm">';

             	 echo '<option value="">--Select--</option>';
 
				 while ($term = mysql_fetch_assoc($select_term)) {
				 	echo '<option value="' . $term['as_termid'] .'">' . $term['as_term'] . '</option>';
                 }

                 echo '</select>';
                       echo '</div>';
			       echo '</div>';
			     

			      // selecting Exam set
			      $select_exam = mysql_query("SELECT * FROM as_exam_set");
             
                 echo    '<div class="col-md-4">';
				   echo    '<div class="form-group">';
             	 echo '<label for="selectExam">&nbsp;</label><br>';

             	 // echo '<select class="form-control" name="selectExam" id="selectExam">';

      //        	 echo '<option value="">--Select--</option>';
 
				  // while ($exam = mysql_fetch_assoc($select_exam)) {
				 	// echo '<option value="' . $exam['as_exam_id'] .'">' . $exam['as_name'] . '</option>';
      //             }
                 

                 // echo '</select>';
                       echo '</div>';
			       echo '</div>';
			      echo '</div>';

			      echo '<br>';

                 echo '<hr>';



			      // selecting Student
			      
			       if ($selectClass) {
			       
			       
			      $select_student = mysql_query("SELECT * FROM as_students INNER JOIN as_class USING(as_classid) 
			      	                                   WHERE as_classid = '$selectClass'");

                 echo '<div class="row">';
                 echo    '<div class="col-md-3">';
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

                    echo '<div class="col-md-2">';
                    echo '<label>B.O.T</label>';
                   echo '<input type="number" name="bot" class="form-control">';
                   echo '</div>';

                   echo '<div class="col-md-2">';
                    echo '<label>MID</label>';
                   echo '<input type="number" name="mid" class="form-control">';
                   echo '</div>';

                   echo '<div class="col-md-2">';
                    echo '<label>E.O.T</label>';
                   echo '<input type="number" name="eot" class="form-control">';
                   echo '</div>';

                   echo '<div class="col-md-3">';
                    echo '<label>Comment</label>';
                   echo '<input type="text" name="comment" class="form-control">';
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
           }   
        }   

            if (isset($_POST['submit'])) {
            	$selectSubject = $_POST['selectSubject'];
                $selectClass = $_POST['selectClass'];
            	$selectTerm = $_POST['selectTerm'];
            	// $selectExam = $_POST['selectExam'];
            	$selectStudent = $_POST['selectStudent'];
            	$bot = $_POST['bot'];
                $mid = $_POST['mid'];
                $eot = $_POST['eot'];
            	$comment = $_POST['comment'];

              if (!empty($selectTerm) && !empty($selectStudent) && !empty($selectSubject)) {
	              	$sql = "INSERT INTO as_marks(as_termid, as_studentno, as_subject_id, as_bot, as_mid, as_eot, as_comment) 
	            	            VALUES('$selectTerm', '$selectStudent', '$selectSubject', '$bot', '$mid', '$eot', '$comment')";
	            	        $res = mysql_query($sql);
	            	        confirm_insert($res);

	            	   $data_sent = "Marks has been submitted";
	            	   echo '<div style="color:blue; background="green" >&check;&nbsp;' . $data_sent . '</div>';
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

