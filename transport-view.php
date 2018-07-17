<?php 
require_once('fpdf/fpdf.php');
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header3.php');
?>

<?php
echo "<h3>School Transport</h3>";
//books in DB
 $query = "SELECT * FROM as_transport INNER JOIN as_teacher USING(as_teachers_id)";
 $res = mysql_query($query);
 confirm_result($res);
echo '<div class="table-responsive">';
  echo '<table class="table table-striped">';
   echo '<tr><th>Passport Photo</th><th>Name</th><th>Plate No</th>
            <th>Route</th><th>Contact</th><th>Mobile</th><th>Physical Address</th><tr>';
 while ($tp = mysql_fetch_assoc($res)) {
  $image_location = AS_UPLOADPATH . $tp['as_passport'];
 	echo '<tr>';
 	echo '<td><img src="' . $image_location . '" width="70" height="70" class="img-circle"></td>';
 	echo "<td>{$tp['as_surname']}&nbsp;{$tp['as_firstname']}&nbsp;{$tp['as_othername']}</td>";
 	echo "<td>{$tp['as_plateNo']}</td>";
 	echo "<td>{$tp['as_route']}</td>";
 	echo "<td>{$tp['as_mobile1']}</td>";
 	echo "<td>{$tp['as_mobile2']}</td>";
 	echo "<td>{$tp['as_physical_address']}</td>";
 	
 	echo '</tr>';
 }
 echo "</table>";
  echo "</div>";
?>
<input type="button" id="print" value="Print" onclick="printPage()">
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

