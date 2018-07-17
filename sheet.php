<?php 
require_once('includes/session.php');
require_once('includes/constant.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header4.php');
?>
<a href="exam-list.php" class="btn btn-info">Back</a>
<div class="container">
<br><br><br><br><br>
         <?php 
        if (isset($_POST['query'])) {
             $class = $_POST['class'];
             $subj = $_POST['subj'];

             if (!empty($class) && !empty($subj)) {
              
             $query = "SELECT * FROM as_marks INNER JOIN as_students USING(as_studentno) INNER JOIN as_subjects USING(as_subject_id) WHERE as_subject_id = '$subj' AND as_classid = '$class'";

             $res = mysql_query($query);
             confirm_result($res);
             echo "<h3 align=\"center\">Marks Sheet for {$class} class in {$subj} subject.</h3>";
             
               echo '<div class="table-responsive col-md-10">';
                  echo '<table class="table table-striped">';
                   echo '<tr><th>Student No.</th><th>Name</th><th>B.O.T</th><th>MID</th><th>E.O.T</th><tr>';
             while ($mark = mysql_fetch_assoc($res)) {
                echo '<tr>';
                echo "<td>TIK101-000{$mark['as_studentno']}</td>";
                echo "<td>{$mark['as_surname']}&nbsp;{$mark['as_firstname']}&nbsp;{$mark['as_othername']}</td>";
                echo "<td>{$mark['as_bot']}</td>";
                echo "<td>{$mark['as_mid']}</td>";
                echo "<td>{$mark['as_eot']}</td>";
                echo '</tr>';
             }
             echo "</td>";
               echo '</tr>';
           }else{
            $msg = "Please select a class and subject to continue";
            header('Location: exam-list.php?id=' . $msg);
           }
        }
    ?>
</div>

