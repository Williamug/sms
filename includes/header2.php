<?php 
require_once('includes/session.php');
confirm_logged_in();
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 

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
<link rel="shortcut icon" href="images/short_allschool.png">

<title><?php echo AS_TITLE; ?></title>
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
  <link rel="stylesheet" type="text/css" href="css/dashboard2.css">
  <link rel="stylesheet" type="text/css" href="css/tooltip-viewport.css">
  <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">

   <!-- fullcalendar -->
  <link rel='stylesheet' href='includes/fullcalendar/lib/cupertino/jquery-ui.min.css' />
 <link href='fullcalendar/fullcalendar.min.css' rel='stylesheet' />
 <link href='fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />


 <!-- Manifest -->
  <link rel="manifest" href="manifest.json">
  
  <!--err css-->
  <style>
     .err{
		 background: #f38282;
		 padding: 5px;
		 color: #fff;
     border-radius: 8px;
     max-width: 12em;
	 }
	 .noresult{
		 background: red;
		 width: 400px;
		 height: 200px;
		 margin-top: 40px;
		 margin-left: 200px;
		 padding: 20px;
		 color: #fff;
		 font-size: 20px;
		 position: relative;
		 top: 10px;
	 }
	 a .action{
		 color: #000;
	 }
   #result_data{
     font-size: 20px;
   }
   label{
    font-size: 16px;
   }
   .as_container{
      background: #f6f6f6;
      padding-top: 14px;
      padding-bottom: 30px;
      border: 1px solid #eee;
   }
     #payment-nav{
      background: #eee;
      border-bottom: 1px solid #e6e6e6;
     }
     .payment-li{
         padding-top: 12px;
         display: inline-block;
     }

     #receipt-id{
      color: red;
     }
     #line{
      border: 1px solid #000;
     }
     .as_welcome_note{
           font-size: 16px;
           background: green;
           color: #fff;
           width: 14em;
           padding: 4px;
           position: absolute;
           left: 41em;
           bottom: 59em;
           border-radius: 10px;
       }
       .as_underline{
        border-bottom: 1px dotted #000;
        
       }
       address li{
        list-style: none;
       }
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
        .update{
          background: #97f7ae;
          border: 1px solid green;
          width: 16.5em;
          position: absolute;
          left: 21.4em;
          top: 5.5em;
          font-size: 24px;
          padding: 10px 8px 0 6px;
          color: green;

        }
        .col-md-9 h4{
          background: tan;
          padding: 1em;
          width: 12em;
          color: #fff;
        }
        #present{
          color: #fff;
          background: green;
          padding: 5px;
          border-radius: 8px;
          width: 5em;
        }
        #absent{
          color: #fff;
          background: #ff0000;
          padding: 5px;
          border-radius: 8px;
          width: 5em;
        }
        table th, table td{
          font-size: 12px;
          border: 1px solid #e7e3e3;
       }
       table th{
         background: #eee;
       }


  </style>
</head>

<body>
<!-- Nav -->
 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
           <!-- Logo -->

  <div id="logo"> 
  <br>
    <a href="admin.php"><img src="images/allschool_logo.png" alt="Logo" width="70" height="130"></a>
  </div>
</div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">       
            <li><a href="#" ><span class="fa fa-user-circle"></span> Howdy, <?php echo $_SESSION['as_username']; ?></a>
               <ul class="dropdown-menu">
                 <li>
                   <a href="#">Action</a>
                 </li>
                 <li>
                  <a href="#">Another action</a>
                 </li>
                </ul>
            </li>
            <li><a href="logout.php">Log Out</a></li>
            <!-- <li><a href="#">Settings</a></li>
            <li><a href="#">Help</a></li> -->
            </div>
          </ul>
         
        </div>
      </div>
    </nav>
    <!-- content -->  
     <div class="container-fluid">
      <div class="row">
      <!-- sidebar --> 
         <div class="col-sm-3 col-md-2 sidebar">
        </section> 
        
        <!-- List -->
        <br><br><br><br><br><br>
          <ul class="nav nav-sidebar">
            <li class="active"><a href="admin.php"><span class="glyphicon glyphicon-th">&nbsp;Dashboard <span class="sr-only">(current)</span></span></a></li>
            <li><a href="class.php"><span class="glyphicon glyphicon-blackboard">&nbsp;Class</span></a></li>
            <li><a href="subject.php"><span class="glyphicon glyphicon-tasks">&nbsp;Subjects</span></a></li>
            <!-- <li><a href="attendence-view.php"><span class="fa fa-list-alt">&nbsp;&nbsp;&nbsp;&nbsp;Attendance</span></a></li> -->
            <li><a href="report-manage.php"><span class="fa fa-file-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Exams &amp; Marks</span></a></li>
           <!--  <li><a href=""><span class="fa fa-calendar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Timetable</span></a></li> -->
            <li><a href="accounts.php"><span class="fa fa-credit-card">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accounts</span></a></li>
            <!-- <li><a href="#"><span class="fa fa-book">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Library <span class="sr-only">(current)</span></span></a></li> -->
            <li><a href="transport.php"><span class="fa fa-bus">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transport</span></a></li>
            <!-- <li><a href="#"><span class="fa fa-bed">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Domitories</span></a></li>
            <li><a href="#"><span class="fa fa-newspaper-o">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Notice board</span></a></li> -->
            <li><a href="settings.php"><span class="fa fa-gear">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Settings</span></a></li>
          </ul>
        </div>
          <!-- Dashboard -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"> 
    