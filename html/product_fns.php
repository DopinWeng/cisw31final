<?php


function get_product_categories(){
//query database for list of categories
$conn = db_connect();
$query = "select * from productlines";
$result = @$conn->query($query);
if(!$result){
return false;
}
$num_cats = @$result->num_rows;
if ($num_cats == 0){
return false;
}
$result = db_result_to_array($result);
return $result;

}

function get_product_categories_details($category_id){
$conn = db_connect();
$query = "select * from productlines where productLine='".$category_id."'";
$result = @$conn->query($query);
if(!$result){
return false;
}
  $result = @$result->fetch_assoc();
  return $result;
}


function get_product_details($product_ID){

if ((!$product_ID) || ($product_ID=='')) {
     return false;
  }
  $conn = db_connect();
  $query = "select * from products where productCode='".$product_ID."'";
  $result = @$conn->query($query);
  if (!$result) {
     return false;
  }
  $result = @$result->fetch_assoc();
  return $result;

}
function calculate_price($cart) {
  // sum total price for all items in shopping cart
  $price = 0.0;
  if(is_array($cart)) {
    $conn = db_connect();
    foreach($cart as $productCode => $qty) {
      $query = "select * from products where productCode='".$productCode."'";
      $result = $conn->query($query);
      if ($result) {	    
        $item = $result->fetch_object();
        $item_price = $item->buyPrice;
        $price +=$item_price*$qty;
		
      }
    }
  }
  return $price;
}  

function calculate_items($cart) {
  // sum total items in shopping cart
  $items = 0;
  if(is_array($cart))   {
    foreach($cart as $productCode => $qty) {
      $items += $qty;
    }
  }
  return $items;
}
?>