<?php 
session_start();

require_once "config.php" ;

$user = $_POST['username'];
$pass = $_POST['password'];
 
$sql="SELECT username, password, name FROM patient WHERE username='$user' AND  password='$pass'";

$row=$conn->query($sql);

$b=false;

foreach($row as $single){
	if($single['username']==$user && $single['password']==$pass) { $b=true; $_SESSION['patient_name']=$single['name'];}
}

if($b) { $_SESSION['logged_in_patient']=$user; header("Location:personal.php"); } 
else  header("Location:index_invalid.html") ;
$conn=null;	
	
?>