<?php
/**
 * @project Name 			CISW31 Final Project
 * @project file            index.php 
 * @project number 			1.0.0
 * @Date 					05172015
 * @project Description 	index pages to show product category
 * @Author					Dopin
 */

#try to get the services categories and display the services under
#put a quantity dropdown menu (default 1) and an add to cart button at bottom of page

include ('fns.php');
 
session_start();
 
do_html_header();
  
  echo "Select a service category.";

  $cat_array = get_product_categories(); // get product categories

  // display as links to cat pages, we should modify it to our way to display product categories 
  display_categories($cat_array);


hello can u see me
  
  
do_html_footer();


?>
