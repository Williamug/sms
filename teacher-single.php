<?php
require_once('includes/session.php');
require_once('includes/constant.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once("includes/header2.php"); 
?>

<?php

if(isset($_GET['submit'])){
	
    //search
	echo $err = "";
	$search_box = $_GET['search_box'];
    //fetch data
	if(!empty($search_box)){
    $results= "SELECT * FROM as_teacher WHERE as_surname LIKE '%$search_box%' OR as_firstname LIKE '%$search_box%'";
    $query = mysql_query($results);
    confirm_result($query);
	
   if(mysql_num_rows($query) >= 1){
        while($row = mysql_fetch_array($query)){
			$image_location = AS_UPLOADPATH . $row['as_passport'];
           echo <<<_END
           <a href="staff-view.php" class="btn btn-info">Back</a>
           <h2>TEACHER'S INFORMATION</h2>
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
			                
			                <label>Teacher's Number: </label><br>TIK1001-000{$row['as_teachers_id']}<br><br>				            
				            <label>Surname:</label><br>{$row['as_surname']}<br><br>
				            <label>First Name:</label><br>{$row['as_firstname']}<br><br>
				            <label>Other Names:</label><br>{$row['as_othername']}<br><br>
				            <label>Gender:</label><br>{$row['as_gender']}<br><br>
				            <label>Date of birth:</label><br>{$row['as_dob']}<br><br>
						    <label>Religion:</label><br>{$row['as_religion']}<br><br>
						    
						</div>
					</div>
					<div class="col-md-5">
					  <br>
					    <div class="page bio-side">
					        <label>Staff Catagory:</label><br>{$row['as_staff_catagory']}<br><br>
					        <label>Position:</label><br>{$row['as_position']}<br><br>
						    <label>Core Subject:</label><br>{$row['as_core_subj']}<br><br>
						    <label>Other Subject (if any):</label><br>{$row['as_other_subj']}<br><br>
						    <label>Nationality:</label><br>{$row['as_national']}<br><br>
						    <label>Date Joined:</label><br>{$row['as_date_join']}<br><br>
						    <label>Contact:</label><br>{$row['as_mobile1']}<br><br>
						    <label>Mobile:</label><br>{$row['as_mobile2']}<br><br>
						    <label>Email:</label><br>{$row['as_email']}<br><br>
						    <label>Physical Address:</label><br>{$row['as_physical_address']}<br><br>
						    <label>District:</label><br>{$row['as_district']}<br><br>
						    
						</div>
					</div>	
			</div>
_END;
       }
	  }else{
		 echo '<span class="noresult">Sorry, the Employee you are looking for is not in the system. <a href="staff-view.php">Click here to go Back</a></span>'; 
	  }
	}else{
	    $err = "Please type either the Surname or First Name of the Employee, Thank you";
	    header('Location: staff-view.php?search=' . urlencode($err));
    }
  }


?>
<br><br><br><br><br><br><br><br><br>
<?php include("includes/footer.php"); ?>