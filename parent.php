<?php 
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header2.php');
?>
     <br>
     <a href="admin.php" class="btn btn-info">Back</a>   
	 <?php //if(isset($_GET['search'])): ?>
	    <!-- <span class="err"><?php //echo $_GET['search']; ?></span> -->
	 <?php //endif; ?>
<br>	 
     <!-- <form action="single.php" method="get">
         <div>
           <input type="text" name="search_box" class="search_box" size="70" placeholder="Please type here the name of a student you are looking for">
           
		       <input type="submit" name="submit" class="btn btn-primary">
         </div>
     </form> -->
     
     <br>
<iframe name="iframeContent" frameborder="0" src="parent-view.php" width="1100" height="600"></iframe>

<br>
<?php include("includes/footer.php"); ?>
