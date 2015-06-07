<?php

require_once('fns.php');
session_start();
do_html_header('product category');
if(check_admin_user()){

display_product_category();
display_button("member.php", "back", "Go back");
}else{

echo '<p> you are not authorized to view this page!</p>';

}

do_html_footer();
?>