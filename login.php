<?php 
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 

?>

<?php $login = "Log In - " . AS_TITLE; ?>

<?php
//clear error message
$error_msg = "";
 
// if the user is not logged in try to log them in
     if(isset($_POST['submit'])){
		    $email = escape_string($_POST['email']);		
			$password = escape_string($_POST['password']);
			//$level = $_POST['level'];
		
		//validation
		if(!empty($email) && !empty($password)){
				//look for user details in the database
				$query = "SELECT as_user_id, as_email, as_username FROM as_users WHERE as_email = '$email' AND as_password = SHA1('$password')";
				$data = mysql_query($query);
				confirm_result($data);
			
			if(mysql_num_rows($data) == 1){
				//login is ok
				$row = mysql_fetch_array($data);

				$_SESSION['as_user_id'] = $row['as_user_id'];
				$_SESSION['as_email'] = $row['as_email'];
				$_SESSION['as_username'] = $row['as_username'];
 
				header('Location: http://localhost/sms/admin.php');
			}else{
				
			   // email/ password incorrect
			   $error_msg = "Sorry, Your email and password do not match, Please try again";
			}
		}else{
			// email/password not entered
            $error_msg = "Sorry, You must enter an email, password to login";
		   }
		   echo "<p class=\"error\">" . $error_msg . "</p>";
         }
 ?>

<html>
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <!-- manifest -->
 <link rel="manifest" href="manifest.json">

   <meta name="apple-mobile-web-app-capable" content="yes">
   <meta name="apple-mobile-web-app-status-bar-style" content="black">
   <meta name="apple-mobile-web-app-title" content="AllSchool">

   <link rel="apple-touch-icon" href="images/short_allschool.png">

  <meta name="msapplication-TileImage" content="images/short_allschool.png">
  <meta name="msapplication-TileColor" content="#2F3BA2">
	
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="School Management System helps up to simplify school work">
    <meta name="author" content="Creative Summit">

    <!-- Favicon -->
    <link rel="icon" href="images/short_allschool.png">
    
	<title><?php echo $login; ?></title>
	
	<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">

	<!-- Manifest -->
	<link rel="manifest" href="manifest.json">
	
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet"> -->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<style type="text/css">
        .msg{
        	background: #97f7ae;
        	border: 1px solid green;
        	width: 16.5em;
        	position: absolute;
        	left: 21.4em;
        	top: 8.5em;
        	font-size: 24px;
        	padding: 10px 8px 0 6px;
        	color: green;

        }
        .error{
        	background: #fcafb3;
        	width: 20em;
        	position: absolute;
        	left: 20em;
        	top: 7em;
        	font-size: 24px;
        	padding: 12px 6px 0 4px;
        	color: #ef111b;
        }
	</style>
  </head>
  <body>
  
     <div class="fluid-container">
	         
          <?php if (isset($_GET['logout'])): ?>
              <div class="msg"><?php echo $_GET['logout']; ?></div>
	        <?php endif;?>	
	    <div id="login">

		   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="on">
		     <legend><?php echo $login; ?></legend>
		     
			 <div id="form-data">
			    <!-- <label for="username" class="form-control">Name: </label> -->
			    <input type="text" id="username" name="email" class="form-control" placeholder="Please enter your Email" autofocus="autofocus">
			    	  
			 </div>
			 <div id="form-data">
			    <!-- <label for="password" class="form-control">Password: </label> -->
			    <input type="password" id="password" class="form-control" name="password" placeholder="Enter password" autocomplete="off">
			   
			 </div>
			 <!-- <div id="form-data"> -->
			    <!-- <label for="level" class="form-control">Level: </label> -->
			    <!-- <select id="level" class="form-control" name="level">
				  <option value="" checked="checked">--- Select user level ---</option>
				  
				  <option value="administrator">Administrator</option>
				 
				</select>
				 -->
				
			 <!-- </div> -->
			 <div class="row">
			  <div  class="col-md-6" id="btnsend">
			  <!--submit button-->
			    <button name="submit" class="btn btn-lg btn-primary btn-block" id="loginbtn" type="submit">Log In</button>
			    <script type="text/javascript">

			    </script>
			  </div>
			    <div class="col-md-6" id="sign-up">
			        <ul class="list-unstyled">
				      <div class="row">
					     <div class="col-md-8">
						   <?php echo  "<a href=\"signup.php\" id=\"sign-up\"><li>Sign Up</li></a>" ?>
					     </div>
					     <!-- <div class="col-md-2">|</div> 
					       <div class="col-md-6">
						      <?php //echo "<a href=\"staff-registration.php\" id=\"sign-up\"><li>Register</li></a>"; ?>
						   </div> -->
					  </div>
			        </ul>
			    </div>
			 </div>
		   </form>
		</div>
	 </div>
  </body>
</html>