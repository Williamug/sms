<?php
   require_once('includes/session.php');
	require_once('includes/dbconnect.php');
	require_once('includes/function/function.php'); 
   require_once('fpdf/fpdf.php');
   $query = "SELECT * FROM as_students INNER JOIN as_payments ON as_students.as_studentno = as_payments.as_studentno ORDER BY as_date DESC";
      $results = mysql_query($query);
      confirm_result($results);
         
    
     // fetch data
      $row = mysql_fetch_array($results);
      	$image_location = AS_UPLOADPATH . $row['as_photo'];
         $receipt = $row['as_recieptid'];
         $total = 300000;
         $bal = $total - $row['as_shs'];

  //generate pdf
   $pdf -> AddPage();
   $pdf -> Image('images/as_logo.png', 10, 6, 30);
   $pdf -> SetFont('Arial', 'B', 14);
   
   $pdf -> Cell(400, 10, 'AllSchool ACADEMY', 0, 1, 'C');
   $pdf -> Cell(50, 10, 'P.O.Box 0987 Kampala Uganda', 0, 1, 'C');
   $pdf -> Cell(50, 10, 'Tel: +256 751 728776 | +256 784 390027', 0, 1, 'C');
   $pdf -> Cell(50, 10, 'Email: info@creativesummitug.com', 0, 1, 'C');
   $pdf -> Cell(40, 10, 'wwww.creativesummitug.com', 0, 1, 'C');

   $pdf -> Cell(50, 10, 'Receipt No. {$receipt}', 0, 1, 'C');
   $pdf -> Output();
?>