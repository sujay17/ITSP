<?php session_start(); ?>
<html>
<head>
<body>
<title>First log in </title>
<style type="text/css">
h1,h2{font-family: Calibri; font-size: 22pt; font-style: normal; font-weight: bold; color:SlateBlue;
text-align: center; text-decoration: underline }
table{font-family: Calibri; color:white; font-size: 11pt; font-style: normal;
text-align:; background-color: SlateBlue; border-collapse: collapse; border: 2px solid navy}
table.inner{border: 0px}
body{
	background-color: black;
	background-image:url("signup.jpg");
}
</style>
</head>
 
<body color="black">
<?php

require_once "config.php";

$user=$_SESSION['logged_in_patient'];

$sql= "SELECT * FROM patient WHERE username='$user'";
$row=$conn->query($sql);
foreach($row as $single){

?>
<h1>**Fast_Medix**</h1>
<h2> Made by :Sujay and Aniruddh </h2>

<form action="update.php" method="POST">
 
<table align="center" cellpadding = "10">
 

<tr>
<td>USERNAME</td>
<td><?php echo $single['username'] ?>

</td>
</tr>
 

<tr>
<td>PASSWORD</td>
<td><input type="PASSWORD" name="password" maxlength="30" value=<?php echo $single['password'] ?> />
(max 30 characters a-z and A-Z)
</td>
</tr>

<tr>
<td>PATIENT FULL NAME</td>
<td><input type="text" name="name" value="<?php echo $single['name'] ?>" />
</td>
</tr>

<tr>
<td>GENDER</td>
<td>
<?php echo $single['gender'] ?>
</td>
</tr>


 
<tr>
<td>DATE OF BIRTH</td>
 
<td>
<?php echo $single['birthday'] ?>
</td>
</tr>


<tr>
<td>HEIGHT(in cms)</td>
<td><input type="text" name="height" maxlength="30" value=<?php echo $single['height'] ?> />

</td>
</tr>

<tr>
<td>WEIGHT(in Kgs)</td>
<td><input type="text" name="weight" maxlength="30" value=<?php echo $single['weight'] ?> />

</td>
</tr>
 
<tr>
<td>CONTACT NUMBER:</td>
<td><input type="text" name="contact" maxlength="10" value=<?php echo $single['contact'] ?> />(10 digit number)</td>
</tr>
 

<tr>
<td>EMERGENCY CONTACT NUMBER</td>
<td>
<input type="emer_contact"  name="emer_contact" maxlength="10" value=<?php echo $single['emer_contact'] ?> />
(10 digit number)
</td>
</tr>
 

 

<tr>
<td>PREVIOUS OPERATIVE HISTORY  <br /><br /><br /></td>
<td><textarea name="history" rows="4" cols="30"  ><?php echo $single['history'] ?> </textarea></td>
</tr>
 

<tr>
<td>ALLERGY(if any)</td>
<td><input type="text" name="allergy" value="<?php echo $single['allergy'] ?>" />
</td>
</tr>


<tr>
<td>VACCINES TAKEN  <br /><br /><br /><br /><br /><br /><br /></td>
 
<td>
<table>
 
<tr>
<td align="center"><b>No.</b></td>
<td align="center"><b>Vaccination</b></td>
<td align="center"><b>Y OR N </b></td>
<td align="center"><b>Date Taken  </b></td>
<td align="center"><b>Booster Dose </b></td>
</tr>
 
<tr>
<td>1</td>
<td>Polio</td>
<td>
<select name="polio_taken" value=<?php echo $single['polio_taken'] ?> >
<option value="Yes">Yes</option>
<option value="No">No</option>
</td>
</select>

<td><input type="text" name="polio_date" maxlength="15" value=<?php echo $single['polio_date'] ?> /></td>
<td>
<select name="polio_booster" value=<?php echo $single['polio_booster'] ?> >
<option value="Yes">Yes</option>
<option value="No">No</option>
</td>
</tr>

<tr>
<td>2</td>
<td>Measles </td>
<td>
<select name="measles_taken" value=<?php echo $single['measles_taken'] ?> >
<option value="Yes">Yes</option>
<option value="No">No</option>
</td>
</select>
<td><input type="text" name="measles_date" maxlength="15"  value=<?php echo $single['measles_date'] ?> /></td>
<td>
<select name="measles_booster" value= <?php echo $single['measles_booster'] ?> >
<option value="Yes">Yes</option>
<option value="No">No</option>
</td>
</select>
</tr>
 

 <tr>
<td>3</td>
<td>SmallPox</td>
<td>
<select name="smallpox_taken" value=<?php echo $single['smallpox_taken'] ?> >
<option value="Yes">Yes</option>
<option value="No">No</option>
</td>
</select>
<td><input type="text" name="smallpox_date" maxlength="15" value=<?php echo $single['smallpox_date'] ?> /></td>
<td>
<select name="smallpox_booster" value=<?php echo $single['smallpox_booster'] ?> >
<option value="Yes">Yes</option>
<option value="No">No</option>
</td>
</tr>
 

 <tr>
<td>4</td>
<td>Rabies</td>
<td>
<select name="rabies_taken" value=<?php echo $single['rabies_taken'] ?>>
<option value="Yes">Yes</option>
<option value="No">No</option>
</td>
</select>
<td><input type="text" name="rabies_date" maxlength="15" value=<?php echo $single['rabies_date'] ?> /></td>
<td>
<select name="rabies_booster" value=<?php echo $single['rabies_booster'] ?>>
<option value="Yes">Yes</option>
<option value="No">No</option>
</td>
</tr>

<tr>
<td>5</td>
<td>BCG</td>
<td>
<select name="bcg_taken" value=<?php echo $single['bcg_taken'] ?>>
<option value="Yes">Yes</option>
<option value="No">No</option>
</td>
</select>
<td><input type="text" name="bcg_date" maxlength="15" value=<?php echo $single['bcg_date'] ?> /></td>
<td>
<select name="bcg_booster" value=<?php echo $single['bcg_booster'] ?> >
<option value="Yes">Yes</option>
<option value="No">No</option>
</td>
</tr>

<tr>
<td>6</td>
<td>Tetanus</td>
<td>
<select name="tetanus_taken" value=<?php echo $single['tetanus_taken'] ?> >
<option value="Yes">Yes</option>
<option value="No">No</option>
</td>
</select>
<td><input type="text" name="tetanus_date" maxlength="15" value=<?php echo $single['tetanus_date'] ?> /></td>
<td>
<select name="tetanus_booster" value=<?php echo $single['tetanus_booster'] ?> >
<option value="Yes">Yes</option>
<option value="No">No</option>
</td>
</tr>
<?php } ?>
<tr>
<td></td>
<td></td>
<td align="center"></td>
<td align="center"></td>
</tr>
<table>






<tr>

<td colspan="2" align="center">
<input type="submit" 
          name="submit" value="Send">
<input type="reset" value="Reset">
</td>
</tr>
</table>
 
</form>
 
</body>
</html>