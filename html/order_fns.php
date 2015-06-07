<?php
/**
 * @project Name 			CISW31 Final Project
 * @project file            order_fns.php 
 * @project number 			1.0.0
 * @Date 					05252015
 * @project Description 	index pages to show product category
 * @Author					
 */

 function process_card($card_detail){
	//connect to shopping payment gateway or 
	//use gpg to encrypt and email or 
	//store in DB if we want to 
 return true;
 }
 
 function insert_order($order_detail){
	extract($order_detail);	
	// set shipping address same as address
	if((!$ship_name) && (!$ship_address) && (!$ship_city) && (!$ship_state) && (!$ship_zip) && (!$ship_country)) {
		$ship_name = $name;
		$ship_address = $address1;
		$ship_city = $city;
		$ship_state = $state;
		$ship_zip = $zip;
		$ship_country = $country;
	}

	$conn = db_connect();;
	$conn->autocommit(false);
	
	// insert customer address
	  $query = "select customerNumber from customers where
				customerName = '".$name."' and addressLine1 = '".$address1."'
				and city = '".$city."' and state = '".$state."'
				and postalCode = '".$zip."' and country = '".$country."'";

	  $result = $conn->query($query);
	  // check is guest or registered customer ****
	  if($result->num_rows>1) {
		$customer = $result->fetch_object();
		$customerid = $customer->customerNumber;
	  } else {
		$query = "insert into customers values
				('', '".$name."','".$firstname."','".$lastname."','".$phone."','".$address1."','".$address2."','".$city."','".$state."','".$zip."','".$country."','1002','','123')";
		$result = $conn->query($query);

		if (!$result) {
	       echo "customer query is not working";
		   return false;
		}
	  }
	  
	  $customerid = $conn->insert_id;
	  $date = date("Y-m-d");
	  // insert order into database
	  $query = "insert into orders values ('','".$date."','".$required_date."','".$date."','PARTIAL','','".$_SESSION['total_price']."','".$customerid."','1002','123')"; 
	  $result = $conn->query($query);
	  if (!$result) {
		return false;
	  }
	  
	  // check the order has been saved in database
	  $query = "select orderNumber from orders where
				   customerNumber = '".$customerid."' and
				   amount > (".$_SESSION['total_price']."-.001) and
				   amount < (".$_SESSION['total_price']."+.001) and
				   orderDate = '".$date."' and
				   status = 'PARTIAL'";

	  $result = $conn->query($query);

	  if($result->num_rows>0) {
		$order = $result->fetch_object();
		$orderid = $order->orderNumber;
	  } else {
		return false;
	  }
/*	  

	  echo "orderid :".$order_id;
	  // insert each services into orderdetails, about this part, it can use update function to modify orderdetail;
	  foreach($_SESSION['cart'] as $productCode => $quantity) {
		$detail = get_product_details($productCode);
		//delete previous records of the order in orderdetail 
		$query = "delete from orderdetails where
				  orderNumber = '".$orderid."' and productCode = '".$productCode."'";
		$result = $conn->query($query);
		// add new records into orderdetails table
		$query = "INSERT INTO orderdetails values('','".$orderid."', '".$productCode."','".$quantity."', '".$detail['buyPrice']."','1002')";
		$result = $conn->query($query);
		if(!$result) {
		  return false;
		}
	  }
	  	  
	*/  
	  // end transaction
	  $conn->commit();
	  $conn->autocommit(TRUE);

	  return $orderid;
	}

	
function calculate_shipping_cost() {
  // as we are shipping products all over the world
  // via teleportation, shipping is fixed
  return 20.00;
}


?>
