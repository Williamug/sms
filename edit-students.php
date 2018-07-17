<?php
 require_once("includes/session.php");
// student admission processing
//database connection
require_once('includes/constant.php');
require_once('includes/function/function.php'); 
require_once('includes/dbconnect.php');

?>

<!DOCTYPE html>
<!-- IE settings -->

  <!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-gb" class="no-js">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- for manifest -->
 <link rel="manifest" href="manifest.json">

   <meta name="apple-mobile-web-app-capable" content="yes">
   <meta name="apple-mobile-web-app-status-bar-style" content="black">
   <meta name="apple-mobile-web-app-title" content="AllSchool">

   <link rel="apple-touch-icon" href="images/short_allschool.png">

  <meta name="msapplication-TileImage" content="images/short_allschool.png">
  <meta name="msapplication-TileColor" content="#2F3BA2">


<!-- IE settings -->

<!--[if lt IE 9]> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
<link rel="icon" href="images/short_allschool.png">
<title>Admission - <?php echo AS_TITLE; ?></title>
<meta name="description" content="">
<meta name="author" content="Creative Summit Ltd">

<!-- IE settings -->

<!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!--[if lte IE 8]>
    <script type="text/javascript" src="http://explorercanvas.googlecode.com/svn/trunk/excanvas.js"></script>
  <![endif]-->

  <!-- css links -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/staff-registration.css">
  <link rel="stylesheet" href="css/admission.css">
  <!-- <link rel="stylesheet" href="css/dashboard.css"> -->
  <link rel="stylesheet" type="text/css" href="css/staff-registration.css">

<!-- css to control error message -->
  <style type="text/css">
     .as_back_header{
      font-size: 24px;
     }

     .form_error_msg{
          background: red;
          width: 20em;
          position: absolute;
          left: 20em;
          top: 1.8em;
          font-size: 24px;
          padding: 6px 6px 0 4px;
          color: #fff;
          border-radius: 8px;
        }
     .as_data_sent{
          background: green;
          width: 20em;
          position: absolute;
          left: 20em;
          top: 1.8em;
          font-size: 24px;
          padding: 6px 6px 0 4px;
          color: #fff;
          border-radius: 8px;
     }
    .as_welcome_note{
           font-size: 16px;
           background: green;
           color: #fff;
           width: 14em;
           padding: 4px;
           border-radius: 10px;
           float: right;
       }
  </style>
</head>
<body>

<!-- logo -->
   <div>
     <img src="">
   </div>
    <!-- content -->
    
      <nav class="container-fluid" id="as-fix-it">
        <!--  <a href="single.php" class="as_back_header">Back</a> -->
        <!--  <p class="as_welcome_note">Howdy, <?php //echo $_SESSION['as_username']; ?></p> -->
         <?php if (isset($_GET['message'])): ?>
              <div class="alert alert-success"><?php echo $_GET['message']; ?></div>
          <?php endif;?>  
      </nav>
      <div class="container">  
      <div id="head">
        <h4>Student Admission Form</h4>
      </div>
      <br>
      <br>
      <div class="">
        <div class="">
          <form method="post" action="student-update.php" id="contactfrm" role="form" enctype="multipart/form-data">
              
    
<?php
   $results = mysql_query("SELECT * FROM as_students INNER JOIN as_class USING(as_classid)");
   $row = mysql_fetch_assoc($results);
    $image_location = AS_UPLOADPATH . $row['as_photo'];

    echo $row['as_studentno'];
