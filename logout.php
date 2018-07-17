<?php //require_once("includes/function.php"); ?>
<?php
    // find session
    session_start();

    //unset all session variables
    $_SESSION = array();

    // Destroy the session cookie
    if(isset($_COOKIE[session_name()])){
    	setcookie(session_name(), '', time()-42000, '/');
    }

    //Destroy the session
    session_destroy();
    $msg = "You are now logged out, Thank You";
    header('Location: login.php?logout=' . urlencode($msg));
    exit();
?>