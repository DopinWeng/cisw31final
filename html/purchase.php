<?php

  include ('fns.php');
  // The shopping cart needs sessions, so start one
  session_start();

  do_html_header("Payment");

  // create short variable names
  $name = $_POST['name'];
  $full_name = $_POST['lastname'].' '.$_POST['firstname'];
  $address = $_POST['address1'];
  if(isset($_POST['address2'])){
  $address2 = $_POST['address2'];
  }else{$address2 = "";}
  $city = $_POST['city'];
  $zip = $_POST['zip'];
  $country = $_POST['country'];

  // if filled out
  if (($_SESSION['cart']) && ($name) && ($address) && ($city) && ($zip) && ($country)) {
    // able to insert into database
    if(insert_order($_POST) != false ) {
      //display cart, not allowing changes and without pictures
      display_cart($_SESSION['cart'], false, 0);
      display_shipping(calculate_shipping_cost());

      //get credit card details, display credit card form
      display_card_form($full_name);
		
      display_button("show_cart.php", "continue-shopping", "Continue Shopping");
    } else {
      echo "<p>Could not store data, please try again.</p>";
      display_button('checkout.php', 'back', 'Back');
    }
  } else {
    echo "<p>You did not fill in all the fields, please try again.</p><hr />";
    display_button('checkout.php', 'back', 'Back');
  }

  do_html_footer();
?>
