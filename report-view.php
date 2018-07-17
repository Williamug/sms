<?php 
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header2.php');
?>

<?php
   
?>

<a href="admin.php" class="btn btn-info">Back</a>
  <?php
 
  ?>
<!-- <h3 align="center">Name of the school.</h3>
<h4 align="center">Receipt</h4> -->
<div class="col-md-4"></div>
 <nav>
	 <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="report-manage.php"><i class="fa fa-plus-circle"> Add/ Manage Marks</i></a></li>
        <li role="presentation"><a href="report-view.php"><i class="fa fa-drivers-license-o">&nbsp;View/ Make Report</i></a></li>
        <!-- <li role="presentation"><a href="#">Messages</a></li> -->
      </ul>
</nav>

<div class="as_container">

   <iframe frameborder="0" name="iframeContent" src="report.php" width="1100" height="1500"></iframe>
</div>
<br>
<?php //include_once("includes/footer.php"); ?>
