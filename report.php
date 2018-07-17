<?php 
require_once('includes/session.php');
require_once('includes/constant.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header4.php');
?>
<a href="generate-report.php" class="btn btn-info">Back</a>
<div class="container">
<table class="table-view table">
  <tr>
    <td>
         <?php 
        if (isset($_POST['query'])) {
             $class = $_POST['class'];

             if (!empty($class)) {

              $query = "SELECT * FROM as_students INNER JOIN  as_marks USING(as_studentno)";
          $results = mysql_query($query);
          confirm_result($results);

           $row = mysql_fetch_assoc($results);

         $image_location = AS_UPLOADPATH . 'as_logo.jpg'; 
    	    echo '<img src="' . $image_location . '" width="150" height="150">';
          ?>
       </td>      
        <td> 
    	    <h2 class="as_title">AllSchool ACADEMY</h2>
          <i class="as_title">Education For All</i>
        </td>
        <td>
	   <address>
      <ul> 
        <li>Plot 896 Makerere Kavule Bombo road next to Marie Stopes</li>
        <li>P.O.Box 0987, Kampala (U)</li>
        <li>Tel: +256 751 728776 | +256 784 390027</li>
        <li>Email: info@creativesummitug.com</li>
        <li>Website: wwww.creativesummitug.com</li> 
      </ul>
    </address>
    </td>
   </tr> 
</table>
<div>
	<h4>REPORT CARD FOR P.1 TO P.3 (THEMATIC CURRICULUM)</h4>
</div>
<div>
   <div class="row">
	    <div class="">
	    	<?php 

        $query = "SELECT * FROM as_students INNER JOIN  as_marks USING(as_studentno) INNER JOIN as_class USING(as_classid) INNER JOIN as_term USING(as_termid)  ";
          $results = mysql_query($query);
          confirm_result($results);

           $row = mysql_fetch_assoc($results);
              $image_location_std = AS_UPLOADPATH . $row['as_photo']; 
              $std_class = $row['as_classname'];
    echo '<table class="table-view table table-stripe">';
    echo '<tr>';
     echo '<td>';
	    	echo '<div class="col-md-3"><img src="' . $image_location_std . '" width="100" height="100" class="img-circle" alt="Pupil\'s Image here"></div>'; 
     echo '<td>'; 
      ?>

	    </div>
	    <div class="">
	    	<?php 

       
        
           echo <<<_END
            <br><br><br>
           <div class="as_detail">Pupil's ID No. <span class="as_detail_two" id="as_detail_two">TIK101-000{$row['as_studentno']}</span></div>
           <td>
           <br><br><br>
           <div class="col-md-3" id="as_names">{$row['as_surname']}&nbsp;&nbsp;{$row['as_firstname']}&nbsp;&nbsp;{$row['as_othername']}</div>
           </td>
           <td>
           <br><br><br>
           <div class="as_detail">Class: <span class="as_detail_two">{$std_class}</span></div>
           </td>
           </tr>
           </table>
           <table class="table-view table table-striped">
              <tr>
                <td>
                <div class="col-md-3"></div>
                 <div class="as_detail">Term: <span class="as_detail_two" >{$row['as_term']}</span></div>
                </td>
                <td> 
                 <div class="as_detail">Position: <span class="as_detail_two" ></span></div>
                </td>
_END;
               $class = $_POST['class'];
               $tot_Std = mysql_query("SELECT COUNT(*) AS as_classid FROM as_students WHERE as_classid = '$class'");
               $row_studentno = mysql_fetch_assoc($tot_Std);

              echo<<<_END
                <td>
                 <div class="as_detail">out of: &nbsp;<span class="as_detail_two" >{$row_studentno['as_classid']}</span></div>
                </td>
              </tr>
           </table>
_END;
         
        ?>
	    </div>
   </div>
  <div id="line"></div>
</div>

<!-- Report table goes here -->
<div>
	
<?php

  // select from database
$query = "SELECT * FROM as_marks INNER JOIN as_students  USING(as_studentno)INNER JOIN as_subjects USING(as_subject_id)";
$results = mysql_query($query);
confirm_result($results);
$std_class = $row['as_classname'];

// loop
echo <<<_END
  <div class="table-responsive">
   <table id="" class="marks_tbl table table-striped">
      <tr>
        <th>Subject</th>
       <th>B.O.T</th>
        <th>MID TERM</th> 
        <th>E.O.T</th>
        <th>Final</th>
        <th>Grade</th>
        <th>Comment</th>
        <th>Sign</th>
      </tr>
_END;
while ($row = mysql_fetch_assoc($results)) {
	$image_location_std = AS_UPLOADPATH . $row['as_photo']; 
	
 $Tfinal = ($row['as_bot'] + $row['as_mid'] + $row['as_eot'])/3;
 $final =ceil($Tfinal);

 
	echo <<<_END
	  <tr>
	    <td>{$row['as_subjectname']}</td>
	    <td>{$row['as_bot']}</td>
	    <td>{$row['as_mid']}</td>
	    <td>{$row['as_eot']}</td>
	    <td>{$final}</td>
	    <td>
_END;
         if ($final >= 0 && $final <= 34) {
           echo '<div style="color:#ff0000" class="as_d">F9</div>';
         }elseif ($final >= 35 && $final <= 39) {
           echo '<div style="color:#000000" class="as_d">P8</div>';
         }elseif ($final >= 40 && $final <= 49){
           echo '<div style="color:#000000" class="as_d">P7</div>';
         }elseif ($final >= 50 && $final <= 54){
           echo '<div style="color:#1d31f4" class="as_d">C6</div>';
         }elseif ($final >= 55 && $final <= 59){
           echo '<div style="color:#1d31f4" class="as_d">C5</div>';
         }elseif ($final >= 60 && $final <= 64){
           echo '<div style="color:#1d31f4" class="as_d">C4</div>';
         }elseif ($final >= 65 && $final <= 69){
           echo '<div style="color:#1d31f4" class="as_d">C3</div>';
         }elseif ($final >= 70 && $final <= 74){
           echo '<div style="color:#21e30c" class="as_d">D1</div>';
         }elseif ($final >= 75 && $final <= 100){
           echo '<div style="color:#21e30c" class="as_d">D1</div>';
         }
          
   echo "</td>
	    <td>{$row['as_comment']}</td>
      <td></td>
	  </tr>";
    
}
  $query = "SELECT * FROM as_marks INNER JOIN as_students USING(as_studentno)";
    $query_run = mysql_query($query);

   $qty_bot = 0;
   $qty_mid = 0;
   $qty_eot = 0;
   
    while ($num = mysql_fetch_assoc ($query_run)) {
    $qty_bot += $num['as_bot'];
    $qty_mid += $num['as_mid'];
    $qty_eot += $num['as_eot'];
}

$Av = ($qty_bot + $qty_mid + $qty_eot)/3;
$totalAv = ceil($Av);


echo "
      <tr>
      <td><b>Total</b></td>
      <td>{$qty_bot}</td>
      <td>{$qty_mid}</td>
      <td>{$qty_eot}</td>
      <td>{$totalAv}</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>";
echo '</table>';
echo "</div>";

$count = mysql_query("SELECT COUNT(*) AS as_marksid FROM as_marks");
          $row = mysql_fetch_array($count);

$Average = ceil($totalAv/$row['as_marksid']);
echo "<div class=\"col-md-6\"></div><div class=\"col-md-2\">Average: &nbsp;<span style=\"color:#ff0000\">{$Average}</span></div>";
echo "<div ></div>Aggregates: &nbsp;<span>placeholder</span";
  }else{
    $msg = 'Sorry you must select a class to generate Report Cards';
    header('Location: generate-report.php?id='.urlencode($msg));
  }
}
?>

