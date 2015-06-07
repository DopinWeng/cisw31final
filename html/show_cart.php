<?php
/**
 * @project Name 			CISW31 Final Project
 * @project file            show_cart.php 
 * @project number 			1.0.0
 * @Date 					05172015
 * @project Description 	page to show shopping cart
 * @Author					
 **/
 
 include('fns.php');
 session_start();
 
 //@$new = $_GET['new'];
  
 // obtain the information from URL to array , for example $data: "skill1=100001&skill2=100002"
 // and parse_str will decode URL query to array, $output['skill1']=100001, $output['skill2']=100002
 $data = $_SERVER['QUERY_STRING'];
 parse_str($data,$output);
 
 //check is set session cart, if not, set up default value
 if(!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = array();
      $_SESSION['items'] = 0;
      $_SESSION['total_price'] ='0.00';
 }
 
 foreach($output as $key=>$value){
	if($value){
		if(isset($_SESSION['cart'][$value])) {
		  $_SESSION['cart'][$value]++;
		} else {
		  $_SESSION['cart'][$value] = 1;
		}
	}
 }
 
  if(isset($_POST['save'])) {

    foreach ($_SESSION['cart'] as $productCode => $qty) {
      if($_POST[$productCode] == '0') {
        unset($_SESSION['cart'][$productCode]);
      } else {
        $_SESSION['cart'][$productCode] = $_POST[$productCode];
      }
    }
    $_SESSION['total_price'] = calculate_price($_SESSION['cart']);
    $_SESSION['items'] = calculate_items($_SESSION['cart']);
  }

 
 do_html_header("you shopping cart");
 
  if(($_SESSION['cart']) && (array_count_values($_SESSION['cart']))) {
	display_cart($_SESSION['cart']);
  } else {
    echo "<p>There are no items in your cart</p><hr/>";
  }
 
 display_button("index.php","continue-shopping","back to home");
 display_button("checkout.php","go-to-checkout","Go To Checkout");
 
 
 do_html_footer();

 
 ?>