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
#mysql_connect("localhost", "root", "cisw31") or die(mysql_error());
#mysql_select_db("cisw31") or die(mysql_error());
#echo "Connected to Database";
$servername = "localhost";
$username = "root";
$password = "cisw31";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
echo "Connected to MySQL";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<html>
<title>Contact Us</title>
<style>
    div {
        font-family: "Arial";
        font-size: 16px;
        padding-top: 25px;
        padding-right: 50px;
        padding-bottom: 25px;
        padding-left: 50px;
    }
</style>
<div align="center">
    <h2>Employee Contact Info</h2>
    <div>
        <img src="img/paul.png" alt="Paul Chiu" height="200" width="200"> <br>
        <a href="aboutus.php#paul">Paul Chiu</a> <br>
        Phone: (626) 555-7271<br>
        email: paul@sugarpadre.com
    </div>
    <div>
        <img src="img/aaron.png" alt="Aaron Robinson" height="200" width="200"><br>
        <a href="aboutus.php#aaron">Aaron Robinson</a> <br>
        Phone: (909) 555-8281<br>
        email: aaron@sugarpadre.com
    </div>
    <div>
        <img src="img/dopin.png" alt="Dopin Weng" height="200" width="200"><br>
        <a href="aboutus.php#dopin">Dopin Weng</a> <br>
        Phone: (626) 555-1258<br>
        email: dopin@sugarpadre.com
    </div>
</div>
<div align="center">
    <h2>Office Locations</h2>
    <div>
        1100 N Grand Ave, Los Angeles, CA, 91788, USA <br>
        Phone: +1 650 219 4782 <br>
        Hours: 8am-6pm Monday-Friday (Local time)
    </div>
    <div>
        1550 Court Place Suite 102, Boston, MA, 02107, USA <br>
        Phone: +1 215 837 0825 <br>
        Hours: 8am-5pm Monday-Friday (Local time)
    </div>
    <div>
        523 East 53rd Street apt 5A, New York City, NY, 10022, USA <br>
        Phone: +1 212 555 3000 <br>
        Hours: 8am-5pm Monday-Friday (Local time)
    </div>
    <div>
        43 Rue Jouffroy D'abbans, Paris, France, 75017 <br>
        Phone: +33 14 723 4404 <br>
        Hours: 8am-4pm Monday-Friday (Local time)
    </div>
    <div>
        4-1 Kioicho, Tokyo, Chiyoda-Ku, Japan, 102-8578 <br>
        Phone: +81 33 224 5000 <br>
        Hours: 8am-6pm Monday-Friday (Local time)
    </div>
    <div>
        5-11 Wentworth Avenue Floor #2, Sydney, Sydney, Australia, NSW 2010 <br>
        Phone: +61 2 9264 2451 <br>
        Hours: 8am-6pm Monday-Friday (Local time)
    </div>
    <div>
        25 Old Broad Street Level 7, London, UK, EC2N 1HN <br>
        Phone: +44 20 7877 2041 <br>
        Hours: 8am-6pm Monday-Friday (Local time)
    </div>
</div>
</html>

<?php
do_html_footer();
?>
