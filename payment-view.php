<?php 
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header2.php');
?>
<a href="accounts.php" class="btn btn-info">Back</a>

<h4 align="center">Receipt</h4>
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

  <?php
    // select data
      $query = "SELECT * FROM as_students INNER JOIN as_payments ON as_students.as_studentno = as_payments.as_studentno INNER JOIN as_class USING(as_classid) ORDER BY as_date DESC";
      $results = mysql_query($query);
      confirm_result($results);
         
    
     // fetch data
      while ($row = mysql_fetch_array($results)) {
      	$image_location = AS_UPLOADPATH . $row['as_photo'];

         $total = 300000;
         $bal = $total - $row['as_shs'];


      	echo '<div class="table-responsive">';
        echo '<table class="table table-striped">';
           echo <<<_END
       <div class="row">
       <div class="col-md-1"></div>
       <div class="col-md-3">    
           <img src="images/as_logo.png" width="150" height="150">
       </div>
       <div class="">
           <h2>AllSchool ACADEMY</h2>
           <address>
           <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;P.O.Box 0987 Kampala Uganda</li>
           <li>Tel: +256 751 728776 | +256 784 390027</li>
           <li>&nbsp;&nbsp;Email: info@creativesummitug.com</li>
           <li>Website: wwww.creativesummitug.com</li>
           </address>
       </div>
       </div>
	      	<h3 align="center">Receipt</h3>
	     <div class="row"> 
	        <div class="col-md-1"></div>	
	        <div class="col-md-8">
		        Receipt No. <span id="receipt-id">{$row['as_recieptid']}</span>
		    </div>
		    <div class="col-md-3">
		       Date: {$row['as_date']}<br>
		       Student No. <span style="color:blue">TIK101-000{$row['as_studentno']}</span>
		    </div>
         </div>
        
          
         
         <br><br>
         <br>
         <div class="col-md-1"></div>
         <div class="">
        <label>RECEIVED from: </label>
	             
	                <span class="as_underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;{$row['as_surname']} &nbsp;{$row['as_firstname']}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$row['as_classname']}
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </div>
                <div class="col-md-1"></div>
                <div>
	               <label>The sum of shillings:</label>
	                <span class="as_underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp; {$row['as_amount']}
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                
	                </span>
                </div>
                <div class="col-md-1"></div>
                <div>
	               <label>Being payment of:</label>
	               
	               <span class="as_underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;{$row['as_reason']}
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </div>
                <div class="col-md-1"></div>
                <div>
	               <label>Cash/ Cheque No. </label>
	               
	               <span class="as_underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;
_END;
                    if ($row['as_typeOfPayment'] == 'cheque') {
                    	echo $row['as_chequeno'];
                    }else{
                    	echo 'Cash';
                    }
	                

	       echo <<<_END
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4">
	               <label>Shs: </label>
	             
	              <span class="as_underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;{$row['as_shs']}
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </div>
                <div class="col-md-1"></div>
                <div>
	               <label>Balance: </label>
	               <span class="as_underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
_END;
  
                    if ($bal == (300000 - 300000)) {
				         	echo 'Nil';
				         }else{
				         	echo $bal;
				         }
				echo <<<_END
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4">
	               <label><i>With Thanks</i> </label>
                </div><div class="col-md-1"></div>
                <div>
	               <label>Sign: </label>
	               <span class="as_underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
	                <br />
	                <div class="row">
	                <div class="col-md-7"></div>
	                <span>for: <i>AllSchool ACADEMY</i><span>
	                </div>
                </div>
            </div>
          </div>
        </div> 
    
       

            </div>
          </div>
        </div> 
       </tr>
  

_END;
      }
   echo  "</table>"; 
   echo  "</div>";
  ?>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> 
</div>
<br>



<?php include_once("includes/footer.php"); ?>















