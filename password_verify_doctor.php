<?php 
session_start();

require_once "config.php" ;

$user = $_POST['username'];
$pass = $_POST['password'];
 
$sql="SELECT username, password FROM doctor WHERE username='$user' AND  password='$pass'";

$row=$conn->query($sql);

$b=false;

foreach($row as $single){
	if($single['username']==$user && $single['password']==$pass) $b=true; 
}

if($b) { $_SESSION['logged_in_doctor']=$user; header("Location:prescription.php") ;}
else  header("Location:index_invalid_doctor.html") ;
$conn=null;	
	
?>