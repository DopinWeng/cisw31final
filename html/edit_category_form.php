<?php

require_once('fns.php');
session_start();

do_html_header('edit product category ');

if(check_admin_user()){

if(isset($_GET['catid'])){
$category_id =$_GET['catid'];}
else{ 
$category_id = '';
}
echo $_GET['catid'];
//echo $_GET['edit'];
display_category_form($category_id);

}else{
echo '<p> you are not authorized to view this page!</p>';
}
do_html_footer();

?>