<?php 
require_once('includes/session.php');
require_once('includes/constant.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header2.php');
?>
<a href="admin.php" class="btn btn-info">Back</a>

  <br><br><br>
<?php include_once 'includes/exam-nav.php'; ?>
<br>
       <div>
         <div class="col-md-9"><h3><i class="fa fa-gear">&nbsp;Grading System</i></h3></div><br><br>
       </div>
       <br>
     <?php
        $select = "SELECT * FROM as_grading";
        $results = mysql_query($select);

         echo '<div class="table-responsive col-md-10">';
		  echo '<table class="table table-striped">';
		   echo '<tr><th>No.</th><th>Grade Name</th><th>Mark From</th><th>Mark To</th><tr>';
        while ($grade = mysql_fetch_assoc($results)) {
        	echo '<tr>';
		    echo "<td>{$grade['as_grading_id']}</td>";
		    echo "<td>{$grade['as_grade_name']}</td>";
		    echo "<td>{$grade['as_mark_from']}</td>";
		    echo "<td>{$grade['as_mark_to']}</td>";
		    echo '</tr>';
        }
        echo "</table>";
         echo "</div>";
     ?>
<br>