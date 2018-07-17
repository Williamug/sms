<?php
 require_once("includes/session.php");
// student admission processing
//database connection
require_once('includes/constant.php');
require_once('includes/function/function.php'); 
require_once('includes/dbconnect.php');

if(isset($_POST['signup'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = sha1($_POST['password']);
        $repassword = sha1($_POST['repassword']);

     //initialize error message
       $form_error_msg = "";
      // form validation
       if(!empty($username) && !empty($email) && !empty($password)){
          if ($password == $repassword) {
               
        //Db insert
                $query_student_db = "INSERT INTO as_users(as_email, as_password, as_username) VALUES('$email', '$password', '$username')";
                                                             
								  $data = mysql_query($query_student_db);
                  confirm_insert($data);

              $data_sent = "Your account has been created";
              echo "<p class=\"as_data_sent\" id=\"as_data_sent\">{$data_sent}</p>";
			        header('Location: signup.php?message=' . $data_sent);
         }else{
             $form_error_msg = "Sorry, passwords do not match";
             echo "<p class=\"form_error_msg\"> {$form_error_msg} </p>";
         }
       }else{
           $form_error_msg = "Please check all the fields and make sure the passwords match";
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
<title>Sign Up - <?php echo AS_TITLE; ?></title>
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
  <link rel="stylesheet" href="css/staff-registration_signup.css">
  <link rel="stylesheet" href="css/admission.css">
  <!-- <link rel="stylesheet" href="css/dashboard.css"> -->
  <link rel="stylesheet" type="text/css" href="css/staff-registration_signup.css">

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
        <h2 class="sign-up">Sign Up Form</h2>
      </div>
      <br>
      <br>
      <div class="">
        <div class="">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactfrm" role="form" enctype="multipart/form-data">
                  <fieldset>
                  <!-- <legend>Student Details</legend> -->
                    <div class="row">
                      <div class="col-md-6">
                          
                            <div class="form-group col-md-10">
                                 <label for="username">Username</label><br>
                                 <input type="text" class="form-control" name="username" size="40" id="username"  
                                 value="<?php if(!empty($_POST['username'])) echo $_POST['username']; ?>" placeholder="" title="" required>
                          </div>
                          <div class="form-group col-md-10">
                                 <label for="email">Email</label><br>
                                 <input type="email" class="form-control" name="email" size="40" id="email" 
                                 value="<?php if(!empty($_POST['email'])) echo $_POST['email']; ?>" placeholder="" title="" required>
                          </div>
                          <div class="form-group col-md-10">
                                 <label for="password">Password</label><br>
                                 <input type="password" class="form-control" name="password" size="40" id="password" 
                                 value="<?php if(!empty($_POST['password'])) echo $_POST['password']; ?>" placeholder="" title="">
                          </div>
                           <div class="form-group col-md-10">
                                 <label for="repassword">Confirm Password</label><br>
                                 <input type="password" class="form-control" name="repassword" size="40" id="repassword" 
                                 value="<?php if(!empty($_POST['repassword'])) echo $_POST['repassword']; ?>" placeholder="" title="">
                          </div>
                          <div class="form-group col-md-10 btnSignUp">
                            <button class="btn btn-success" name="signup" type="submit">Sign up</button>
                          </div>
                         </div>

                      </div>
                    </fieldset>
                  </form>
                  <br><br><br>
                  <hr>

                 <div class="footer-sms">
                      <p>&copy; <?php echo date('Y') ?> AllSchool, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