?>
       <fieldset>
                    <legend>Student Registration Details</legend>
                     <div class="row">
                     <div class="col-md-4">
                        <div class="form-group col-md-7">
                          <label for="date_1">Admission date:</label><br>
                          <input type="date" class="form-control" name="admissiondate" id="date_1" 
                          value="<?php echo $row['as_admission_date']; ?>" placeholder="" title="" required>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                    <div class="form-group">
                      <div class="form-group">
                        <label for="class">Class</label><br>
                        <select class="form-control" name="class" id="class">
                           <option value=""><?php echo $row['as_classname'] ?></option>

                         <?php 
                                    $select_class = mysql_query("SELECT * FROM as_class");
                                    while ($as_class = mysql_fetch_assoc($select_class)) {

                            ?>
                  <option value="<?php echo $as_class['as_classid']; ?>"><?php echo $as_class['as_classname']; }?></option>
  
                          
                        </select>
                      </div>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <!-- <div class="form-group">
                      <label for="period">Session:</label><br>
                      <input type="text" class="" name="period" id="period" 
                      value="" placeholder="e.g 2017 - 2018" title="">
                    </div> -->
                    </div>
                   </div>
                  </fieldset>

<fieldset>
                  <legend>Student Details</legend>
                    <div class="row">
                      <div class="col-md-6">
                          
                            <div class="form-group col-md-10">
                                 <label for="surname">Surname</label><br>
                                 <input type="text" class="form-control" name="surname" size="40" id="surname"  
                                 value="<?php echo $row['as_surname']; ?>" placeholder="" title="" required>
                          </div>
                          <div class="form-group col-md-10">
                                 <label for="firstname">First Name</label><br>
                                 <input type="text" class="form-control" name="firstname" size="40" id="firstname" 
                                 value="<?php echo $row['as_firstname']; ?>" placeholder="" title="" required>
                          </div>
                          <div class="form-group col-md-10">
                                 <label for="othername">Other Name</label><br>
                                 <input type="text" class="form-control" name="othername" size="40" id="othername" 
                                 value="<?php echo $row['as_othername']; ?>" placeholder="" title="">
                          </div>
                          <div class="form-group col-md-10">
                                 <label>Gender</label>&nbsp;&nbsp;<br>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <input type="radio" name="gender" checked="checked" value="Male">&nbsp;&nbsp; Male <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="gender" value="Female">&nbsp;&nbsp;Female 
                          </div>
                          <div class="form-group col-md-10">
                                 <label for="date-of-birth">Date of birth</label><br>
                                 <input type="date" class="form-control" name="dob" size="40" id="date-of-birth"
                                  value="<?php echo $row['as_date_of_birth']; ?>" placeholder="" title="">
                          </div>
                          <div class="form-group col-md-10">
                                 <label for="nationality">Nationality</label><br>
                                 <input type="text" class="form-control" name="nationality" size="40" id="nationality" 
                                  value="<?php echo $row['as_nationality']; ?>"placeholder="" title="">
                          </div>
                          <!-- <div class="form-group">
                           <label for="">Region</label><br>
                           <input type="text" class="" name="region" size="40" id=""
                            value="<?php //if(!empty($_POST['region'])) echo $_POST['region']; ?>" 
                            placeholder="e.g central, eastern, western, northern" title="">
                          </div> -->
                          </div>
                          <div class="col-md-6">
                          <!-- Image -->
                           <div border="2" id="output" class="" alt=""></div>
                          <div class="form-group col-md-10">
                                  <label for="fileselect">Passport photo</label><br>
                                 
                                 
                                 <input type="file" class="form-control" name="passport" multiple="disable" size="40" id="fileselect" 
                                  value='<?php echo "<img src=\"{$image_location}\" width=\"200\" height=\"200\">"; ?>'>
                          </div>
                          <div class="form-group col-md-10">
                                 <label for="religion">Religion</label><br>
                                 <input type="text" class="form-control" name="religion" size="40" id="religion"
                                  value="<?php echo $row['as_religion']; ?>" placeholder="" title="">
                          </div>
                          <!-- <div class="form-group">
                                 <label for="former-school">Former School Attended</label><br>
                                 <input type="text" class="" name="former-school" size="40" id="former-school" 
                                 value="<?php //if(!empty($_POST['former-school'])) echo $_POST['former-school']; ?>" placeholder="" title="">
                          </div> -->
                          <!-- Image -->
                          <!--  <div border="2" id="output" class="" alt=""></div>
                           <div class="form-group">
                                <label for="prev-results">Previous Results</label><br>
                                 <input type="file" class="" name="prev-results" size="40" id="prev-results"
                                  value="<?php //if(!empty($_POST['prev-results'])) echo $_POST['prev-results']; ?>" placeholder="" title="">
                          </div> -->
                        </div>

                      </div>
                    </fieldset>
                    <br>
                  
                    <fieldset>
                    <legend>Parent/ Guardian Details</legend>
                    <div class="row">
                    <div class="col-md-6">
                      <!-- <div id="parent"> -->
                            <div class="form-group col-md-10">
                                   <label for="">Father's Full Names</label><br>
                                   <input type="text" class="form-control" name="fathername" size="40" id=""
                                    value="<?php echo $row['as_fathername']; ?>" placeholder="" title="">
                            </div>
                            
                            <div class="form-group col-md-10">
                                   <label for="">Mother's Full Names</label><br>
                                   <input type="text" class="form-control" name="mothername" size="40" id=""
                                    value="<?php echo $row['as_mothername']; ?>" placeholder="" title="">
                            </div>
                            
                     <!--  </div> -->
                   <!--  -->
                    </div>
                    <div class="col-md-6">
                  

                   <!--  <div id="guardian"> -->
                        <div class="form-group col-md-10">
                               <label for="">Guardian Name (if any)</label><br>
                               <input type="text" class="form-control" name="guardian_name" size="40" id=""
                                value="<?php echo $row['as_guardianname']; ?>" placeholder="" title="">
                        </div>
                        
                    <!-- /div> -->
                    </div>
                    </div>
                    </fieldset>
                    <fieldset>
                      <legend>Address Details</legend>
                      <div class="row">
                         <div class="col-md-6">
                        <div class="form-group col-md-10">
                            <label>Physical Address</label><br>
                            <input type="text" size="40" class="form-control" name="physical_address" 
                            value="<?php echo $row['as_physical_address']; ?>" required>
                            <br>
                        </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                        <div class="form-group col-md-10">
                            <label>District</label><br>
                            <input type="text" size="40" class="form-control" name="district"
                             value="<?php echo $row['as_district']; ?>">
                            <br>
                        </div>
                        </div>
                    </fieldset>
                    <fieldset>
                       <legend>Contact Details</legend>
                       <div class="row">
                          <div class="col-md-6">
                               <div class="form-group col-md-10">
                              <label>Contact Number</label><br>
                              <input type="text" size="40" class="form-control" name="contact"
                               value="<?php echo $row['as_contact']; ?>" required>
                              </div>
                              <div class="form-group col-md-10">
                              <label>Mobile</label><br>
                              <input type="text" size="40" class="form-control" name="mobile"
                               value="<?php echo $row['as_mobile']; ?>">
                               </div>
                          </div>
                          <div class="col-md-6">
                               <div class="form-group col-md-10">
                              <label>Email</label><br>
                              <input type="email" size="40" class="form-control" name="email"
                               value="<?php echo $row['as_email']; ?>">
                              </div>
                          </div>
                    </fieldset>
                 </div> 
                 

                 <br>
                 <br>
                 <br>
                 <div class="as-subreset">
                   <div class="row">
                    <br><br>
                      <div class="col-md-6 form-group">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="reset" class="btn btn-danger">Cancel</button>
                      </div>

                      <div class="col-md-6 form-group">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                      </div>

                    </div>
                          </div>   
</form>
    <hr>
   <div class="footer-sms">
        <p>&copy; <?php echo date('Y') ?> School copyright, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;A product of &nbsp;  <a href="http://www.creativesummitug.com" target="_blank">Creative Summit</a></p>
    </div>
</div>
  </div>
</div>


    
<!-- jQuery and JavaScript links -->
    <script src='fullcalendar/lib/moment.min.js'></script>
    <script src='fullcalendar/lib/jquery.min.js'></script>
    <script src='fullcalendar/fullcalendar.min.js'></script>
    <script src='fullcalendar/custom.js'></script>
    <script src="js/npm.js"></script>
    <script src="js/as.js"></script>  


</body>
</html>
