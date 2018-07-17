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
       $selectClass = $_POST['selectClass'];
       $selectTeacher = $_POST['selectTeacher'];
     
     //update
      $query = "UPDATE as_class SET as_classname = '$selectClass', as_teachers_id = '$selectTeacher' WHERE as_classname = '$selectClass'";
      mysql_query($query);
       
      $err = "Information Updated";
      header('Location: class.php?update='. urlencode($err));
    }       
?>

<a href="class.php" class="btn btn-info">Back</a> 
<div class="row">
<div class="col-md-5"></div>
<div class="">
 
</div>
</div>
<div class="col-md-9"><h3><i class="fa fa-gear">&nbsp;Manage Class</i></h3></div><br><br>
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
      <label for="selectClass">Class</label><br>
      <select class="form-control" name="selectClass" id="selectClass">
         <option value="">--Select--</option>
          <?php 
                  $select_class = mysql_query("SELECT * FROM as_class");
                  while ($class = mysql_fetch_assoc($select_class)) {
          ?>
        <option value="<?php echo $class['as_classname']; ?>"><?php echo $class['as_classname']; }?></option>
      </select>
    </div>
     <div class="form-group">
      <label for="selectSubject">Teacher</label><br>
      <select class="form-control" name="selectTeacher" id="selectTeacher" value="<?php if(!empty($_POST['selectTeacher'])) echo $_POST['selectTeacher']; ?>">
         <option value="">--Select--</option>
          <?php 
                  $select_teacher = mysql_query("SELECT * FROM as_teacher WHERE as_position = 'teacher'");
                  while ($teachers = mysql_fetch_assoc($select_teacher)) {
          ?>
        <option value="<?php echo $teachers['as_teachers_id']; ?>"><?php echo $teachers['as_surname'] . '&nbsp;' . $teachers['as_firstname'] . '&nbsp;' . $teachers['as_othername']; }?></option>
      </select>
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
