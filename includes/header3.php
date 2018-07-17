<?php 
require_once('includes/session.php');
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
<link rel="icon" href="images/short_allschool.png">

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
  <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/report.css">

   <!-- fullcalendar -->
 <!--  <link rel='stylesheet' href='includes/fullcalendar/lib/cupertino/jquery-ui.min.css' />
 <link href='fullcalendar/fullcalendar.min.css' rel='stylesheet' />
 <link href='fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' /> -->


 <!-- Manifest -->
  <link rel="manifest" href="manifest.json">

  <style type="text/css">
     .deleted{
         background: #8ef8a9;
         border: 1px solid #0ab135;
         width: 18em;
         padding: 5px;
         font-size: 16px;
     }
     .deleted2{
         color: #fff;
         background: #f55656;
         border: 1px solid #f81717;
         width: 18em;
         padding: 5px;
         font-size: 16px;
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

