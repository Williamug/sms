<?php 
require_once('includes/session.php');
require_once('includes/constant.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header2.php');
?>
<a href="admin.php" class="btn btn-info">Back</a>

  <br><br><br>
<!-- <h3 align="center">Name of the school.</h3>
<h4 align="center">Receipt</h4> -->
<?php include_once 'includes/exam-nav.php'; ?>
<br>
<?php 
          if (isset($_GET['id'])) {
             echo '<span class="alert alert-danger">' . $_GET['id'] . '</span>';
          }else{

          }
       ?>
       <br><br>
       <div>
         <div class="col-md-9"><h3><i class="fa fa-gear">&nbsp;Marks Sheet</i></h3></div><br><br>
       </div>
       <br>
<div class="as_container">
 <form action="sheet.php" method="post">
         <div class="col-md-4">
              <div class="form-group">
                <label for="selectClass">Select Class</label><br>
                  <select class="form-control" name="class" id="class" value="">
                     <option value="">--Select--</option>
                      <?php 
                              $select_class = mysql_query("SELECT * FROM as_class");
                              while ($class = mysql_fetch_assoc($select_class)) {
                      ?>
                    <option value="<?php echo $class['as_classid']; ?>"><?php echo $class['as_classname']; }?></option>
                  </select>
               </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="selectClass">Select Subject</label><br>
                  <select class="form-control" name="subj" id="subj" value="">
                     <option value="">--Select--</option>
                      <?php 
                              $select_subjects = mysql_query("SELECT * FROM as_subjects");
                              while ($subjects = mysql_fetch_assoc($select_subjects)) {
                      ?>
                    <option value="<?php echo $subjects['as_subject_id']; ?>"><?php echo $subjects['as_subjectname']; }?></option>
                  </select>
               </div>
            </div>
            <br />
          <div class="form-group">
            <button type="submit" name="query" class="btn btn-success">Generate Marks Sheet</button>
          </div>
     </form>
  </div>