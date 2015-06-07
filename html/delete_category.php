<?php

require_once('fns.php');
session_start();

do_html_header('insert');

if(isset($_GET['catid'])){
$category_id =$_GET['catid'];}
else{ 
$category_id = '';
}


if (check_admin_user()) {
 
    if(delete_category($category_id)) {
      echo "<p>Category was deleted.</p>";
	  header('Location:edit_product_category.php');
    } else {
      echo "<p>Product Category could not be deleted.</p>";
    }
  } else {
    echo "<p>You are not authorized to view this page.  Please try again.</p>";
	
  }
  
  display_button("edit_product_category.php", "back", "Go back");
  do_html_footer();

?>