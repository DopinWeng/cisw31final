<?php

function display_admin_menu(){
	echo '<div id="admin_menu">';
	do_html_URL("edit_product_category.php","Edit service categories");
	do_html_URL("edit_product.php","Edit services");
	do_html_URL("edit_employee.php","edit empoloyee");
	
	echo '</div>';
}

function display_product_category(){

	$product_category = get_product_categories();
	if ((is_array($product_category)) && (count($product_category) > 0)) {
	echo '
		<div>
		<table border=\"0\" width=\"100%\" cellspacing=\"0\">
		<tr>
		<th>Category Name</th>
		<th>Cateogry Description</th>
		<th colspan="2" align="center">Edit</th>
		</tr>
	';
	foreach($product_category as $key=>$row){
		echo '
		<tr>
		<td>'.$row['productLine'].'</td>
		<td>'.$row['textDescription'].'</td>
		<td><a href="edit_category_form.php?catid='.urlencode($row['productLine']).'">edit</a></td>
		<td><a href="delete_category.php?catid='.$row['productLine'].'">delete</a></td>
		<tr>
		';

	}
	echo '
		  <tr>
		  <td colspan="4" align="center"><a href="insert_category_form.php"><input type="button" name="addnewcat" value="add new category"/></a></td>
		  </tr>
		  </table>
		  </div>';
	
	}else{
	echo "There is no product category";
	//Add button

	}
}

function display_insert_category_form(){
echo
'<div>
<form action="insert_category.php" method="post" >
<table border="0">
<tr>
<td><Label>Category name</Label></td><td><input type="text" name="categoryname" value=""/></td>
</tr>
<tr>
<td>Description</td><td><input type="text" name="Description" value=""/></td>
</tr>
<tr>
<td>htmlDescirption</td><td><input type="text" name="htmlDescirption" value=""/></td>
</tr>
<tr>
<td>htmlDescirption</td><td><input type="text" name="image" value=""/></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="save"/><input type="reset" value="reset"/><td>
</tr>
</table>
</form>
</div>
';

}

function display_category_form($category_id=''){
$product_category = get_product_categories_details($category_id);
echo '
<div>
<form action="edit_category.php?catid=?'.$category_id.'" method="post" >
<table border="0">
<tr>
<td><Label>Category name</Label></td><td><input type="text" name="categoryname" value="'.$product_category['productLine'].'"/></td>
</tr>
<tr>
<td>Description</td><td><input type="text" name="Description" value="'.$product_category['textDescription'].'"/></td>
</tr>
<tr>
<td>htmlDescirption</td><td><input type="text" name="htmlDescirption" value="'.$product_category['htmlDescription'].'"/></td>
</tr>
<tr>
<td>htmlDescirption</td><td><input type="text" name="image" value="'.$product_category['image'].'"/></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="update"/><input type="reset" value="reset"/><td>
</tr>
</table>
</form>
</div>
';

display_button("edit_product_category.php", "back", "Go back");

}

function update_category($categoryname, $Description, $htmlDescription='', $image=''){
   
	
   $conn = db_connect();
	
   $query = "update productlines
             set productLine='".$categoryname."',textDescription='".$Description."',htmlDescription='".$htmlDescription."',
			 image='".$image."'
             where productLine='".$categoryname."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }

}

function delete_category($category_id){
	
	$conn = db_connect();
	$query = "select * from products where productLine='".$category_id."'";
	$result = @$conn->query($query);
    if ((!$result) || (@$result->num_rows > 0)) {
     return false;
    }
	
	$query = "delete from productlines where productLine='".$category_id."'";
	$result = @$conn->query($query);
	
	if (!$result) {
     return false;
   } else {
     return true;
   }

}

function insert_category($categoryname, $Description, $htmlDescription='', $image=''){
	
   $conn = db_connect();	
   $query = "insert productlines VALUES('".$categoryname."','".$Description."','".$htmlDescription."','".$image."')";
             
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }

}

?>