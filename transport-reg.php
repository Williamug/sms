<?php 
require_once('fpdf/fpdf.php');
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header2.php');
?>

<?php
   $err = "";
   if (isset($_POST['submit'])) {
   	   $selectTeacher =  $_POST['selectTeacher'];
   	   $plateNo =        $_POST['plateNo'];
   	   $route =          $_POST['route'];

   	   if (!empty($selectTeacher) && !empty($plateNo) && !empty($route)) {
   	   	  $query = "INSERT INTO as_transport(as_teachers_id, as_plateNo, as_route) VALUES('$selectTeacher', '$plateNo', '$route')";
   	   	  $result =mysql_query($query);
   	   	  confirm_insert($result);

   	     echo '<div class="alert alert-success">Successfully added' . $selectTeacher . '</div>';
   	     header('Location: transport-reg.php');

	   }else{
	    $err = '<div class="alert alert-danger">Please fill in missing values</div>';
	    }
   }
          
?>

<a href="transport.php" class="btn btn-info">Back</a> 
<div class="row">
<div class="col-md-5"></div>
<div class="">
   <?php  echo $err; ?>
</div>
</div>
<h3 align="">Books Registration Form</h3>
<div class="col-md-4"></div>
 <nav class="container-fluid" id="payment-nav">
	 
</nav>

<div class="as_container">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="row">
     <div class="col-md-3">
     </div>
     <div class="col-md-4">
		<div class="form-group">
			<label>Name:</label><br>
			<select class="form-control" name="selectTeacher" id="selectTeacher" value="<?php if(!empty($_POST['selectTeacher'])) echo $_POST['selectTeacher']; ?>">
			   <option value="">--Select--</option>
			    <?php 
                  $select_teacher = mysql_query("SELECT * FROM as_teacher WHERE as_position = 'driver'");
                  while ($teacher = mysql_fetch_assoc($select_teacher)) {
			    ?>
				<option value="<?php echo $teacher['as_teachers_id']; ?>"><?php echo $teacher['as_surname'] . '&nbsp;' . $teacher['as_firstname'] . '&nbsp;' . $teacher['as_othername']; }?></option>
			</select>
		</div>
		<div class="form-group">
			<label for="plateNo">Plate No.:</label><br>
			<input type="text" name="plateNo" value="<?php if(!empty($_POST['plateNo'])) echo $_POST['plateNo']; ?>" class="form-control" id="plateNo" placeholder="e.g UBA-123A">
            
		</div>
		<div class="form-group">
			<label for="route">Route</label><br>
			<input type="text" name="route" value="<?php if(!empty($_POST['route'])) echo $_POST['route']; ?>" class="form-control" id="route">
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



<?php include_once("includes/footer.php"); ?>

