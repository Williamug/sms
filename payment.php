<?php 
require_once('fpdf/fpdf.php');
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header2.php');
?>

<?php
   $err = "";
   if(isset($_POST['submit'])){
   	// form data
       $surname =     escape_string($_POST['surname']);
       $firstname =   escape_string($_POST['firstname']);
       $class =       escape_string($_POST['class']);
       $amount =      escape_string($_POST['amount']);
       $reason =      escape_string($_POST['reason']);
       $shs =         htmlentities(escape_string($_POST['shs']));
       //$balance =     htmlentities(escape_string($_POST['balance']));
       $type =        $_POST['type'];
       $chequeno =    escape_string($_POST['chequeno']);

       //clear errors
      

    //Validation
       if (!empty($amount) && !empty($surname) && !empty($reason) && !empty($type)) {
       	//query the database
       	
       	$query = "SELECT * FROM as_students WHERE as_surname = '$surname' AND as_firstname = '$firstname'";
       	    $result = mysql_query($query);
       	    confirm_result($result);

       	    //fetch data
       	    if (mysql_num_rows($result) > 0) {
       	    	$row = mysql_fetch_assoc($result);

       	    	 $studentno = $row['as_studentno'];
       	    	              $row['as_surname'];
       	    	              $row['as_firstname'];
       	    	              $row['as_classid'];
                      
                
                 $total = 300000;
                 $bal = $total - $shs;

       	    	$query2 = "INSERT INTO  as_payments(as_date, as_studentno, as_amount, as_reason, as_totalbal, as_shs, as_balance, as_typeOfPayment, as_chequeno) 
       	    	                    VALUES(NOW(), $studentno, '$amount', '$reason', '$total', '$shs', '$bal', '$type', '$chequeno')";
       	        $result2 = mysql_query($query2);
       	        confirm_insert($result2);


       	        echo '<div class="alert alert-success">Thank you for making payments. Please Scroll down to print the Receipt</div>';

       	   }else{
       	    $err = "<div class=\"alert alert-danger\">Student not found in the System. Please check the spelling and try again or you need to admit the child</div>";
       	   }
       }else{
       	$err = '<div class="alert alert-danger">Please fill in missing values</div>';
       }
          
             
   
   }
?>

<a href="accounts.php" class="btn btn-info">Back</a>
  <?php
  echo $err;
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
<h4 align="center">Receipt - School Fees Payment</h4>
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

<div class="as_container">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="row">
     <div class="col-md-3">
     </div>
     <div class="col-md-4">
		<div class="form-group">
			<label for="surname">Surname</label><br>
			<input type="text" name="surname" value="<?php if(!empty($_POST['surname'])) echo $_POST['surname']; ?>" class="" size="70" id="surname">
		</div>
		<div class="form-group">
			<label for="surname">First Name</label><br>
			<input type="text" name="firstname" value="<?php if(!empty($_POST['firstname'])) echo $_POST['firstname']; ?>" class="" size="70" id="surname">
		</div>
		<div class="form-group">
			<label for="surname">Class</label><br>
			<input type="text" name="class" value="<?php if(!empty($_POST['class'])) echo $_POST['class']; ?>" class="" size="70" id="surname">
		</div>
		<div class="form-group">
			<label for="surname">Amount in words</label><br>
			<input type="text" size="70" name="amount" placehplder="Amount in words">
		</div>
		
		<div class="form-group">
			<label for="surname">Being payment for</label><br>
			<select class="form-control" name="reason">
				<option>--select--</option>
				<option>School fees</option>
				<option>Transport</option>
				<option>Uniform</option>
				<option>Lunch</option>
			</select>
		</div>
				 
				<div class="form-group">
					<label for="surname">Shs.</label><br>
					<input type="text" name="shs" size="70" class="" value="<?php if(!empty($_POST['shs'])) echo $_POST['shs']; ?>" id="surname" placeholder="Amount in figures, Don't put commas">
				    
				</div>
		
				<!-- <div class="form-group">
					<label for="surname">Balance</label><br>
					<input type="text" name="balance" class="" size="70" id="surname">
				</div> -->
				<div class="form-group" id="radio">

					<label><input type="radio" name="type" value="cash" id="cash" checked="checked">&nbsp;&nbsp;Cash</label>
					<label><input type="radio" name="type" value="cheque" id="cheque">&nbsp;&nbsp;Cheque No.</label>
				</div>
			    <div class="form-group" id="check">
			         <i>Please provide cheque No.</i>
					<input type="text" name="chequeno" class="" size="70" id="cheque_field">
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
<br>
<hr>
<iframe name="iframeContent" frameborder="0" src="payment-single.php" width="1100" height="900"></iframe>


<?php include_once("includes/footer.php"); ?>
