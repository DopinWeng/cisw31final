<?php

//
require_once("fns.php");
session_start();

if(isset($_POST['username']) && isset($_POST['passwd'])){

	$username = $_POST['username'];
	$password = $_POST['passwd'];
	
	try{
		login($username,$password);
		//$_SESSION['username'] = $username;
	
	}catch(Exception $e)  {
    // unsuccessful login
    do_html_header('Error:');
    echo 'You could not be logged in.
          You must be logged in to view this page.';
    do_html_url('login.php', 'Login');
    do_html_footer();
    exit;
  }
  
}
	
	
do_html_header('Member');
if(isset($_SESSION['userid'])){
$orders = get_member_orders($_SESSION['userid']);
display_member_order_history($orders); //show member orders history
}else{
	echo "Please log in to your account";
	
}


if(check_admin_user()){
display_admin_menu(); //show memebr management menu
}
display_button("index.php", "back", "Go back");
do_html_footer();


?>