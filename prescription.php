<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>


<h1> <u> Prescription </u>  </h1>

<style>

#pos{
	position:absolute;
	top:280px;
	left:20%;
	
}

.zoom
{
	zoom:150%;
}



</style>

</head>
<body>
<font size="5" type="times new roman">



<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td id="1"> Doctors Name :</td> 

<?php 
require_once "config.php";

$user=$_SESSION['logged_in_doctor'];


$sql= "SELECT * FROM doctor WHERE username='$user'";
$row=$conn->query($sql);
foreach($row as $single){
echo "<td>".$single['doctor_first_name']."  ".$single['doctor_last_name']."</td>";
?>

</tr>


<tr> 
<td id="3"> Doctor's license number : </td> 
<?php
echo "<td>".$single['lic_no']."</td>";
}
?>
</tr>


<tr> 
<td id="2"> Patient name : </td> 
<?php
echo "<td>".$_SESSION['patient_name']."</td>";

?>
</tr>





<tr>
<td id="4"> Date: </td>
<?php
echo "<td>".date("d/m/Y")."</td>";
?>
</tr>


<tr><td>Medication: </td></tr>
</table>
<form action="pdf.php" method="post">

<table align="left" border="1" cellpadding="0" cellspacing="0">

<tr>
<th>Symptoms</th>
<th>Diagnosis</th>
<th>Treatment</th>
</tr>

<tr>
<td height="30px" width="200px"><select name="symptoms1" value="fever" >
<option> fever</option>
<option> head ache </option>
</select>
</td>
<td height="30px" width="200px"><input type="text" name="diagnosis1" ></td>
<td height="30px" width="200px"><input type="text" name="treatment1"></td>
</tr>

<tr>
<td height="30px" width="200px"><select name="symptoms2" value="fever">
<option> fever</option>
<option> head ache </option>
</select>
</td>
<td height="30px" width="200px"><input type="text" name="diagnosis2"></td>
<td height="30px" width="200px"><input type="text" name="treatment2"></td>
</tr>

<tr>
<td height="30px" width="200px"><select name="symptoms3" value="fever">
<option> fever</option>
<option> head ache </option>
</select>
</td>
<td height="30px" width="200px"><input type="text" name="diagnosis3"></td>
<td height="30px" width="200px"><input type="text" name="treatment3"></td>
</tr>

<tr>
<td height="30px" width="200px"><select name="symptoms4" value="fever">
<option> fever</option>
<option> head ache </option>
</select>
</td>
<td height="30px" width="200px"><input type="text" name="diagnosis4"></td>
<td height="30px" width="200px"><input type="text" name="treatment4"></td>
</tr>

<tr>
<td height="30px" width="200px"><select name="symptoms5" value="fever">
<option> fever</option>
<option> head ache </option>
</select>
</td>
<td height="30px" width="200px"><input type="text" name="diagnosis5"></td>
<td height="30px" width="200px"><input type="text" name="treatment5"></td>
</tr>
</table>

<input id="pos" class="zoom" type="submit" />
<input id="pos" class="zoom" type="submit" />


</form>

</font>


<?php $conn=null; ?>
</body>
</html>
