<?php
session_start();
require_once "config.php";

$user=$_SESSION['logged_in_user'];
$sql="SELECT height, weight, birthday,gender FROM patient WHERE username='$user' ";
$rows=$conn->query($sql);

foreach($rows as $single){
	$height=$single['height'];
	$weight=$single['weight'];
	$birthday=$single['birthday'];
	$gender=$single['gender'];
	$len=strlen($birthday);
	$year = $birthday[$len-1] + 10*$birthday[$len-2] +100*$birthday[$len-3] + 1000*$birthday[$len-4];
	
}
$age=date('Y')-$year;

if($gender='Male'){
	$BMR=88.362 + 13.397*$weight + 4.799*$height - 5.677*$age;
	
}
else {
	$BMR=447.593 + 9.247*$weight + 3.098*$height - 4.330*$age;
}

//$BMI=$weight/($height*$height)*10000;

$_SESSION['BMR']=$BMR;	

$_SESSION['BMI']=$BMI;
	
?>
<html>
<style type="text/css">
	.zoom
	{
		zoom:200% ;
	}

	#center
	{
		position: absolute;
		top: 250px;
		left: 40%;
	}
	body
	{
		background-image: url("fruit.jpg")
	}
	.color
	{
		color: white;
	}
</style>
<body>
<h1 class="color"><center>Diet Calculator</center></h1>
<h2 class="color"><center>Please ensure all the details (height,weight,birthdate) are upto date for precise results </center></h2>
<h3 class="color"><center>In case you wish to change the details you can do so in settings </center></h3>
<center>
<form action="Signupform_update.php" method="post" class="zoom">
<tr>
<td colspan="4" align="center">
<input type="submit" name="settings" value="settings"> </td>
</center>
<div id="center">
<table align="center">
</tr>
</form>

<center>
<form action="diet_calculate.php" method="post" class="zoom">
<select name="exercise" value="-1" class="zoom"> Select Amount of Exercise 
<option value="1.2">No Exercise</option>
<option value="1.375">Light Exercise</option>
<option value="1.55">Moderate Exercise</option>
<option value="1.725">Heavy Exercise</option>
<option value="1.9">Very Heavy Exercise</option>
</center>
</tr>

<tr class="zoom">

<td colspan="2" align="center">
<input type="submit" 
          name="submit" value="Calculate Calories">
</td>
</tr>
</form>
</table>
</div>
</body>
</html>



	
<?php

$conn=null;
?>