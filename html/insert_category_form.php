<?php
/**
 * @project Name 			CISW31 Final Project
 * @project file            insert_category_form.php 
 * @project number 			1.0.0
 * @Date 					05172015
 * @project Description 	Form to let adminstrators add a new category to the database
 * @Author					
 */

require_once('fns.php');
session_start();

do_html_header('add new category');

if(check_admin_user()){
display_insert_category_form();
}else{
echo '<p> you are not authorized to view this page!</p>';
}


do_html_footer();



?>