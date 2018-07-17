<?php 
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header4.php');
?>
<?php
    // select data
      $query = "SELECT * FROM as_students INNER JOIN as_payments ON as_students.as_studentno = as_payments.as_studentno INNER JOIN as_class USING(as_classid) ORDER BY as_date DESC";
      $results = mysql_query($query);
      confirm_result($results);
         
    
     // fetch data
      $row = mysql_fetch_array($results);
      	$image_location = AS_UPLOADPATH . $row['as_photo']; 

         $total = 300000;
         $bal = $total - $row['as_shs'];


      	
        echo '<table class="table-view table table-striped">';
           echo <<<_END
		    <tr>
		       <td>
			       <div class="row">
			       <div class="col-md-1"></div>
			       <div class="col-md-3">    
			           <img src="images/as_logo.png" width="150" height="150">
			       </div>
		       </td>
		       <td>
			       <div class="">
			           <h2>&nbsp;&nbsp;&nbsp;AllSchool ACADEMY</h2>
			           <address>
			           <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;P.O.Box 0987 Kampala Uganda</li>
			           <li>Tel: +256 751 728776 | +256 784 390027</li>
			           <li>&nbsp;&nbsp;Email: info@creativesummitug.com</li>
			           <li>Website: wwww.creativesummitug.com</li>
			           </address>
			       </div>
			       </div>
		       </td>
		    </tr>
       </table>
     
       <table>
         <tr>
	      	<h3 align="center">Receipt</h3>
	     </tr>
	   </table> 

	  <table class="table table-striped">
	   <tr>
	      
			<td>  Receipt No. <span id="receipt-id">{$row['as_recieptid']}</span><br><br>
		 
			  Date: {$row['as_date']}<br>
			  Student No. <span style="color:blue">TIK101-000{$row['as_studentno']}</span></td>
		    
        </tr>
      
        <tr>
          <td>
         <label>RECEIVED from: </label>
	             
	                <span class="as_underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;{$row['as_surname']} &nbsp;{$row['as_firstname']}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$row['as_classname']}
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	               </span>
                </td>
            </tr>
            <tr>    
                <td>
                <div>
	               <label>The sum of shillings:</label>
	                <span class="as_underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp; {$row['as_amount']}
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;
	                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                </span>
                </div>
                </td>
                
             </tr>
             
             <tr>
               <td>
                <div>
	               <label>Being payment of:</label>
	               
	               <span class="as_underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;{$row['as_reason']}
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	               </span>
                </div>
              </td>
              
            </tr>
            
            <tr>
             <td>
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
            </td>
            
          </tr>
          </table>
          <table class="table table-striped">
          <tr>
            <td>  
                
	               <label>Shs: </label>
	             
	              <span class="as_underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;{$row['as_shs']}
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <br>
                <label><i>With Thanks</i> </label>
            </td>
            <td>
                
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
                <br>
                
             
                 <label>Sign: </label>
	               <span class="as_underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
	                
	                <br />
	              <span>for: <i>AllSchool ACADEMY</i><span>
	        </td>
        </tr>
       

_END;

   echo  "</table>"; 
   
  ?>
  <input type="button" id="print" value="Print" onclick="printPage()">
  
<script type="text/javascript">
 
	 function deleteData(){
		 var deleteData = document.getElementById('delete');
		 	 deleteData.alert("Thanks");
	   }

  function printPage(){
    // Do print the page
    if (typeof(window.print) != 'undefined') {
        window.print();
    }
}
</script>