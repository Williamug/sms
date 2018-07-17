<?php 
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
 include_once('includes/header2.php');

?>
<br>
<div class="row">
    <div class="col-md-9"><h3><i class="fa fa-gear">&nbsp;Class</i></h3></div><br><br>
      
    <div class="col-md-3">
        <a href="add-class.php" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Add Class Teacher/ Update</a>
    </div>
</div>
<hr>
<?php if (isset($_GET['update'])): ?>
    <div class="update"><?php echo $_GET['update']; ?></div>
    <?php endif;?>
<br><br>
<?php
//pull out data


   $results = "SELECT * FROM as_class INNER JOIN as_teacher USING(as_teachers_id)";
echo '<div class="row">';
 echo '<div class="table-responsive col-md-10">';
  echo '<table class="table table-striped">';
   echo '<tr><th>Class</th><th>Class Teacher\'s Name</th><tr>';
    $query = mysql_query($results);
    while($row = mysql_fetch_assoc($query)){
    echo '<tr>';
    echo "<td>{$row['as_classname']}</td>";
    echo "<td>{$row['as_surname']}&nbsp;&nbsp;{$row['as_firstname']}&nbsp;&nbsp;{$row['as_othername']}</td>";
    
    echo '</tr>';
    }
            
  echo "</table>";
  echo "</div>";
  echo "</div>";
  echo "";
  
?>  
<script type="text/javascript">
  
  function printPage(){
    // Do print the page
    if (typeof(window.print) != 'undefined') {
        window.print();
    }
}
</script>