<?php
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php');
include_once('includes/header2.php');
?>
<?php //error_reporting(0); ?>
<a href="admin.php" class="btn btn-info">Back</a>

 
<br><br><br>
<div class="row">
    <div class="col-md-9"><h3><i class="fa fa-gear">&nbsp;Manage Student Attendence</i></h3></div><br><br>
    <div class="col-md-3">
        <a href="attendance.php" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Roll Call</a>
    </div>
</div>
  <?php if (isset($_GET['id'])): ?>
    <div style="color:blue"><?php echo $_GET['id']; ?></div>
   <?php endif; ?>
<hr>
<?php //include_once 'includes/exam-nav.php'; ?>
<!-- <div class="as_container"> -->

<?php
   $sql = "SELECT * FROM as_attendence INNER JOIN as_students USING(as_studentno)";
   $query = mysql_query($sql);
  

   echo '<div class="table-responsive col-md-10">';
      echo '<table class="table table-striped">';
       echo '<tr><th>Student No.</th><th>Name</th><th>Status</th><tr>';
   while ($attend = mysql_fetch_assoc($query)) {
        echo '<tr>';
        echo "<td>TIK101-000{$attend['as_studentno']}</td>";
        echo "<td>{$attend['as_surname']}&nbsp;{$attend['as_firstname']}&nbsp;{$attend['as_othername']}</td>";
        echo "<td>";
            if ($attend['as_attendence'] == 'Present') {
              echo '<div id="present">Present</div>';
            }else{
              echo '<div id="absent">Absent</div>';
            }
        echo "</td>";
        echo '</tr>';

        
   }
    echo "</table>";
  echo "</div>";
?>

<!-- </div> -->
<br>
<?php //include_once("includes/footer.php"); ?>

