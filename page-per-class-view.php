<?php 
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header3.php');
?>
<a href="student.php" class="btn btn-info">Back</a>
<hr>
<?php

if (isset($_POST['query'])) {
 
     $class = $_POST['class'];
//pull out data
    if (!empty($class)) {
      # code...
    
   $results = "SELECT * FROM as_students INNER JOIN as_class USING(as_classid) WHERE as_classid = '$class' ORDER BY as_admission_date DESC";
$query = mysql_query($results);
$row = mysql_fetch_assoc($query);
echo "<h3>Student Information - Class: {$row['as_classname']}</h3>";

 echo '<div class="table-responsive">';
  echo '<table class="table table-striped">';
   echo '<tr><th>Student No.</th><th>Surname</th><th>First Name</th>
            <th>Other Name</th><th>Class</th><th>Gender</th><th>Date of Birth</th><th>Religion</th><tr>';
	$query = mysql_query($results);
	while($row = mysql_fetch_assoc($query)){
    echo '<tr>';

	  echo "<td>TIK101-000{$row['as_studentno']}</td>";
    echo "<td>{$row['as_surname']}</td>";
    echo "<td>{$row['as_firstname']}</td>";
    echo "<td>{$row['as_othername']}</td>";
    echo "<td>{$row['as_classname']}</td>";
    echo "<td>{$row['as_gender']}</td>";
    echo "<td>{$row['as_date_of_birth']}</td>";
    echo "<td>{$row['as_religion']}</td>";
	
    //echo <<<_END
   //      <td><a class="action" href="single.php">View</a>
   //       &nbsp;&nbsp;
		 // <a class="action" href="#">Edit</a>
   //       &nbsp;&nbsp;
   //       <input type="button" class="btn btn-primary" id="delete" value="Delete" onclick="deleteData()"></td>
//_END;

	echo '</tr>';
	}
			
  echo "</table>";
  echo "</div>";
  echo <<<_END
     <input type="button" id="print" value="Print" onclick="printPage()">
_END;
  }else{
    $msg = 'Sorry you must select a class to view the list, Please try again';
    header('Location: student.php?id='.urlencode($msg));
  }
}
?>  

<script type="text/javascript">
 
	 function deleteData(){
		 var deleteData = document.getElementById('delete');
		 	 deleteData.alert("Thanks");
	   }

  function printPage(){
    // Do print the page
    if (typeof(window.print) != 'undefined') {
        window.print();
    }
}
</script>