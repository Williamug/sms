<?php 
require_once('fpdf/fpdf.php');
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header3.php');
?>

<?php
echo "<h3>School Library Records</h3>";
//books in DB
 $query = "SELECT * FROM as_library INNER JOIN as_subjects USING(as_subject_id) INNER JOIN as_class USING(as_classid)";
 $res = mysql_query($query);
 confirm_result($res);
echo '<div class="table-responsive">';
  echo '<table class="table table-striped">';
   echo '<tr><th>Book Name</th><th>Author</th>
            <th>Subject</th><th>Class</th><th>No. of copies</th><th>ISBN</th><tr>';
 while ($book = mysql_fetch_assoc($res)) {
 	echo '<tr>';
 	//echo "<td>{$book['as_bookno']}</td>";
 	echo "<td>{$book['as_book_name']}</td>";
 	echo "<td>{$book['as_author']}</td>";
 	echo "<td>{$book['as_subjectname']}</td>";
 	echo "<td>{$book['as_classname']}</td>";
 	echo "<td>{$book['as_total_copy']}</td>";
 	echo "<td>{$book['as_ISBN']}</td>";
 	
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

