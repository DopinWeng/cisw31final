<?php

/**
 * @project Name 			CISW31 Final Project
 * @project file            index.php 
 * @project number 			1.0.0
 * @Date 					05172015
 * @project Description 	Collection of functions for authenticating administrative user
 * @Author					
 */
require_once('db_fns.php');

function login($username,$password){
// check username and password with db
// if yes, return true
// else throw exception

  // connect to db
  $conn = db_connect();

  // check if username is unique
  $result = $conn->query("select * from user
                         where Username='".$username."' and Password = sha1('".$password."')");
  if (!$result) {
     throw new Exception('Could not log you in.');
  }

  if ($result->num_rows>0) {
  
	 $user = $result->fetch_object(); 
	 $_SESSION['username'] = $username;
	 $_SESSION['userid'] =  $user->UserID;
     return true;
  } else {
     throw new Exception('Could not log you in.');
  }
}

function check_admin_user() {
// see if somebody is logged in and notify them if not

  if (isset($_SESSION['username'])) {
     // connect to db
  $username = $_SESSION['username'];	 
	 
  $conn = db_connect();

  // check if username is unique
  $result = $conn->query("select * from user where Username='".$username."'");
	
	$user = $result->fetch_object();
	return true;
	
	if(($user->Level) == 1){
	return true;
	}else{	
	return false;
	}	
	
  }else {
	return false;
  }
}


 ?>