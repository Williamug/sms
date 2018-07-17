<?php
 require_once("includes/session.php");
// student admission processing
//database connection
require_once('includes/constant.php');
require_once('includes/function/function.php'); 
require_once('includes/dbconnect.php');

if(isset($_POST['submit'])){
     // form variables
    $admissiondate =         escape_string($_POST['admissiondate']);
    $class =                 escape_string(ucfirst($_POST['class']));
    $surname =               escape_string($_POST['surname']);
    $firstname =             escape_string($_POST['firstname']);
    $othername =             escape_string($_POST['othername']);
    $gender =                $_POST['gender'];
    $dateOfBirth =           escape_string($_POST['dob']);
    $nationality =           escape_string($_POST['nationality']);
    $passport =              $_FILES['passport']['name'];
	  $tmp_name =              $_FILES['passport']['tmp_name'];
    $religion =              escape_string($_POST['religion']);
    //$formerSchool =        escape_string($_POST['former-school']);
    //$prev_results =        $_FILES['prev-results']['name'];
    
    $fathername =            escape_string($_POST['fathername']);
    $mothername =            escape_string($_POST['mothername']);
	  $guardian_name =         escape_string($_POST['guardian_name']);
    $physical_address =      escape_string($_POST['physical_address']);
    $district =              escape_string($_POST['district']);
	  $contact =               escape_string($_POST['contact']);
	  $mobile =                escape_string($_POST['mobile']);
	  $email =                 escape_string($_POST['email']);
    
    //student admission number auto generation
      
     //initialize error message
       $form_error_msg = "";
      // form validation
       if(!empty($admissiondate) && !empty($class) && !empty($surname) && !empty($firstname) && 
          !empty($gender) && !empty($dateOfBirth) && !empty($nationality) && !empty($passport) && 
          !empty($religion) && !empty($physical_address) && !empty($contact)){
        // passport photo processing
             if($passport){
				$target = AS_UPLOADPATH . time() . "_" . $passport; 
                $pp = time() . "_" . $passport;
			    move_uploaded_file($tmp_name, $target);
               
               //if(move_uploaded_file($_FILES['passport-photo']['tmp_name']. $target) 
                 
               
        //Db insert
                $query_student_db = "INSERT INTO as_students(as_studentno, as_admission_date, as_classid, as_surname, as_firstname, as_othername,
                                                             as_gender, as_date_of_birth, as_nationality, as_photo, as_religion, as_fathername,
                                                             as_mothername, as_guardianname, as_physical_address, as_district, as_contact, 
															 as_mobile, as_email)
													 VALUES('$studentno', '$admissiondate', '$class', '$surname', '$firstname', '$othername', 
													        '$gender', '$dateOfBirth', '$nationality', '$pp', '$religion', '$fathername', 
															'$mothername', '$guardian_name', '$physical_address', '$district', '$contact', 
															'$mobile', '$email')";
                                                             
								  $data = mysql_query($query_student_db);
                  confirm_insert($data);


                
          
           //echo '<img src="' . AS_UPLOADPATH . $passportPhoto .'" alt="Score image">';
              $data_sent = "Your information has been added, Thank you";
              echo "<p class=\"as_data_sent\" id=\"as_data_sent\">{$data_sent}</p>";
			  header('Location: student.php?message=' . $data_sent);
			}
        }else{
              $form_error_msg = "Please Fill in missing information";
			  echo "<p class=\"form_error_msg\"> {$form_error_msg} </p>";
        }
    }
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
         <a href="student.php" class="as_back_header">Back</a>
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
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactfrm" role="form" enctype="multipart/form-data">
                  <fieldset>
                    <legend>Student Registration Details</legend>
                     <div class="row">
                     <div class="col-md-4">
                        <div class="form-group col-md-7">
                          <label for="date_1">Admission date:</label><br>
                          <input type="date" class="form-control" name="admissiondate" id="date_1" 
                          value="<?php if(!empty($_POST['admissiondate'])) echo $_POST['admissiondate']; ?>" placeholder="" title="" required>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                    <div class="form-group">
                      <div class="form-group">
                        <label for="class">Class</label><br>
                        <select class="form-control" name="class" id="class">
                           <option value="">--Select--</option>
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
                      value="<?php //if(!empty($_POST['period'])) echo $_POST['period']; ?>" placeholder="e.g 2017 - 2018" title="">
                    </div> -->
                    </div>
                   </div>
                  </fieldset>
                  <br>
                  <fieldset>
                  <legend>Student Details</legend>
                    <div class="row">
                      <div class="col-md-6">
                          
                            <div class="form-group col-md-10">
                                 <label for="surname">Surname</label><br>
                                 <input type="text" class="form-control" name="surname" size="40" id="surname"  
                                 value="<?php if(!empty($_POST['surname'])) echo $_POST['surname']; ?>" placeholder="" title="" required>
                          </div>
                          <div class="form-group col-md-10">
                                 <label for="firstname">First Name</label><br>
                                 <input type="text" class="form-control" name="firstname" size="40" id="firstname" 
                                 value="<?php if(!empty($_POST['firstname'])) echo $_POST['firstname']; ?>" placeholder="" title="" required>
                          </div>
                          <div class="form-group col-md-10">
                                 <label for="othername">Other Name</label><br>
                                 <input type="text" class="form-control" name="othername" size="40" id="othername" 
                                 value="<?php if(!empty($_POST['othername'])) echo $_POST['othername']; ?>" placeholder="" title="">
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
                                  value="<?php if(!empty($_POST['dob'])) echo $_POST['dob']; ?>" placeholder="" title="">
                          </div>
                          <div class="form-group col-md-10">
                                 <label for="nationality">Nationality</label><br>
                                 <input type="text" class="form-control" name="nationality" size="40" id="nationality" 
                                  value="<?php if(!empty($_POST['nationality'])) echo $_POST['nationality']; ?>"placeholder="" title="">
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
                                  value="<?php if(!empty($_POST['passport'])) echo $_POST['passport']; ?>" placeholder="" title="">
                          </div>
                          <div class="form-group col-md-10">
                                 <label for="religion">Religion</label><br>
                                 <input type="text" class="form-control" name="religion" size="40" id="religion"
                                  value="<?php if(!empty($_POST['religion'])) echo $_POST['religion']; ?>" placeholder="" title="">
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
                    <fieldset>
                    <legend>Parent/ Guardian Details</legend>
                    <div class="row">
                    <div class="col-md-6">
                      <!-- <div id="parent"> -->
                            <div class="form-group col-md-10">
                                   <label for="">Father's Full Names</label><br>
                                   <input type="text" class="form-control" name="fathername" size="40" id=""
                                    value="<?php if(!empty($_POST['fathername'])) echo $_POST['fathername']; ?>" placeholder="" title="">
                            </div>
                            
                            <div class="form-group col-md-10">
                                   <label for="">Mother's Full Names</label><br>
                                   <input type="text" class="form-control" name="mothername" size="40" id=""
                                    value="<?php if(!empty($_POST['mothername'])) echo $_POST['mothername']; ?>" placeholder="" title="">
                            </div>
                            
                     <!--  </div> -->
                   <!--  -->
                    </div>
                    <div class="col-md-6">
                  

                   <!--  <div id="guardian"> -->
                        <div class="form-group col-md-10">
                               <label for="">Guardian Name (if any)</label><br>
                               <input type="text" class="form-control" name="guardian_name" size="40" id=""
                                value="<?php if(!empty($_POST['guardian_name'])) echo $_POST['guardian_name']; ?>" placeholder="" title="">
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
                            value="<?php if(!empty($_POST['physical_address'])) echo $_POST['physical_address']; ?>" required>
                            <br>
                        </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                        <div class="form-group col-md-10">
                            <label>District</label><br>
                            <input type="text" size="40" class="form-control" name="district"
                             value="<?php if(!empty($_POST['district'])) echo $_POST['district']; ?>">
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
                               value="<?php if(!empty($_POST['contact'])) echo $_POST['contact']; ?>" required>
                              </div>
                              <div class="form-group col-md-10">
                              <label>Mobile</label><br>
                              <input type="text" size="40" class="form-control" name="mobile"
                               value="<?php if(!empty($_POST['mobile'])) echo $_POST['mobile']; ?>">
                               </div>
                          </div>
                          <div class="col-md-6">
                               <div class="form-group col-md-10">
                              <label>Email</label><br>
                              <input type="email" size="40" class="form-control" name="email"
                               value="<?php if(!empty($_POST['email'])) echo $_POST['email']; ?>">
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
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
