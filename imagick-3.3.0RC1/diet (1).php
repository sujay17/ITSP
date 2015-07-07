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

$_SESSION['BMR']=$BMR;	
	
?>
<html>
<h><center>Diet Calculator</center></h>
<h1><center>Please ensure all the details (height,weight,birthdate) are upto date for precise results </center></h1>
<h2><center>In case you wish to change the details you can do so in settings </center></h2>
<center><form action="diet_calculate.php" method="post">
<select name="exercise" value="-1"> Select Amount of Exercise 
<option value="1.2">No Exercise</option>
<option value="1.375">Light Exercise</option>
<option value="1.55">Moderate Exercise</option>
<option value="1.725">Heavy Exercise</option>
<option value="1.9">Very Heavy Exercise</option>
<td colspan="2" align="center">
<input type="submit" 
          name="submit" value="Calculate Calories">
</td>
<center>
</form>
</html>


	
<?php

$conn=null;
?>