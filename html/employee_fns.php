<?php

function get_employee_Number($productLine){
	if ((!$productLine) || ($productLine == '')) {
     return false;
   }
	$conn = db_connect();
	$query = "select DISTINCT employeeNumber from memberservices where productLine ='".$productLine."'";  
	$result = @$conn->query($query);
	
	
	if(!$result){
	return false;
	}
	$result = db_result_to_array($result);
	return $result;

}

function get_employee_detail($employee_ID){

		if ((!$employee_ID) || ($employee_ID == '')) {
		return false;
		}
		
		$conn = db_connect();
		$query = "select * from employees where employeeNumber ='".$employee_ID."'";
		$result = @$conn->query($query);
		
		if(!$result){
		return false;
		}
		
		$num_employees = @$result->num_rows;
		if ($num_employees == 0){
		return false;
		}
		$result = db_result_to_array($result);
		return $result[0];
}

function get_employee_skills($employee_ID){
		if ((!$employee_ID) || ($employee_ID == '')) {
		return false;
		}
		
		$conn = db_connect();
		$query = "select * from memberservices where employeeNumber ='".$employee_ID."'";
		$result = @$conn->query($query);
		
		if(!$result){
		return false;
		}
		
		$num_skills = @$result->num_rows;
		if ($num_skills == 0){
		return false;
		}
		$result = db_result_to_array($result);
		return $result;
}

function get_employee_skills_codes($employee_ID){
if ((!$employee_ID) || ($employee_ID == '')) {
		return false;
		}
		
		$conn = db_connect();
		$query = "select productCode from memberservices where employeeNumber ='".$employee_ID."'";
		$result = @$conn->query($query);
		
		if(!$result){
		return false;
		}
		
		$num_skills = @$result->num_rows;
		if ($num_skills == 0){
		return false;
		}
		$result = db_result_to_array($result);
		return $result;

}
?>