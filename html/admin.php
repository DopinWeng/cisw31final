<?php

//administrator manage backend page


require_once('fns.php');
session_start();

do_html_header('Adminstrator Management');

if(check_admin_user())


do_html_footer();

?>