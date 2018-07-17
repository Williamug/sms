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
<div class="as_container">
 <form action="report.php" method="post">
         <div class="col-md-4">
            <div class="form-group">
             
              <select class="form-control" name="class" id="class" value="<?php if(!empty($_POST['class'])) echo $_POST['class']; ?>" >
                <option value="">--Select Class--</option>
                <option value="baby">Baby</option>
                <option value="middle">Middle</option>
                <option value="top">Top</option>
                <option value="P.1">P.1</option>
                <option value="P.2">P.2</option>
                <option value="P.3">P.3</option>
                <option value="P.4">P.4</option>
                <option value="P.5">P.5</option>
                <option value="P.6">P.6</option>
                <option value="P.7">P.7</option>
              </select>
             </div>
            </div>
          <div class="form-group">
            <button type="submit" name="query" class="btn btn-success">Generate Report Card</button>
          </div>
     </form>