<?php 
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
 include_once('includes/header3.php');

?>

<?php
//delete data
if (isset($_POST['submit'])) {
  $delete = $_POST['delete'];

   if (!empty($delete)) {
  
   $query = "DELETE FROM as_class WHERE as_classname = '$delete'";
   mysql_query($query) or die("Failed to delete data");
   header('Location: class.php');
    }else{
      echo 'You must select a class';
    }
 }
?>