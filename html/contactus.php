<?php
/*
 * Programmer: Aaron Robinson
 * Date Created: 6/6/15
 * Version: 0.0.1
 */
include ('fns.php');
do_html_header('Contact Us');
?>

<?php
mysql_connect("localhost", "admin", "1admin") or die(mysql_error());
echo "Connected to MySQL<br />";
?>

<html>
<title>Contact Us</title>

<div>

</div>
</html>

<?php
do_html_footer();
?>
