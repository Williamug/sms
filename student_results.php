<?php 
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
 include_once('includes/header3.php');

?>
<form action="delete-student.php" method="post">
<?php if (isset($_GET['msg'])): ?>
 <div class="deleted"> <?php echo '&check; &nbsp;' . $_GET['msg']; ?></div>
<?php elseif(isset($_GET['err'])): ?>
<div class="deleted2"> <?php echo '&check; &nbsp;' . $_GET['err']; ?></div>
<?php endif; ?>

<?php

//pull out data

   $results = "SELECT * FROM as_students INNER JOIN as_class USING(as_classid) ORDER BY as_admission_date DESC";
echo "<h3>Student Information</h3>";
 echo '<div class="table-responsive">';
  echo '<table class="table table-striped">';
   echo '<tr><th>Check</th><th>Student No.</th><th>Surname</th><th>First Name</th>
            <th>Other Name</th><th>Class</th><th>Gender</th><th>Date of Birth</th><th>Religion</th><tr>';
	$query = mysql_query($results);
	while($row = mysql_fetch_assoc($query)){
    echo '<tr>';

	echo<<<_END
    <td><input type="checkbox" value="{$row['as_studentno']}" name="action[]"></td>
    <td>TIK101-000{$row['as_studentno']}</td>
_END;
    echo "<td>{$row['as_surname']}</td>";
    echo "<td>{$row['as_firstname']}</td>";
    echo "<td>{$row['as_othername']}</td>";
    echo "<td>{$row['as_classname']}</td>";
    echo "<td>{$row['as_gender']}</td>";
    echo "<td>{$row['as_date_of_birth']}</td>";
    echo "<td>{$row['as_religion']}</td>";

	echo '</tr>';
	}
			
  echo "</table>";
  echo "</div>";
   
  echo '<input type="button" id="print" value="Print" onclick="printPage()">&nbsp;';
  echo '<button type="submit" name="edit" style="background:#00ffee; color:#fff"><a href="edit-students.php">Edit</a></button>&nbsp;';
  echo '<button type="submit" name="delete" style="background:#ff0000; color:#fff" onclick="deleteItem()">Delete</button>';
?>  
</form>
<script type="text/javascript">
 
	 function deleteItem(){
		    confirm("Are you sure you want to delete?");
	   }

  function printPage(){
    // Do print the page
    if (typeof(window.print) != 'undefined') {
        window.print();
    }
}
</script>