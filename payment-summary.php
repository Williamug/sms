<?php
require_once('includes/session.php');
require_once('includes/constant.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once("includes/header2.php"); 
?>
<a href="payment-records.php" class="btn btn-info">Back</a>
<?php

if(isset($_GET['id'])){
	$surname = $_GET['id'];
    
    //fetch data

    $results= "SELECT * FROM as_payments INNER JOIN as_students USING(as_studentno) INNER JOIN as_class USING(as_classid)";
    $query = mysql_query($results);
    confirm_result($query);
	 while($row = mysql_fetch_array($query)){
			$image_location = AS_UPLOADPATH . $row['as_photo'];
           echo <<<_END
           
           <h4>STUDENT PAYMENT SUMMARY</h4>
           <br><br>
           <div class="row">
           <div class="col-md-4">
          <div class="page image-side">
               <img src="{$image_location}" width="200" height="200">
               <h4>TIK101-000{$row['as_studentno']}</h4>
               <h3 class="page_name">{$row['as_surname']} {$row['as_firstname']} {$row['as_othername']}</h3><br>
               <h4>Class: {$row['as_classname']}</h4>
               <hr>
            </div>
          </div>
          <div class="col-md-8">
            <h5>Summary</h5>
			 <hr>	
_END;
    echo '<div class="table-responsive">';
		echo '<table class="table table-striped">';
		echo '<tr><th>Date</th><th>Payment Type</th><th>Payment</th><th>Balance</th><tr>';
        echo '<tr>';
		echo "<td>{$row['as_date']}</td>";
		echo "<td>{$row['as_reason']}</td>";
		echo "<td>{$row['as_shs']}</td>";
		echo "<td>{$row['as_balance']}</td>";
		echo '</tr>';
        echo "</table>";
        echo "</div>";
        
echo "</div>";
  echo "</div>";
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