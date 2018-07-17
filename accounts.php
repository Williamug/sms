<?php 
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header2.php');
?>
<br><br>
<div class="row">
    <div class="col-md-4"></div>
    <div class="">
        <a href="payment.php" class="btn btn-primary fa fa-bank">&nbsp;&nbsp;School Fees Payment</a>
        <a href="payment-defaulter-perclass.php" class="btn btn-primary fa fa-navicon">&nbsp;&nbsp;Fees Defaulter</a>
        <a href="expense.php" class="btn btn-primary fa fa-line-chart">&nbsp;&nbsp;Expenses</a>
        <a href="expense.php" class="btn btn-primary fa fa-clone">&nbsp;&nbsp;Expenses Category</a>
    </div>
    <div class="col-md-4"></div>
</div>
<hr />
<div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
<?php include("includes/footer.php"); ?>
</div>