<?php 
require_once('includes/session.php');
require_once('includes/constant.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header2.php');
?>
<a href="accounts.php" class="btn btn-info">Back</a>
<div>
 <div class="col-md-9"><h3><i class="fa fa-gear">&nbsp;Student Payment Records</i></h3></div><br><br>
</div>
  <br><br><br>

<div class="col-md-4"></div>
 <nav class="container-fluid" id="payment-nav">
   <ul navbar-nav>
      <div class="col-md-2">
       <li class="payment-li"><a href="payment.php">Create Fees Payment</a></li>
    </div>
    <div class="col-md-2">
       <li class="payment-li"><a href="payment-view.php">View Receipts</a></li>
    </div>
    <div>
       <li class="payment-li"><a href="payment-records.php">Student Payment Records</a></li>
    </div>
   </ul>
</nav>

<!-- <div class="as_container"> -->
<br>
     <?php
        $select = "SELECT * FROM as_payments INNER JOIN as_students USING(as_studentno)";
        $results = mysql_query($select);

         echo '<div class="table-responsive col-md-10">';
		  echo '<table class="table table-striped">';
		   echo '<tr><th>Student</th><th>Title</th><th>Total</th><th>Paid</th><th>Balance</th><th>Date</th><tr>';
        while ($Payment = mysql_fetch_assoc($results)) {
        	echo '<tr>';
		    echo "<td><a href='payment-summary.php?id=".$Payment['as_surname']."'>{$Payment['as_surname']}&nbsp;{$Payment['as_firstname']}&nbsp;{$Payment['as_othername']}</a></td>";
		    echo "<td>{$Payment['as_reason']}</td>";
		    echo "<td>{$Payment['as_totalbal']}</td>";
		    echo "<td>{$Payment['as_shs']}</td>";
        echo "<td>{$Payment['as_balance']}</td>";
        echo "<td>{$Payment['as_date']}</td>";
		    echo '</tr>';
        }
        echo "</table>";
         echo "</div>";
     ?>
<br>
<!-- </div> -->