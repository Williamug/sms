<?php 
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header2.php');
?>
<a href="student.php" class="btn btn-info">Back</a>

<?php if(isset($_GET['search'])): ?>
      <span class="err"><?php echo $_GET['search']; ?></span>
   <?php endif; ?>
     <br>
       
     <form action="single.php" method="get">
         <div>
           <input type="text" name="search_box" class="search_box" size="70" placeholder="Please type here the name of a student you are looking for">
           
           <input type="submit" name="submit" value="Search" class="btn btn-primary">
         </div>
            <br />
              <hr>
            <br />
     </form>
      <div>
          <p>Select a class to display pupil's details per class</p>
      </div>
     <form action="page-per-class.php" method="post">
         <div class="col-md-4">
            <div class="form-group">
             
              <select class="form-control" name="class" id="class" value="<?php if(!empty($_POST['class'])) echo $_POST['class']; ?>" >
                <option>--Select Class--</option>
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
            <button type="submit" name="query" class="btn btn-primary">Query</button>
          </div>
     </form>
<iframe src="page-per-class-view.php"></iframe>
