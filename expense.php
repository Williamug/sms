<?php 
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header2.php');
?>

<?php
     //clear errors
     $err = "";
     $msg = "";

     //init form process
    if (isset($_POST['submit'])) {
        $qty =          $_POST['qty'];
        $particular =   $_POST['particular'];
        $amount =       $_POST['amount'];
        $comment =      $_POST['comment'];

        //validation
        if (!empty($qty) && !empty($particular) && !empty($amount) && !empty($comment)) {
            // perform query
            $query = "INSERT INTO as_expenses(as_date, as_qty, as_particular, as_amount, as_comment) 
                      VALUES(NOW(), '$qty', '$particular', '$amount', '$comment')";
            $results = mysql_query($query);
            confirm_insert($results);
            $msg = "Submission was sucessful";
            header('Location: expense.php?msg= ' . urldecode($msg));
        }else{
       $err = "Please check to see that no information missing";   
      }   
    }  
?>
<a href="accounts.php" class="btn btn-info">Back</a>
<?php
   echo "<div>{$err}<div>";
   echo "<div class=\"alert alert-sucess\">{$msg}</div>";
?>
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
<div class="as_container">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="row">
     <div class="col-md-3">
     </div>
     <div class="col-md-4">
	
		<div class="form-group">
			<label for="qty">Quantity</label><br>
			<input type="text" name="qty" value="<?php if(!empty($_POST['qty'])) echo $_POST['qty']; ?>" class="" size="70" id="qty">
		</div>
		<div class="form-group">
			<label for="particular">Particular</label><br>
			<textarea cols="70" rows="2" name="particular" value="<?php if(!empty($_POST['particular'])) echo $_POST['particular']; ?>" id="particular"></textarea>
		</div>
		
		<div class="form-group">
			<label for="amount">Amount</label><br>
			<input type="text" name="amount" value="<?php if(!empty($_POST['amount'])) echo $_POST['amount']; ?>" class="" size="70" id="amount">
		</div>
		<div class="form-group">
			<label for="comment">Comment</label><br>
			<textarea cols="70" rows="3" name="comment" value="<?php if(!empty($_POST['comment'])) echo $_POST['comment']; ?>" id="comment"></textarea>
		</div>
				

				<br>
				<div class="row">
				  <div class="col-md-6">
				    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
				  </div>
				  <div class="col-md-6">
				     <button type="reset" class="btn btn-danger">Cancel</button>
				  </div>
				</div>
			 </div>
			   
	      
	    <div class="col-md-5">
	    </div>
	    </div>
</form>
</div>
<br><br><br><br>
<?php include_once("includes/footer.php"); ?>
