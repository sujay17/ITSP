<?php
session_start();
require_once "config.php" ;

$user=$_SESSION['logged_in_patient'];
$pass = $_POST['password']; 
$name = $_POST['name']; 
$height = $_POST['height'];
$weight = $_POST['weight'];
$contact =$_POST['contact'];
$emer_contact=$_POST['emer_contact'];
$history =$_POST['history'];
$allergy =$_POST['allergy'];
$polio_taken=$_POST['polio_taken'];
$polio_date=$_POST['polio_date'];
$polio_booster=$_POST['polio_booster'];
$measles_taken=$_POST['measles_taken'];
$measles_date=$_POST['measles_date'];
$measles_booster=$_POST['measles_booster'];
$smallpox_taken=$_POST['smallpox_taken'];
$smallpox_date=$_POST['smallpox_date'];
$smallpox_booster=$_POST['smallpox_booster'];
$rabies_taken=$_POST['rabies_taken'];
$rabies_date=$_POST['rabies_date'];
$rabies_booster=$_POST['rabies_booster'];
$bcg_taken=$_POST['bcg_taken'];
$bcg_date=$_POST['bcg_date'];
$bcg_booster=$_POST['bcg_booster'];
$tetanus_taken=$_POST['tetanus_taken'];
$tetanus_date=$_POST['tetanus_date'];
$tetanus_booster=$_POST['tetanus_booster'];


$sql="UPDATE patient 
SET password='$pass',
 name='$name',
 height='$height' ,
 weight='$weight' ,
 contact='$contact' ,
 emer_contact='$emer_contact',
 history='$history' , allergy='$allergy' ,
 polio_taken='$polio_taken',
 polio_date='$polio_date',
 polio_booster='$polio_booster',
 measles_taken='$measles_taken',
 measles_date='$measles_date',
 measles_booster='$measles_booster',
 smallpox_taken='$smallpox_taken',
 smallpox_date='$smallpox_date',
 smallpox_booster='$smallpox_booster',
 rabies_taken='$rabies_taken',
 rabies_date='$rabies_date',
 rabies_booster='$rabies_booster',
 bcg_taken='$bcg_taken',
 bcg_date='$bcg_date',
 bcg_booster='$bcg_booster',
 tetanus_taken='$tetanus_taken',
 tetanus_date='$tetanus_date',
 tetanus_booster='$tetanus_booster' 
 WHERE username='$user'
" ;
if($conn->query($sql)) header("Location:personal.php") ;
else echo "Invalid Credentials " ;

	

$conn=null;	
	
?>