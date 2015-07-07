<?php

require_once "config.php" ;


$user = $_POST['username'];
$pass = $_POST['password']; 
$name = $_POST['name']; 
$gender = $_POST['gender'];
$day = $_POST['birthday_day']; 
$month =$_POST['birthday_month'];
$years =$_POST['birthday_year'];
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





$sql="INSERT INTO patient(username,password,name,gender,birthday,height,weight,contact,emer_contact,history,allergy,polio_taken,polio_date,polio_booster,measles_taken,measles_date,measles_booster,smallpox_taken,smallpox_date,smallpox_booster,rabies_taken,rabies_date,rabies_booster,bcg_taken,bcg_date,bcg_booster,tetanus_taken,tetanus_date,tetanus_booster) 
VALUES(:user,:pass,:name,:gender,'$day-$month-$years',:height,:weight,:contact,:emer_contact,:history,:allergy,:polio_taken,:polio_date,:polio_booster,:measles_taken,:measles_date,:measles_booster,:smallpox_taken,:smallpox_date,:smallpox_booster,:rabies_taken,:rabies_date,:rabies_booster,:bcg_taken,:bcg_date,:bcg_booster,:tetanus_taken,:tetanus_date,:tetanus_booster)";


try{
	$st=$conn->prepare($sql);
	$st->bindValue(":user", $user, PDO::PARAM_STR);
    $st->bindValue(":pass",      $pass, PDO::PARAM_STR);
    $st->bindValue(":name",     $name, PDO::PARAM_STR);
    $st->bindValue(":gender",     $gender, PDO::PARAM_STR);
    $st->bindValue(":height",     $height, PDO::PARAM_STR);
    $st->bindValue(":weight",     $weight, PDO::PARAM_STR);
    $st->bindValue(":contact",     $contact, PDO::PARAM_STR);
    $st->bindValue(":emer_contact",     $emer_contact, PDO::PARAM_STR);
    $st->bindValue(":history",     $history, PDO::PARAM_STR);
    $st->bindValue(":allergy",     $allergy, PDO::PARAM_STR);
    $st->bindValue(":polio_taken",     $polio_taken, PDO::PARAM_STR);
    $st->bindValue(":polio_date",     $polio_date, PDO::PARAM_STR);
    $st->bindValue(":polio_booster",     $polio_booster, PDO::PARAM_STR);
    $st->bindValue(":measles_taken",     $measles_taken, PDO::PARAM_STR);
    $st->bindValue(":measles_date",     $measles_date, PDO::PARAM_STR);
    $st->bindValue(":measles_booster",     $measles_booster, PDO::PARAM_STR);
    $st->bindValue(":smallpox_taken",     $measles_taken, PDO::PARAM_STR);
    $st->bindValue(":smallpox_date",     $measles_date, PDO::PARAM_STR);
    $st->bindValue(":smallpox_booster",     $measles_booster, PDO::PARAM_STR);
    $st->bindValue(":rabies_taken",     $measles_taken, PDO::PARAM_STR);
    $st->bindValue(":rabies_date",     $measles_date, PDO::PARAM_STR);
    $st->bindValue(":rabies_booster",     $measles_booster, PDO::PARAM_STR);
    $st->bindValue(":bcg_taken",     $measles_taken, PDO::PARAM_STR);
    $st->bindValue(":bcg_date",     $measles_date, PDO::PARAM_STR);
    $st->bindValue(":bcg_booster",     $measles_booster, PDO::PARAM_STR);
    $st->bindValue(":tetanus_taken",     $measles_taken, PDO::PARAM_STR);
    $st->bindValue(":tetanus_date",     $measles_date, PDO::PARAM_STR);
    $st->bindValue(":tetanus_booster", $measles_booster, PDO::PARAM_STR);
	$st->execute();
	
	
}
catch(PDOException $e){
	$conn=null;
	die("REGISTRATION UNSUCCESSFUL:".$e->getMessage());
}



if($st)header("Location:index_reg_successful.html") ;
else echo "Invalid Credentials " ;


$conn=null;	
	
?>