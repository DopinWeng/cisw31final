<?php
/**
 * @project Name 			CISW31 Final Project
 * @project file            checkout.php 
 * @project number 			1.0.0
 * @Date 					05172015
 * @project Description 	Page that presents the users with complete order details. 
 * @Author					
 */
 include("fns.php");
 session_start();
 
 do_html_header("Checkout");
 if(($_SESSION['cart']) && (array_count_values($_SESSION['cart']))) {
    display_cart($_SESSION['cart'], false, 0);
    display_checkout_form();
  } else {
    echo "<p>There are no items in your cart</p>";
  }
 
 
 display_button("show_cart.php", "continue-shopping", "Continue Shopping");
 do_html_footer();
 

?>