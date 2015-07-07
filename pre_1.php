<?php
session_start();
$user=$_SESSION['logged_in_patient'];
require_once "config.php";
$sql="SELECT * FROM patient where username='$user'";
$result=$conn->query($sql);
foreach($result as $single ){
	if($single['pre_1']==null) echo"prescription does not exist";
	else{
	header("Content-type: application/pdf");
	
	echo $single['pre_1'];
}
}
$conn=null;
?>