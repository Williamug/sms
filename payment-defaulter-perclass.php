<?php 
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header2.php');
?>
 
     <a href="accounts.php" class="btn btn-info">Back</a>   
    
    <div><h3><i class="fa fa-gear">&nbsp;School Fees default</i></h3></div>
  
     <p>Select a class to display fees defaulters</p>
    
     <form action="payment-defaulter-print.php" method="post">
         <div class="col-md-4">
            <div class="form-group"> 
            <select class="form-control" name="class" id="class">
                   <option value="">--Select--</option>
                    <?php 
                            $select_class = mysql_query("SELECT * FROM as_class");
                            while ($as_class = mysql_fetch_assoc($select_class)) {
                    ?>
                  <option value="<?php echo $as_class['as_classid']; ?>" ><?php echo $as_class['as_classname']; }?></option>
                </select>
              </div>
            </div>
          <div class="form-group">
            <button type="submit" name="query" class="btn btn-success">Query</button>
          </div>
     </form>
     <hr>
<!-- <iframe frameborder="0" name="iframeContent" src="student_results.php" width="1100" height="600"></iframe> -->
