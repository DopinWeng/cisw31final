<?php
/**
 * @project Name 			CISW31 Final Project
 * @project file            show_member.php 
 * @project number 			1.0.0
 * @Date 					05172015
 * @project Description 	page to show member detail
 * @Author					
 **/

 include('fns.php');
 session_start();
 
 //get Employee Information Data from Database
 $employee_ID = $_GET['employeeNumber'];
 $employee = get_employee_detail($employee_ID);
 $employee_name = $employee['lastName']." ".$employee['firstName']; 
//header   
 //do_html_header($employee_name);
 $title = $employee_name;
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
	<script language="javascript" type="text/javascript">
	/*		function exefunction(){
				var skill_array =[];
				var skill_size = document.getElementById("skillsize").value;
				var skill_length = parseInt(skill_size);
				
				for (i = 1; i < skill_length+1; i++) {
					var productCode = document.getElementById("skill"+i).value;
					var lfckv = document.getElementById("skill"+i).checked;
						if(lfckv){
						skill_array.push(productCode); 
						}
					}
				//collect enable array from check box
				$(document).ready(function(){
				$("#btn").click( function() {
					$.post( $("#skillform").attr("action"),
						 $('#str').val(JSON.stringify(skill_array)),  
						 //$("#myForm :input").serializeArray(), 
						 function(info){ $("#result").html(info); 
					});
				});
				 
				$("#skillform").submit( function() {
					return false;	
				});
				
                //alert(skill_array.toString());
            }
	*/
	</script>
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
  
  </table>
	<nav>
	 <a href ="index.php">Home</a>
	 <a href ="">About us</a>
	 <a href ="">contact us</a>
	 <a href ="">Services</a>
	</nav>  
	<hr />
 
 
 
 
 
<?php
 
 display_employee_detail($employee);
 select_employee_skills_form($employee_ID);

 //$data = get_employee_skills_codes($employee_ID);
 $data =array('skill1'=>'100001','skill2'=>'100002');
 $query = http_build_query($data);
 //$query = json_encode($data);
 echo $query;
 echo "<br /> ";
 echo "this part is still under construction, the customer can select the service that they want to hire and use";

 display_button('show_cart.php?'.$query, 'add-to-cart', 'Add to Cart');
 
 display_button('index.php','continue-shopping','Home');
 do_html_footer();
?>