</div>
<br />
<!-- Grading -->
<label>Grading</label>
<div class=" table-responsive">
   <table class="marks_tbl table table-striped">
      <tr>
        <td>100 - 75</td>
       <td>74 - 70</td>
        <td>69 - 65</td> 
        <td>64 - 60</td>
        <td>59 - 55</td>
        <td>54 - 50</td>
        <td>49 - 40</td>
        <td>39 - 35</td>
        <td>34 - 0</td>
      </tr>
      <tr>
        <td style="color:#21e30c">D1</td>
       <td style="color:#21e30c">D2</td>
        <td style="color:#1d31f4">C3</td> 
        <td style="color:#1d31f4">C4</td>
        <td style="color:#1d31f4">C5</td>
        <td style="color:#1d31f4">C6</td>
        <td style="color:#000000">P7</td>
        <td style="color:#000000">P8</td>
        <td style="color:#ff0000">F9</td>
      </tr>
</table>
</div>


<div>
  <table class="marks_tbl table table-striped">
      <tr>
        <td>
             <div>
          	<p>Class Teacher's comment: <?php echo '<span class="as_comment_id_two"> This is quite promising, however you need to improve in Luganda</span>'; ?></p>
          	
             </div>
          </td>
        <td>
             <div class="as_sign">
          	<p class="">Signature:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
          
             </div>
  </td>
          </div> 
      </tr>
    </table> 
    
    <table class="marks_tbl table table-striped">
      <tr>
        <td>
             <div>
          	<p>Head Teacher's Comment: <span class="as_comment_id_one">This is good work dear but don't relax</span></p>
          
             </div>
        </td>
        <td>
             <div class="as_sign">
             	<p>Signature:</p>
             
             </div>
        </td>
        
      </tr>
    </table>  
</div>
<div>
   <table class="marks_tbl table table-striped">
      <tr>
        <td>
      <div>
    	<p>Current Outstanding Debt (Shs.):&nbsp;<span class="as_fees_id" style="color:#ff0000"><?php
      $bal = "SELECT * FROM as_payments INNER JOIN as_students USING(as_studentno)";
      $res = mysql_query($bal);

      $row = mysql_fetch_assoc($res);
     
       if ($row['as_balance']) {
                  echo $row['as_balance'];
                 }else{
                   echo 'Nil'; 
                 }
    
      ?></span></p>
      </div>
      </td>
      <td>
      <div>
      	<p>Next Term's Fees (UGX): <span class="as_fees_id" style="color:#21e30c">300,000</span></p>
      </div>
      </td>
     </tr>
    </table> 
   </div>
    <table class="marks_tbl table table-striped">
      <tr>
        <td>
            <p>Other requirements: </p>
        </td>
    </tr>
    </table>
    <table class="marks_tbl table table-striped">
      <tr>
        <td>
            <div>
            	<p>Next Term begins on: </p>
           <p></p>
            </div>
        </td>
        <td>
            <div>
            	<p>Ends on: </p>
            	<p></p>
            </div>
        </td>
      </tr>
    </table>        
</div>
<?php
   echo <<<_END
   &nbsp;&nbsp;&nbsp;&copy; 
_END;
echo date('Y');
echo '&nbsp;&nbsp; AllSchool Management System, A product of Creative Summit<a href="wwww.creativesummitug.com"></a> | +256 751 728776 | +256 784 390027';
?>
<br />
<button class="btn btn-primary" id="print" value="" onclick="printPage()"><i class="glyphicon glyphicon-print">&nbsp;Print</i></button>
<br />
</div>
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

