<?php 
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header2.php');
?>
     <br>
	 <?php if(isset($_GET['search'])): ?>
	    <span class="err"><?php echo $_GET['search']; ?></span>
	 <?php endif; ?>
     <br>
     <a href="admin.php" class="btn btn-info">Back</a>	

      
     <form action="teacher-single.php" method="get">
         <div>
           <input type="text" name="search_box" class="search_box" size="70" placeholder="Please type here the name of Employee you are looking for">
           
		       <input type="submit" name="submit" value="Search" class="btn btn-primary">
         </div>
         <br>
         <div class="row">
        <div class="col-md-9"><h3><i class="fa fa-gear">&nbsp;Manage Staff</i></h3></div>
        <div class="col-md-3">
            <a href="staff-registration.php" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Add New Employee</a>
        </div>
    </div>
     </form>
    
     <br>
<iframe frameborder="0" name="iframeContent" src="staff-detail-view.php" width="1100" height="600">
    
</iframe>


<?php include("includes/footer.php"); ?>
