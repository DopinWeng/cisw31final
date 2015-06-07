<?php

require_once('fns.php');
session_start();

do_html_header('insert');

if (check_admin_user()) {
  
  
    $categoryname = $_POST['categoryname'];
    $Description = $_POST['Description'];
    $htmlDescription = $_POST['htmlDescirption'];
    $image = $_POST['image'];
  	  	
    if(insert_category($categoryname, $Description, $htmlDescription, $image)) {
      echo "<p>Category was added.</p>";
	  header('Location:edit_product_category.php');
    } else {
      echo "<p>Product Category could not be added.</p>";
    }
  } else {
    echo "<p>You have not filled out the form.  Please try again.</p>";
	
  }
  
  display_button("edit_product_category.php", "back", "Go back");
  do_html_footer();
?>