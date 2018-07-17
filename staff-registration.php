<?php
// student admission processing
//database connection
require_once('includes/constant.php');
require_once('includes/function/function.php'); 
require_once('includes/dbconnect.php');

if(isset($_POST['submit'])){
     // form variables
    $surname =         escape_string($_POST['surname']);
    $firstname =                 escape_string($_POST['firstname']);
    $othername =               escape_string($_POST['othername']);
    $gender =             escape_string($_POST['gender']);
    $dob =             escape_string($_POST['dob']);
    $religion =                $_POST['religion'];
    $staff_category =           escape_string($_POST['staff_category']);
    $position =           escape_string($_POST['position']);
    $passport =              $_FILES['passport']['name'];
    $tmp_name =              $_FILES['passport']['tmp_name'];
    $core_subj =              escape_string($_POST['core_subj']);
    $other_subj =              escape_string($_POST['other_subj']);
    //$formerSchool =        escape_string($_POST['former-school']);
    //$prev_results =        $_FILES['prev-results']['name'];
    
    $date_joined =            escape_string($_POST['date_joined']);
    $nation =            escape_string($_POST['nation']);
    $physical_address =      escape_string($_POST['physical_address']);
    $district =              escape_string($_POST['district']);
    $mobile1 =               escape_string($_POST['mobile1']);
    $mobile2 =                escape_string($_POST['mobile2']);
    $email =                 escape_string($_POST['email']);
    
    //student admission number auto generation
      
     //initialize error message
       $form_error_msg = "";
      // form validation
       if(!empty($surname) && !empty($firstname) && !empty($dob) && !empty($nation) && 
          !empty($passport) && !empty($date_joined) && !empty($physical_address) && 
          !empty($mobile1)){
        // passport photo processing
             if($passport){
                $target = AS_UPLOADPATH . time() . "_" . $passport; 
                $pp = time() . "_" . $passport;
                 move_uploaded_file($tmp_name, $target);
                
               //if(move_uploaded_file($_FILES['passport-photo']['tmp_name']. $target) 
                 
               
        //Db insert
                $query_student_db = "INSERT INTO as_teacher(as_surname, as_firstname, as_othername, as_gender, as_dob, as_religion, as_staff_catagory, as_position, as_national, as_core_subj, as_other_subj, as_date_join, as_passport, as_physical_address, as_district, as_mobile1, as_mobile2, as_email)
                                                      VALUES('$surname', '$firstname', '$othername', '$gender', '$dob', '$religion', '$staff_category', '$position', '$nation', '$core_subj', '$other_subj', '$date_joined', '$pp', '$physical_address', '$district', '$mobile1', '$mobile2', '$email')";
                                                             
                  $data = mysql_query($query_student_db);
                  confirm_insert($data);


                
          
           //echo '<img src="' . AS_UPLOADPATH . $passportPhoto .'" alt="Score image">';
              $data_sent = "Your information has been sent, Thank you";
              echo "<p class=\"as_data_sent\" id=\"as_data_sent\">{$data_sent}</p>";
        header('Location: staff-view.php?message=' . $data_sent);
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

 
    <!-- manifest -->
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
<link rel="icon" href="images/allschool_logo.png">
<title>Staff</title>
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
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/staff-registration.css">
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
    
  </style>
</head>
<body>

<!-- logo -->
   <div>
     <img src="">
   </div>
    <!-- content -->
    
      <nav class="container-fluid">
       <a href="staff-view.php" class="btn btn-info">Back</a>
         <ul>
           <li><a href="">Staff Member Details</a></li>
           <!-- <li><a href="">Academics Details</a></li>
           <li><a href="">Employment History &amp; Interests</a></li> -->
         </ul>
      </nav>
      <div class="container">  
      <div>
        <h3>Staff Member Details</h3>
      </div>
      <div class="general-info">
        <h5>General Information</h5>
      </div>
      <div class="">
        <div class="">
          <form method="post" action="#" id="contactfrm" role="form" enctype="multipart/form-data">
               <div class="row">
               <div class="col-md-6">
              <div class="form-group col-md-10">
                <label for="surname">Surname:</label><br>
                <input type="text" size="70" ="" name="surname" 
                value="<?php if(!empty($_POST['surname'])) echo $_POST['surname']; ?>" class="form-control" id="surname" placeholder="" title="">
              </div>
              
              <div class="form-group col-md-10">
                <label for="firstname">First Name:</label><br>
                <input type="text" size="70" name="firstname" 
                value="<?php if(!empty($_POST['firstname'])) echo $_POST['firstname']; ?>" class="form-control" id="firstname" placeholder="" title="">
              </div>
            
              <div class="form-group col-md-10">
                <label for="othername">Other Name:</label><br>
                <input type="text" size="70" name="othername" 
                value="<?php if(!empty($_POST['othername'])) echo $_POST['othername']; ?>" class="form-control" id="othername" placeholder="" title="">
              </div>
              <div class="form-group col-md-10">
                <label for="gender">Gender:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" id="gender" value="Male" checked="checked" title="">&nbsp;&nbsp;&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" id="gender" value="Female" title="">&nbsp;&nbsp;&nbsp;&nbsp;Female
              </div>
              <div class="form-group col-md-10">
                <label for="dob">Date of birth</label><br>
                <input type="date" size="70" name="dob" 
                value="<?php if(!empty($_POST['dob'])) echo $_POST['dob']; ?>" class="form-control" id="dob" title="">
              </div>
              <div class="form-group col-md-10">
                <label for="religion">Religion</label><br>
                <input type="text" size="70" name="religion" 
                value="<?php if(!empty($_POST['religion'])) echo $_POST['religion']; ?>" class="form-control" id="religion" placeholder="" title=""" address">
              </div>
              <div class="form-group col-md-10">
                <label for="staff_category">Staff Category:</label><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select id="staff_category" name="staff_category" 
                value="<?php if(!empty($_POST['staff_category'])) echo $_POST['staff_category']; ?>" class="form-control">
                  <option>--select--</option>
                  <option>Administration</option>
                  <option>Teaching Staff</option>
                  <option>Non-teaching Staff</option>
                </select>
              </div>
              <div class="form-group col-md-10">
                <label for="position">Position:</label><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select id="position" name="position" 
                value="<?php if(!empty($_POST['position'])) echo $_POST['position']; ?>" class="form-control" >
                  <option>--select--</option>
                  <option>Head Teacher</option>
                  <option>DOS</option>
                  <option>Secretary</option>
                  <option>Bursar</option>
                  <option>Teacher</option>
                  <option>Cleaners</option>
                  <option>Cook</option>
                  <option>Wadens &amp; Metrons</option>
                  <option>Medical Personnels</option>
                  <option>Security</option>
                  <option>Lab Technicians</option>
                  <option>Driver</option>
                  <option>Coach</option>
                </select>
              </div>
              <div class="form-group col-md-10">
                <label for="nation">Nationality</label><br>
                <input type="text" size="70" name="nation" value="<?php if(!empty($_POST['nation'])) echo $_POST['nation']; ?>" class="form-control" id="nation" title="">
              </div>
              <!-- <div class="form-group">
                <label for="nationalid">National ID (NIN)</label><br>
                <input type="text" size="70" name="nationalid" value="<?php //if(!empty($_POST['firstname'])) echo $_POST['firstname']; ?>" id="nationalid" placeholder="Provide your NIN on your national ID" title="">
              </div> -->
              <div class="form-group col-md-10">
                <label for="selectSubject">Main Subject</label><br>
                <select class="form-control" name="core_subj" id="selectSubject" class="form-control">
                   <option value="">--Select--</option>
                    <?php 
                            $select_subj = mysql_query("SELECT * FROM as_subjects");
                            while ($subj = mysql_fetch_assoc($select_subj)) {
                    ?>
                  <option value="<?php echo $subj['as_subjectname']; ?>"><?php echo $subj['as_subjectname']; }?></option>
                </select>
              </div>
              <div class="form-group col-md-10">
                <label for="selectSubject">Other Subject</label><br>
                <select class="form-control" name="other_subj" id="selectSubject" class="form-control">
                   <option value="">--Select--</option>
                    <?php 
                            $select_subj = mysql_query("SELECT * FROM as_subjects");
                            while ($subj = mysql_fetch_assoc($select_subj)) {
                    ?>
                  <option value="<?php echo $subj['as_subjectname']; ?>"><?php echo $subj['as_subjectname']; }?></option>
                </select>
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group col-md-10">
                <label for="date_joined">Date Joined</label><br>
                <input type="date" size="70" name="date_joined" 
                value="<?php if(!empty($_POST['date_joined'])) echo $_POST['date_joined']; ?>" class="form-control" id="date_joined" placeholder="dd/mmm/yyyy" title="">
              </div>
              
              <div border="2" id="output" class="" alt=""></div>
              <div class="form-group col-md-10">
                      <label for="fileselect">Passport photo</label><br>
                     
                     
                     <input type="file" class="" name="passport" multiple="disable" size="40" id="fileselect" 
                      value="<?php if(!empty($_POST['passport'])) echo $_POST['passport']; ?>" class="form-control" placeholder="" title="">
              </div>
             <!--  -->
              <div class="form-group col-md-10">
                <label for="physical_address">Physical Address</label><br>
                <input type="text" size="70" name="physical_address" 
                value="<?php if(!empty($_POST['physical_address'])) echo $_POST['physical_address']; ?>" class="form-control" id="physical_address" placeholder="" title="">
              </div>
              <div class="form-group col-md-10">
                <label for="district">District</label><br>
                <input type="text" size="70" name="district" 
                value="<?php if(!empty($_POST['district'])) echo $_POST['district']; ?>" id="district" class="form-control" placeholder="" title="">
              </div>
              <div class="form-group col-md-10">
                <label for="">Contact Details</label><br>
              </div>
              <div class="form-group col-md-10">
                <label for="mobile1">Mobile 1:</label><br>
                <input type="tel" size="70" name="mobile1" 
                value="<?php if(!empty($_POST['mobile1'])) echo $_POST['mobile1']; ?>" id="mobile1" class="form-control" placeholder="" title=""" address">
              </div>
              <div class="form-group col-md-10">
                <label for="mobile2">Mobile 2:</label><br>
                <input type="tel" size="70" name="mobile2" 
                value="<?php if(!empty($_POST['mobile2'])) echo $_POST['mobile2']; ?>" id="mobile2" class="form-control" placeholder="" title=""" address">
              </div> 
              <div class="form-group col-md-10">
                <label for="email">Email</label><br>
                <input type="email" size="70" name="email" 
                value="<?php if(!empty($_POST['email'])) echo $_POST['email']; ?>" id="email" placeholder="" class="form-control" title=""" address">
              </div> 
            </div>
          </div>

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
        </form>
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