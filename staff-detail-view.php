<?php 
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header3.php');
?>
<!-- <a href="employee-manage.php" class="btn btn-info">Back</a> -->

<?php
//pull out data

   $results = "SELECT * FROM as_teacher";
echo "<h3>Staff Information</h3>";
 echo '<div class="table-responsive">';
  echo '<table class="table table-striped">';
   echo '<tr><th>Teacher\'s No.</th><th>Surname</th><th>First Name</th>
            <th>Other Name</th><th>Gender</th><th>Date of birth</th>
              <th>Religion</th><th>Staff Catagory</th><th>Position</th><th>Phone Number</th><tr>';
	$query = mysql_query($results);
	while($row = mysql_fetch_assoc($query)){
    echo '<tr>';

	  echo "<td>TIK1001-000{$row['as_teachers_id']}</td>";
    echo "<td>{$row['as_surname']}</td>";
    echo "<td>{$row['as_firstname']}</td>";
    echo "<td>{$row['as_othername']}</td>";
    echo "<td>{$row['as_gender']}</td>";
    echo "<td>{$row['as_dob']}</td>";
    echo "<td>{$row['as_religion']}</td>";
    echo "<td>{$row['as_staff_catagory']}</td>";
    echo "<td>{$row['as_position']}</td>";
    echo "<td>{$row['as_mobile1']}</td>";
	
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
_END
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






