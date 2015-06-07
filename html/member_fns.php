<?php

function get_member_orders($userid){

if(!$userid){

return false;}

$conn = db_connect();
$query = "select * from orders where UserID ='".$userid."'";
$result = @$conn->query($query);

$num_cats = @$result->num_rows;
if ($num_cats == 0){
return false;
}
$result = db_result_to_array($result);
return $result;

}

?>