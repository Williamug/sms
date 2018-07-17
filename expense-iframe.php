<?php 
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header3.php');

?>
<div class="as_container">
    <?php
       //pull out data 
       $query = "SELECT * FROM as_expenses ORDER BY as_date DESC";
       $results = mysql_query($query);
       confirm_result($results);
        echo "<h3>Expenses Details</h3>";
       //loop 
       echo <<<_END
        <div class="table-responsive" id="expense">
           <table class="table table-striped">
             <tr>
                <th>Date</th>
                <th>Qty</th>
                <th>Particular</th>
                <th>Comment</th>
                <th>Amount</th>
             <tr>
_END;
       while ($row = mysql_fetch_assoc($results)) {
          echo <<<_END
             <tr>
                <td>{$row['as_date']}</td>
                <td>{$row['as_qty']}</td>
                <td>{$row['as_particular']}</td>
                <td>{$row['as_comment']}</td>
                <td>{$row['as_amount']}</td>
             </tr>   
             
             
_END;
       }
    $result_students = mysql_query("SELECT SUM(as_amount) as_amount FROM as_expenses");
      $total = mysql_fetch_array($result_students);
      echo "<tr>
              <td></td>
              <td></td>
              <td></td>
              <td><b>Total</b></td>
              <td><b><i>{$total['as_amount']}</i></b></td>
             </tr>";
       echo "</table>";
       echo "</div>";   


        echo <<<_END
     <input type="button" id="print" value="Print" onclick="printPage()">
_END
    ?>
</div>

<script type="text/javascript">
  function printPage(){
    // Do print the page
    if (typeof(window.print) != 'undefined') {
        window.print();
    }
}
</script>