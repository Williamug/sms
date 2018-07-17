<?php 
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header2.php');
?>
 <?php if (isset($_GET['message'])): ?>
      <div class="alert alert-success"><?php echo $_GET['message']; ?></div>
  <?php endif;?>  
     
     <br>
	 <?php if(isset($_GET['search'])): ?>
	    <span class="err"><?php echo $_GET['search']; ?></span>
	 <?php endif; ?>

    

     <br>
     <a href="admin.php" class="btn btn-info">Back</a>	 
     <form action="single.php" method="get">
         <div class="col-md-9"><h3><i class="fa fa-gear">&nbsp;Manage Students</i></h3></div>
         <div class="row">
          <div class="col-md-9">
           <input type="text" name="search_box" class="search_box" size="70" placeholder="Please type here the name of a student you are looking for">
           <input type="submit" name="submit" value="Search" class="btn btn-primary">
         </div>
    <div class="col-md-3">
        <a href="admission.php" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Admit New Pupil</a>
    </div>
    </div>
             <hr>
      </form>
      <div>
       <?php 
          if (isset($_GET['id'])) {
             echo '<span class="alert alert-danger">' . $_GET['id'] . '</span>';
          }else{

          }
       ?>
       
          <p>Select a class to display pupil per class</p>
      </div>
     <form action="page-per-class-view.php" method="post">
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
<iframe frameborder="0" name="iframeContent" src="student_results.php" width="1100" height="600"></iframe>
<?php include("includes/footer.php"); ?>
