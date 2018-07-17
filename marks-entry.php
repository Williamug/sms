<?php 
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header2.php');
?>

<a href="admin.php" class="btn btn-info">Back</a>
  <?php
      //init values
     if (isset($_POST['submit'])) {
     	$bot =     $_POST['bot'];
     	$eot =     $_POST['eot'];
     	$mid =     $_POST['mid'];
     	$comment = $_POST['comment'];
        
        $query = "SELECT * FROM as_marks INNER JOIN as_students USING(as_studentno) INNER JOIN as_subjects USING(as_subject_id) INNER JOIN as_class USING(as_classid) INNER JOIN as_term USING(as_termid)";
             $results = mysql_query($query);
             confirm_result($results);

             if(mysql_num_rows($results) > 0){
               while( $row = mysql_fetch_assoc($results)){
             	$term_id =     $row['as_termid'];
             	$subject_id =  $row['as_subject_id'];
             	$class_id =    $row['as_classid'];
             	$as_studentno = $_POST['as_studentno'];
             	$as_surname =   $row['as_surname'];
             	$as_firstname =   $row['as_firstname'];

             	 echo $term_id . "<br>";
             	 echo $subject_id . "<br>";
             	 echo $class_id . "<br>";
             	 echo $as_surname . "<br>";
                 echo $as_firstname . "<br>"; 
             	$query2 = "INSERT INTO as_marks( as_termid, as_classid, as_studentno, as_subject_id, as_bot, as_eot, as_mid, as_comment)
             	           VALUES('$term_id', '$class_id', '$as_studentno', '$subject_id', '$bot', '$eot', '$mid', '$comment')";
             	           $results2 = mysql_query($query2);
             	          confirm_insert($results2);
                }
             }
     }
  ?>
<h3 align="center">Name of the school.</h3>
<h4 align="center">Receipt</h4>
<div class="col-md-4"></div>
 <nav>
	 <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="report-manage.php"><i class="fa fa-plus-circle"> Add/ Manage Marks</i></a></li>
        <li role="presentation"><a href="report-view.php"><i class="fa fa-drivers-license-o">&nbsp;View/ Make Report</i></a></li>
        <!-- <li role="presentation"><a href="#">Messages</a></li> -->
      </ul>
</nav>

<div class="as_container">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="row">
    
     <div class="col-md-10">
        
		<br>
		
		    <div class="row">
				<div class="form-group col-md-2">
					<label for="surname">Name</label><br>
					
				</div>
				
				<div class="form-group col-md-2">
					<label for="surname">B.O.T (out of 100%)</label><br>
					<input type="number" name="bot" class="form-control" size="" id="surname">
				</div>
				<div class="form-group col-md-2">
					<label for="surname">MID (out of 100%)</label><br>
					<input type="number" name="mid" class="form-control" size="" id="surname">
				</div>
				<div class="form-group col-md-2">
					<label for="surname">E.O.T (out of 100%)</label><br>
					<input type="number" name="eot" class="form-control" size="" id="surname">
				</div>
						
				
						<div class="form-group col-md-3">
							<label for="surname">Comment</label><br>
							<textarea class="form-control" name="comment"></textarea>
						</div>
			</div>	
			    

				<br>
				<div class="row">
				  <div class="col-md-6">
				    <!-- <button type="submit" name="submit" class="btn btn-primary">Submit</button> -->
				  </div>
				  <div class="col-md-6">
				     <button type="submit" class="btn btn-info">Submit</button>
				  </div>
				</div>
			 </div>
			   
	      
	   <!--  <div class="col-md-5">
	    </div> -->
	    </div>
</form>
</div>
<br>
<?php include_once("includes/footer.php"); ?>
