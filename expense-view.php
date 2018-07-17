<?php 
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header2.php');

?>
<a href="accounts.php" class="btn btn-info">Back</a>
<div class="row">
<div class="col-md-5"></div>
<div class="">
 <?php
$image_location = AS_UPLOADPATH . 'as_logo.jpg'; 
echo '<img src="' . $image_location . '" width="150" height="150" >';
?>
</div>
</div>
<h4 align="center">School Expenses</h4>

<div class="col-md-4"></div>
 <nav class="container-fluid" id="payment-nav">
	 <ul navbar-nav>
	    <div class="col-md-2">
		   <li class="payment-li"><a href="expense.php">Expenses</a></li>
		</div>
		   <li class="payment-li"><a href="expense-view.php">View</a></li>
	 </ul>
</nav>
  <iframe frameborder="0" src="expense-iframe.php" width="1100" height="900"></iframe>
<br><br><br><br>
<?php include_once("includes/footer.php"); ?>
