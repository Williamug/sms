<?php
require_once('includes/session.php');
require_once('includes/constant.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once("includes/header2.php"); 
?>
<a href="student.php" class="btn btn-info">Back</a>
<?php

if(isset($_GET['submit'])){
	
    //search
	echo $err = "";
	$search_box = $_GET['search_box'];
    //fetch data
	if(!empty($search_box)){
    $results= "SELECT * FROM as_students INNER JOIN as_class USING(as_classid) WHERE as_surname LIKE '%$search_box%' OR as_firstname LIKE '%$search_box%' OR as_studentno LIKE '%$search_box%'";
    $query = mysql_query($results);
    confirm_result($query);
	
   if(mysql_num_rows($query) >= 1){
        while($row = mysql_fetch_array($query)){
			$image_location = AS_UPLOADPATH . $row['as_photo'];
           echo <<<_END
           
           <h2>STUDENT INFORMATION</h2>
           <br><br>
             <div class="row">
	                <div class="col-md-3">
				            <div class="page image-side">
				               <img src="{$image_location}" width="200" height="200">
				               <h3 class="page_name">{$row['as_surname']} {$row['as_firstname']}</h3>
				            </div>
				           

			        </div>
			        <div class="col-md-4">
			         <br>
			            <div class="page bio-side">
			                <label>Admission Date:</label><br>{$row['as_admission_date']}<br><br>
			                <label>Student's Number: </label><br>TIK101-000{$row['as_studentno']}<br><br>				            
				            <label>Surname:</label><br>{$row['as_surname']}<br><br>
				            <label>First Name:</label><br>{$row['as_firstname']}<br><br>
				            <label>Other Names:</label><br>{$row['as_othername']}<br><br>
				            <label>Class:</label><br>{$row['as_classname']}<br><br>
				            <label>Gender:</label><br>{$row['as_gender']}<br><br>				            
				            <label>Date of birth:</label><br>{$row['as_date_of_birth']}<br><br>
						    <label>Religion:</label><br>{$row['as_religion']}<br><br>
						    
						</div>
					</div>
					<div class="col-md-5">
					  <br>
					    <div class="page bio-side">
					        <label>Nationality:</label><br>{$row['as_nationality']}<br><br>
					        <label>Father's Name:</label><br>{$row['as_fathername']}<br><br>
						    <label>Mother's Name:</label><br>{$row['as_mothername']}<br><br>
						    <label>Guardian's Name:</label><br>{$row['as_guardianname']}<br><br>
						    <label>Physical Address:</label><br>{$row['as_physical_address']}<br><br>
						    <label>District:</label><br>{$row['as_district']}<br><br>
						    <label>Contact:</label><br>{$row['as_contact']}<br><br>
						    <label>Mobile:</label><br>{$row['as_mobile']}<br><br>
						    <label>Email:</label><br>{$row['as_email']}<br><br>
						    
						</div>
					</div>	
			</div>
_END;
       }
	  }else{
		 echo '<span class="noresult">Sorry, the child you are looking for is not in the system. <a href="student.php">Click here to go Back</a></span>'; 
	  }
	}else{
	    $err = "Please type either the Surname or First Name of the child, Thank you";
	    header('Location: student.php?search=' . urlencode($err));
    }
  }

?>

<br><br><br><br><br><br><br><br><br>
<script type="text/javascript">
 function printPage(){
    // Do print the page
    if (typeof(window.print) != 'undefined') {
        window.print();
    }
}
</script>
<?php include("includes/footer.php"); ?>