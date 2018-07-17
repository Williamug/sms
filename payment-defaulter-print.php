<?php 
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header3.php');

?>
<div>
<a href="payment-defaulter-perclass.php" class="btn btn-info">Back</a>   
</div>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-10">
     <?php
     if (isset($_POST['query'])) {

     $class = $_POST['class'];
//pull out data
    if (!empty($class)) {
      $select = "SELECT * FROM as_payments INNER JOIN as_students USING(as_studentno) INNER JOIN as_class USING(as_classid) WHERE as_classid = '$class'";
   
        $results = mysql_query($select);
       $Payment = mysql_fetch_assoc($results);

   echo "<h3>{$Payment['as_classname']} Class Fees defaulters</h3>";
       echo '<div class="row">';
         echo '<div class="table-responsive col-md-10">';
		  echo '<table class="table table-striped">';
		   echo '<tr><th>Student</th><th>Balance</th><tr>';
        echo '<tr>';
          $results = mysql_query($select);
            while ($Payment = mysql_fetch_assoc($results)) {
            if ($Payment['as_balance'] != 0 && $Payment['as_balance'] != '') {
             
        	echo "<td>{$Payment['as_surname']}&nbsp;{$Payment['as_firstname']}&nbsp;{$Payment['as_othername']}</td>";
		    echo "<td>{$Payment['as_balance']}</td>";
            echo '</tr>';
          }
        }
        echo "</table>";
         echo "</div>";
         echo '</div>';
       echo <<<_END
     <input type="button" id="print" value="Print" onclick="printPage()">
_END;
  }
}
    ?>
</div>
</div>

<script type="text/javascript">
  function printPage(){
    // Do print the page
    if (typeof(window.print) != 'undefined') {
        window.print();
    }
}
</script>


 
   