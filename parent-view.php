<?php 
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
 include_once('includes/header3.php');

?>

<?php
//pull out data

   $results = "SELECT  as_surname, as_firstname, as_fathername, as_mothername, 
                       as_guardianname, as_physical_address, as_district, as_contact, 
                       as_mobile, as_email FROM as_students";
               
                     
    echo "<h3>Parents' Information</h3>";                 

 echo '<div class="table-responsive">';
  echo '<table class="table table-striped">';
   echo '<tr><th>Father\'s Name</th><th>Mother\'s Name</th><th>Guardian\'s Name</th>
            <th>Student\'s Surname</th><th>Student\'s First Name</th><th>Physical Address</th>
            <th>District</th><th>Contact</th><th>Email Address</th><tr>';
              
	$query = mysql_query($results);
	while($row = mysql_fetch_assoc($query)){
    echo '<tr>';

	echo "<td>{$row['as_fathername']}</td>";
    echo "<td>{$row['as_mothername']}</td>";
    echo "<td>{$row['as_guardianname']}</td>";
    echo "<td>{$row['as_surname']}</td>";
    echo "<td>{$row['as_firstname']}</td>";
    echo "<td>{$row['as_physical_address']}</td>";
    echo "<td>{$row['as_district']}</td>";
    echo "<td>{$row['as_contact']}</td>";
    echo "<td>{$row['as_email']}</td>";
	
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