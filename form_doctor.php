<?php

require_once "config.php" ;


$user = $_POST['username'];
$pass = $_POST['password']; 
$first_name = $_POST['doctor_first_name']; 
$last_name = $_POST['doctor_last_name'];
$lic_no=$_POST['lic_no'];


$sql="INSERT INTO doctor(username,password,doctor_first_name,doctor_last_name,lic_no) VALUES('$user','$pass','$first_name','$last_name','$lic_no')";
$st=$conn->prepare($sql);
if($st) header("Location:index_reg_successful_doctor.html") ;
	else echo "Invalid Credentials " ;

$conn=null;	
	
?>