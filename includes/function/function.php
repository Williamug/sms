<?php
require_once('includes/constant.php');
// This file is a place to keep all basic functions

  function escape_string($value){
	  $magic_quotes_active = get_magic_quotes_gpc();
	  //PHP >= v4.3.0
	  $new_enough_php = function_exists("mysql_real_escape_string");
	  if($new_enough_php){
		  //undo any magic quote effect so mysql_real_escape_string can do the job
		  if($magic_quotes_active){
			  $value = stripslashes($value);
		  }
		  $value = mysql_real_escape_string($value);
		  $value = htmlentities($value);
		  $value = trim($value);
			  }else{
			  //before php v4.3.0
			  if(!$magic_quotes_active){
				  $value = addslashes($value);
		  }
	  }
	  return $value;
  }
  
  function confirm_result($result_set){
	  if(!$result_set){
		  die("Database query failed " . mysql_error());
	  }
  }
  
  function confirm_insert($insert_query){
	  if(!$insert_query){
		  die("Database query failed " . mysql_error());
	  }
  }

  function database_confirmed(){
	if(mysql_errno()){
  	   echo "Error: Database could not connect, Please try again later";
	   exit();
    }else{
  	//echo "Database connected";
    }
  }
?>