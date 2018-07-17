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
       $bookNo =            escape_string($_POST['bookNo']);
       $title =             escape_string($_POST['title']);
       $author =            escape_string($_POST['author']);
       $selectSubject =     escape_string($_POST['selectSubject']);
       $selectClass =       escape_string($_POST['selectClass']);
       $copies =            escape_string($_POST['copies']);
       $isbn =              escape_string($_POST['isbn']);
      
    //Validation
       if (!empty($bookNo) && !empty($title) && !empty($author) && !empty($selectSubject)) {
       	//query the database
       	
       	// $query = "SELECT as_studentno, as_surname, as_firstname, as_class FROM as_students WHERE as_surname = '$surname' AND as_firstname = '$firstname' AND as_class = '$class'";
       	//     $result = mysql_query($query);
       	//     confirm_result($result);

       	//     //fetch data
       	//     if (mysql_num_rows($result) > 0) {
       	//     	$row = mysql_fetch_assoc($result);

       	//     	 $studentno = $row['as_studentno'];
       	//     	              $row['as_surname'];
       	//     	              $row['as_firstname'];
       	//     	              $row['as_class'];
                      
                
        //          $total = 300000;
        //          $bal = $total - $shs;

       	    	$query2 = "INSERT INTO  as_library(as_bookno, as_book_name, as_author, as_subject_id, as_classid, as_total_copy, as_ISBN) 
       	    	                    VALUES('$bookNo', '$title', '$author', '$selectSubject', '$selectClass', '$copies', '$isbn')";
       	        $result2 = mysql_query($query2);
       	        confirm_insert($result2);


       	        echo '<div class="alert alert-success">Text book(s) registered. The book number is ' . $bookNo . ' and the ISBN is ' . $isbn . '</div>';

       	   }else{
       	    $err = '<div class="alert alert-danger">Please fill in missing values</div>';
       	    }
       }
          
?>

<a href="library.php" class="btn btn-info">Back</a>
  <?php
  echo $err;
 ?> 
<div class="row">
<div class="col-md-5"></div>
<div class="">
 
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
			<label for="bookNo">Book No.</label><br>
			<input type="text" name="bookNo" value="<?php if(!empty($_POST['bookNo'])) echo $_POST['bookNo']; ?>" class="form-control" id="bookNo">
		</div>
		<div class="form-group">
			<label for="title">Title</label><br>
			<input type="text" name="title" value="<?php if(!empty($_POST['title'])) echo $_POST['title']; ?>" class="form-control" id="title">
		</div>
		<div class="form-group">
			<label for="author">Author</label><br>
			<input type="text" name="author" value="<?php if(!empty($_POST['author'])) echo $_POST['author']; ?>" class="form-control" id="author">
		</div>
		<div class="form-group">
			<label for="selectSubject">Subject</label><br>
			<select class="form-control" name="selectSubject" id="selectSubject" value="<?php if(!empty($_POST['selectSubject'])) echo $_POST['selectSubject']; ?>">
			   <option value="">--Select--</option>
			    <?php 
                  $select_subj = mysql_query("SELECT * FROM as_subjects");
                  while ($subjects = mysql_fetch_assoc($select_subj)) {
			    ?>
				<option value="<?php echo $subjects['as_subject_id']; ?>"><?php echo $subjects['as_subjectname']; }?></option>
			</select>
		</div>
		<div class="form-group">
			<label for="selectClass">Class</label><br>
			<select class="form-control" name="selectClass" id="selectClass">
			   <option value="">--Select--</option>
			    <?php 
                  $select_class = mysql_query("SELECT * FROM as_class");
                  while ($class = mysql_fetch_assoc($select_class)) {
			    ?>
				<option value="<?php echo $class['as_classid']; ?>"><?php echo $class['as_classname']; }?></option>
			</select>
		</div>
		<div class="form-group">
			<label for="copies">Number of copies</label><br>
			<input type="number" name="copies" class="form-control" id="copies" value="<?php if(!empty($_POST['copies'])) echo $_POST['copies']; ?>" >
		</div>
		
		<div class="form-group">
			<label for="surname">ISBN</label><br>
			<input type="text" name="isbn" class="form-control" value="<?php if(!empty($_POST['isbn'])) echo $_POST['isbn']; ?>">
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
