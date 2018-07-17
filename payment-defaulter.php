<?php 
require_once('includes/session.php');
require_once('includes/constant.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header2.php');
?>
<a href="accounts.php" class="btn btn-info">Back</a>
<div>
 <div class="col-md-9"><h3><i class="fa fa-gear">&nbsp;School Fees Defaulter</i></h3></div><br><br>
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
<iframe frameborder="0" src="payment-defaulter-print.php" width="1100" height="900"></iframe>
<!-- <div class="as_container"> -->

<!-- </div> -->