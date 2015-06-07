<?php
/**
 * @project Name 			CISW31 Final Project
 * @project file            index.php 
 * @project number 			1.0.1
 * @Date 					05172015
 * @project Description 	index pages to show product category
 * @Author					Dopin, Aaron
 */
?>
 
 <?php
 function do_html_header($title=''){
 //print HTML Header
 // declare the session variables we want access to inside the function
 /* if (!$_SESSION['items']) {
    $_SESSION['items'] = '0';
  }
  if (!$_SESSION['total_price']) {
    $_SESSION['total_price'] = '0.00';
  }
  */
  if (!isset($_SESSION['items'])) {
    $_SESSION['items'] = '0';
  }
  if (!isset($_SESSION['total_price'])) {
    $_SESSION['total_price'] = '0.00';
  }
  
  
 ?>

<!DOCTYPE html>
 <html>
 <head>
 <title><?php echo $title; ?></title>
    <style>
      h2 { font-family: Arial, Helvetica, sans-serif; font-size: 22px; color: red; margin: 6px }
      body { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      li, td { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      hr { color: #FF0000; width=70%; text-align=center}
      a { color: #000000 }
    </style>
 </head>
 <body>
 
 <table width="100%" border="0" cellspacing="0" bgcolor="#cccccc">
  <tr>
  <td rowspan="2">
  <a href="index.php"><img src="assets/padre_logo.jpg" alt="PADRE" border="0"
       align="left" valign="bottom" height="55" width="325"/></a>
  </td>
  <td align="right" valign="bottom">
  <?php
     if(isset($_SESSION['admin_user'])) {
       echo "&nbsp;";
     } else {
       echo "Total Items = ".$_SESSION['items'];
     }
  ?>
  </td>
  <td align="right" rowspan="2" width="135">
  <?php
     if(isset($_SESSION['admin_user'])) {
       display_button('logout.php', 'log-out', 'Log Out');
     } else {
       display_button('show_cart.php', 'view-cart', 'View Your Shopping Cart');
     }
  ?>
  </tr>
  <tr>
  <td align="right" valign="top">
  <?php
     if(isset($_SESSION['admin_user'])) {
       echo "&nbsp;";
     } else {
       echo "Total Price = $".number_format($_SESSION['total_price'],2);
     }
  ?>
  </td>
  </tr>
  
	
<tr>	
	<td>
	<nav>
	 <a href ="index.php">Home</a>|
	 <a href ="aboutus.php">About Us</a>|
	 <a href ="contactus.php">Contact Us</a>|
	 <a href ="services.php">Services</a>|
	 <?php
	 if( isset($_SESSION['username'])){
	 echo '<a href ="logout.php">Log out</a>|';
	 echo '<a href ="member.php"> Member</a>';
	 }else { echo '<a href ="login.php">Log in</a>';}
	 ?>
	</nav>
	</td>
	<td align="right" valign="top">
	<p>Hello, <?php if(isset($_SESSION['username'])){echo $_SESSION['username'];}else {echo "guest!";} ?></p>
	</td>
</tr>
</table>
	<hr />
		
 <?php
  if($title) {
    do_html_heading($title);
  }
}

function do_html_footer() {
  // print an HTML footer
?>
  <div align="center">
      <p>
          <a href="#top">Back to top</a>
      </p>
  </div>
  </body>
  </html>

  <?php
}
function do_html_heading($heading) {
  // print heading
?>
  <h2><?php echo $heading;?></h2>
<?php
}

function do_html_URL($url, $name) {
  // output URL as link and br
?>
  <a href="<?php echo $url;?>"><?php echo $name;?></a><br />
  
<?php
}

function display_categories($cat_array)
{

if(!$cat_array){
echo "<br / >";
echo "There are no categories";}
else{
echo "<ul>";
foreach ($cat_array as $row){
	$url = "show_cat.php?productLine=".($row['productLine']);
	$title = $row['productLine'];
	echo "<li>";
	do_html_URL($url,$title);
	echo "</li>";
}
echo "</ul>";
echo "<hr />";
}
?>

<?php
}

function display_employees($employee_array)
{
//print_r ($employee_array);
if(!$employee_array){
echo "<br / >";
echo "Can't find a fit employee";}
else{
echo "<ul>";
	
	foreach ($employee_array as $row ){
	$employe_ID = $row['employeeNumber'];
	$employee = get_employee_detail($employe_ID);
	$url = "show_employee.php?employeeNumber=".($row['employeeNumber']);
	$title = $employee['lastName'];
	echo "<li>";
	do_html_URL($url,$title);
	echo "</li>";
	
		
		}
		echo "</ul>";
	}
}

function display_employee_detail($employee){
if (is_array($employee)) {
    echo "<table><tr>";
    //display the picture if there is one
    if (@file_exists("assets/".$employee['employeeNumber'].".jpg"))  {
      $size = GetImageSize("assets/".$employee['employeeNumber'].".jpg");
      if(($size[0] > 0) && ($size[1] > 0)) {
        echo "<td><img src=\"assets/".$employee['employeeNumber'].".jpg\"
              style=\"border: 1px solid black\"/></td>";
      }
    }
    echo "<td><ul>";
    echo "<li><strong>Employee Name:</strong> ";
    echo $employee['lastName']." ".$employee['firstName'] ;
    echo "</li><li><strong>email:</strong> ";
    echo $employee['email'];
    echo "</li><li><strong>Office Code:</strong> ";
    echo number_format($employee['officeCode'], 2);
    echo "</li><li><strong>Job Title:</strong> ";
    echo $employee['jobTitle'];
    echo "</li></ul></td></tr></table>";
  } else {
    echo "<p>The details of this employee cannot be displayed at this time.</p>";
  }
  echo "<hr />";
}

function display_button($target, $image, $alt) {
  echo "<div align=\"center\"><a href=\"".$target."\">
          <img src=\"assets/".$image.".gif\"
           alt=\"".$alt."\" border=\"0\" height=\"50\"
           width=\"135\"/></a></div>";
	}

function display_form_button($image, $alt) {
  echo "<div align=\"center\"><input type=\"image\"
           src=\"assets/".$image.".gif\"
           alt=\"".$alt."\" border=\"0\" height=\"50\"
           width=\"135\"/></div>";
	}


function select_employee_skills_form($employeeID){
//Form in employee page to select employee skills
	$skills = get_employee_skills($employeeID);
	$size = count($skills);
	
	echo '<table>';
	echo "<form method='POST' action='show_cart.php' id='skillform'>";
	echo '<input type="hidden" id="str" name="str" value="" /> ';
	echo "<tr>";
	echo '<th><input type="hidden" id="skillsize" name="skillsize" value='.$size.'></th>';
	echo "<th>Skill Code</th>";
	echo "<th>Skill Name</th>";
	echo "</tr>";
	$i=1;
	foreach ($skills as $row ){
	$skill_ID = $row['productCode'];
	$product = get_product_details($skill_ID);
	
	echo "<tr>";
	echo '<th><input type="checkbox" value="'.$skill_ID.'" id="skill'.$i.'"></th><th>'.$skill_ID."</th>";
	echo  '<th>'.$product['productName'].'</th>';
	echo "</tr>";
	
	$i++;	
		}
	echo "<input type=\"image\" src=\"assets/add-to-cart.gif\" alt=\"Add to Cart\" border=\"0\" height=\"50\" width=\"135\"/>";
	echo "</form>";	
	echo '</table>';
	}

	function display_cart($cart, $change = true, $images = 1){
	// display items in shopping cart
  // optionally allow changes (true or false)
  // optionally include images (1 - yes, 0 - no)

   echo "<table border=\"0\" width=\"100%\" cellspacing=\"0\">
         <form action=\"show_cart.php\" method=\"post\">
         <tr>
		 <th bgcolor=\"#cccccc\">Service #</th>
		 <th bgcolor=\"#cccccc\">Service Description</th>
         <th bgcolor=\"#cccccc\">Price</th>
         <th bgcolor=\"#cccccc\">Quantity</th>
         <th bgcolor=\"#cccccc\">Total</th>
         </tr>";

	  //display each item as a table row
	  foreach ($cart as $productCode => $qty)  {
		$product = get_product_details($productCode);
		echo "<tr>";	  
		echo "<td align=\"center\">".$product["productCode"]."</td>
			  <td align=\"center\">".$product["productDescription"]."</td>
			  <td align=\"center\">".number_format($product["buyPrice"])."</td>
			  <td align=\"center\">";
			  
		// if we allow changes, quantities are in text boxes
		if ($change == true) {
		  echo "<input type=\"text\" name=\"".$productCode."\" value=\"".$qty."\" size=\"3\">";
		} else {
		  echo $qty;
		}
		echo "</td><td align=\"center\">\$".number_format($product["buyPrice"]*$qty,2)."</td></tr>\n";
	  }
	  // display total row
	  echo "<tr>
			<th colspan=3 bgcolor=\"#cccccc\">&nbsp;</td>
			<th align=\"center\" bgcolor=\"#cccccc\">".$_SESSION['items']."</th>
			<th align=\"center\" bgcolor=\"#cccccc\">
				\$".number_format($_SESSION['total_price'], 2)."
			</th>
			</tr>";

	  // display save change button
	  if($change) {
		echo "<tr>
			  <td colspan=\"".(2+$images)."\">&nbsp;</td>
			  <td align=\"center\">
				 <input type=\"hidden\" name=\"save\" value=\"true\"/>
				 <input type=\"image\" src=\"assets/save-changes.gif\"
						border=\"0\" alt=\"Save Changes\"/>
			  </td>
			  <td>&nbsp;</td>
			  </tr>";
	  }
	  echo "</form></table>";
	}
	
	
	//display checkout form
	function display_checkout_form(){
?>	
	<br />
	<table border="0" width="100%" cellspacing="0">
	<form action="purchase.php" method="post">
			  <tr><th colspan="2" bgcolor="#cccccc">Your Details</th></tr>
		  <tr>
			<td>Name</td>
			<td><input type="text" name="name" value="" maxlength="40" size="40"/></td>
		  </tr>
		  <tr>
			<td>First Name</td>
			<td><input type="text" name="firstname" value="" maxlength="40" size="40"/></td>
		  </tr>
		  <tr>
			<td>Last Name</td>
			<td><input type="text" name="lastname" value="" maxlength="40" size="40"/></td>
		  </tr>
		  <tr>
			<td>Phone</td>
			<td><input type="text" name="phone" value="" maxlength="40" size="40"/></td>
		  </tr>
		  <tr>
			<td>Address 1</td>
			<td><input type="text" name="address1" value="" maxlength="40" size="40"/></td>
		  </tr>
		  <tr>
			<td>Address 2</td>
			<td><input type="text" name="address2" value="" maxlength="40" size="40"/></td>
		  </tr>
		  <tr>
			<td>City/Suburb</td>
			<td><input type="text" name="city" value="" maxlength="20" size="40"/></td>
		  </tr>
		  <tr>
			<td>State/Province</td>
			<td><input type="text" name="state" value="" maxlength="20" size="40"/></td>
		  </tr>
		  <tr>
			<td>Postal Code or Zip Code</td>
			<td><input type="text" name="zip" value="" maxlength="10" size="40"/></td>
		  </tr>
		  <tr>
			<td>Country</td>
			<td><input type="text" name="country" value="" maxlength="20" size="40"/></td>
		  </tr>
		  <tr><th colspan="2" bgcolor="#cccccc">Shipping Address (leave blank if same as above)</th></tr>
		  <tr>
			<td>Name</td>
			<td><input type="text" name="ship_name" value="" maxlength="40" size="40"/></td>
		  </tr>
		  <tr>
			<td>Address</td>
			<td><input type="text" name="ship_address" value="" maxlength="40" size="40"/></td>
		  </tr>
		  <tr>
			<td>City/Suburb</td>
			<td><input type="text" name="ship_city" value="" maxlength="20" size="40"/></td>
		  </tr>
		  <tr>
			<td>State/Province</td>
			<td><input type="text" name="ship_state" value="" maxlength="20" size="40"/></td>
		  </tr>
		  <tr>
			<td>Postal Code or Zip Code</td>
			<td><input type="text" name="ship_zip" value="" maxlength="10" size="40"/></td>
		  </tr>
		  <tr>
			<td>Country</td>
			<td><input type="text" name="ship_country" value="" maxlength="20" size="40"/></td>
		  </tr>
		  <tr>
			<td>Required Date</td>
			<td><input type="date" name="required_date" value="" maxlength="20" size="40"/></td>
		  </tr>
		  <tr>
			<td colspan="2" align="center"><p><strong>Please press Purchase to confirm
				 your purchase, or Continue Shopping to add or remove items.</strong></p>
			 <?php display_form_button("purchase", "Purchase These Items"); ?>
			</td>
		  </tr>

	</form>
	</table>
<?php
	}
	
function display_shipping($shipping_cost){
?>
  <table border="0" width="100%" cellspacing="0">
  <tr><td align="left">Shipping</td>
      <td align="right"> <?php echo number_format($shipping_cost, 2); ?></td></tr>
  <tr><th bgcolor="#cccccc" align="left">TOTAL INCLUDING SHIPPING</th>
      <th bgcolor="#cccccc" align="right">$ <?php echo number_format($shipping_cost+$_SESSION['total_price'], 2); ?></th>
  </tr>
  </table><br />
<?php
}
function display_card_form($name) {
  //display form asking for credit card details
?>
  <table border="0" width="100%" cellspacing="0">
  <form action="process.php" method="post">
  <tr><th colspan="2" bgcolor="#cccccc">Credit Card Details</th></tr>
  <tr>
    <td>Type</td>
    <td><select name="card_type">
        <option value="VISA">VISA</option>
        <option value="MasterCard">MasterCard</option>
        <option value="American Express">American Express</option>
        </select>
    </td>
  </tr>
  <tr>
    <td>Number</td>
    <td><input type="text" name="card_number" value="" maxlength="16" size="40"></td>
  </tr>
  <tr>
    <td>AMEX code (if required)</td>
    <td><input type="text" name="amex_code" value="" maxlength="4" size="4"></td>
  </tr>
  <tr>
    <td>Expiry Date</td>
    <td>Month
       <select name="card_month">
       <option value="01">01</option>
       <option value="02">02</option>
       <option value="03">03</option>
       <option value="04">04</option>
       <option value="05">05</option>
       <option value="06">06</option>
       <option value="07">07</option>
       <option value="08">08</option>
       <option value="09">09</option>
       <option value="10">10</option>
       <option value="11">11</option>
       <option value="12">12</option>
       </select>
       Year
       <select name="card_year">
       <?php
       for ($y = date("Y"); $y < date("Y") + 10; $y++) {
         echo "<option value=\"".$y."\">".$y."</option>";
       }
       ?>
       </select>
  </tr>
  <tr>
    <td>Name on Card</td>
    <td><input type="text" name="card_name" value = "<?php echo $name; ?>" maxlength="40" size="40"></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <p><strong>Please press Purchase to confirm your purchase, or Continue Shopping to
      add or remove items</strong></p>
     <?php display_form_button('purchase', 'Purchase These Items'); ?>
    </td>
  </tr>
  </table>
<?php
}

function display_login_form(){
?>

<form method="post" action="member.php">
 <table bgcolor="#cccccc">
   <tr>
     <td>Username:</td>
     <td><input type="text" name="username"/></td></tr>
   <tr>
     <td>Password:</td>
     <td><input type="password" name="passwd"/></td></tr>
   <tr>
     <td colspan="2" align="center">
     <input type="submit" value="Log in"/></td></tr>
   <tr>
 </table></form>

<?php
}

function display_member_order_history($user_orders){
	if ((is_array($user_orders)) && (count($user_orders) > 0)) 
	{
    echo 
		'<table border=\"0\" width=\"100%\" cellspacing=\"0\">
			<tr>
				<th>Order Number</th>
				<th>Order Date</th>
				<th>Status</th>
				<th>Order Amount</th>
				<th>Comments</th>		
			</tr>';
	 foreach($user_orders as $key=>$arr){
			echo
			'<tr>
				<td>'.$arr['orderNumber'].'</td>
				<td>'.$arr['orderDate'].'</td>
				<td>'.$arr['status'].'</td>
				<td>'.$arr['amount'].'</td>
				<td>'.$arr['comments'].'</td>
			</tr>';
		}			
		echo '</table>';

	}else{
		echo "No Order History!";
	}
}

?>

