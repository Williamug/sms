<?php
 require_once("includes/session.php");
// student admission processing
//database connection
require_once('includes/constant.php');
require_once('includes/function/function.php'); 
require_once('includes/dbconnect.php');

?>
<?php
//Delete
if (isset($_POST['delete'])) {
	
	if (!empty($_POST['action'])) {
	
	foreach ($_POST['action'] as $delete) {
		$query = "DELETE FROM as_students WHERE as_studentno = $delete";
		mysql_query($query);
	}
	$msg = "Student successfully deleted";
    header('Location: student_results.php?msg=' . urlencode($msg));
  }else{
  	$err = "You must check atleast one person.";
    header('Location: student_results.php?err=' . urlencode($err));
  }
}
?>