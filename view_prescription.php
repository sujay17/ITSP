<?php
session_start();
$user=$_SESSION['logged_in_patient'];
require_once "config.php";
$sql="SELECT * FROM patient where username='$user'";
$result=$conn->query($sql);
foreach($result as $single ){
	header("Content-type: application/pdf");
    header('Content-disposition: attachment; filename="prescription.pdf"');
	echo $single['pre_1'];
	echo $single['pre_2'];
	echo $single['pre_3'];
	echo $single['pre_4'];
	echo $single['pre_5'];
}
$conn=null;
?>