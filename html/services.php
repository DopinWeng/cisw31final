<?php
/*
 * Programmer: Aaron Robinson
 * Date Created: 6/6/15
 * Version: 0.0.1
 */
include ('fns.php');
do_html_header('Services');

$servername = "localhost";
$username = "root";
$password = "cisw31";
$dbname = "CISW31-1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
echo "Connected to " . $dbname . " database.";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>

<div>
    <div><h3>Security</h3>
    Apache Security - Apache web server security system deployment
    Nginx Security - Nginx web server security system deployment
    </div>

    <div>
    <h3>Home Improvement</h3>
    Plumbing - Piping, water systems, sewage systems
    Landscaping - Front and backyard terrain shaping
    </div>

    <div>
    <h3>Automobile</h3>
    Auto A/C - Automobile air conditioning
    Auto Sound Systems - Automobile sound systems install and repair
    </div>

    <div>
    <h3>Website Development</h3>
    PHP development - PHP code for web servers
    HTML development - HTML code for web servers
    </div>
</div>

<?php
do_html_footer();
?>