<?php require_once('includes/constant.php'); ?>
<?php require_once('includes/function/function.php'); ?>

<?php
  
  $conn = mysql_connect(DB_HOST,DB_USER, DB_PASS); 
   database_confirmed();

  if(mysql_select_db(DB_NAME)){
     //echo "Database ready to use";
  }else{
  	echo "Error: Server error, Could not select database";
	exit();
  }
?>
