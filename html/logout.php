<?php
/**
 * @project Name 			CISW31 Final Project
 * @project file            logout.php 
 * @project number 			1.0.0
 * @Date 					05172015
 * @project Description 	Log Out Page
 * @Author					
 */

require_once('fns.php');
session_start();
$old_user = $_SESSION['username'];  // store  to test if they *were* logged in
unset($_SESSION['username']);
unset($_SESSION['userid']);
session_destroy();

// start output html
do_html_header("Logging Out");

if (!empty($old_user)) {
  echo "<p>You have Successful Logged out.</p>";
} else {
  // if they weren't logged in but came to this page somehow
  echo "<p>You were not logged in, and so have not been logged out.</p>";
  do_html_url("login.php", "Login");
}

do_html_footer();

 
?>