<?php
include 'db_connect.php';
$qry = $conn->query("SELECT * FROM employee_list where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}

$designation= $conn->query("SELECT * FROM designation_list where id = $designation_id ");
$designation = $designation->num_rows > 0 ? $designation->fetch_array()['designation'] : 'Unknown Designation';
$department= $conn->query("SELECT * FROM department_list where id = $department_id ");
$department = $department->num_rows > 0 ? $department->fetch_array()['department'] : 'Unknown Department';
$evaluator= $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM evaluator_list where id = $evaluator_id ");
$evaluator = $evaluator->num_rows > 0 ? $evaluator->fetch_array()['name'] : 'Unknown Evaluator';

include 'new_employee.php';
?>