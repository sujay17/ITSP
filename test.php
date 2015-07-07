<?php
session_start();
require "dompdf/dompdf_config.inc.php";
$pdf=new DOMPDF();


ob_start();
?>

<html>
<head>

<h1> <u> Prescription </u>  </h1>




</head>
<body>
<font size="5" type="times new roman">



<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td id="1"> Doctors Name :</td> 

<?php 
require_once "config.php";

$user=$_SESSION['logged_in_user'];

$sql= "SELECT * FROM doctor WHERE username='$user'";
$row=$conn->query($sql);
foreach($row as $single){
echo "<td>".$single['doctor_first_name']."  ".$single['doctor_last_name']."</td>";

?>
</tr>
<br>

<tr> 
<td id="2"> Patient name : </td> 
<?php
echo "<td>".$_SESSION['patient_name']."</td>";

?>
</tr>
<br>

<tr> 
<td id="3"> Doctor's license number : </td> 
<?php
echo "<td>".$single['lic_no']."</td>";
}
?>
</tr>
<br>

<tr>
<td id="4"> Date: </td>
<?php
echo "<td>".date("d/m/Y")."</td>";
?>
</tr>
<br>

<tr><td>Medication: </td></tr>
</table><br><br><br><br><br><br><br><br><br><br><br><br>
<table align="left" border="1" cellpadding="0" cellspacing="0">

<tr>
<th>Symptoms</th>
<th>Diagnosis</th>
<th>Treatment</th>
</tr>

<tr>
<td height="30px" width="200px"><?php echo $_POST['symptoms1']?></td>
<td height="30px" width="200px"><?php echo $_POST['diagnosis1']?></td>
<td height="30px" width="200px"><?php echo $_POST['treatment1']?></td>
</tr>

<tr>
<td height="30px" width="200px"><?php echo $_POST['symptoms2']?></td>
<td height="30px" width="200px"><?php echo $_POST['diagnosis2']?></td>
<td height="30px" width="200px"><?php echo $_POST['treatment2']?></td>
</tr>

<tr>
<td height="30px" width="200px"><?php echo $_POST['symptoms3']?></td>
<td height="30px" width="200px"><?php echo $_POST['diagnosis3']?></td>
<td height="30px" width="200px"><?php echo $_POST['treatment3']?></td>
</tr>

<tr>
<td height="30px" width="200px"><?php echo $_POST['symptoms4']?></td>
<td height="30px" width="200px"><?php echo $_POST['diagnosis4']?></td>
<td height="30px" width="200px"><?php echo $_POST['treatment4']?></td>
</tr>

<tr>
<td height="30px" width="200px"><?php echo $_POST['symptoms5']?></td>
<td height="30px" width="200px"><?php echo $_POST['diagnosis5']?></td>
<td height="30px" width="200px"><?php echo $_POST['treatment5']?></td>
</tr>
</table>


</font>


<?php $conn=null; ?>
</body>
</html>

<?php
$new_content=ob_get_clean();

$html=$new_content;

$pdf->load_html($html);
$pdf->render();
$pdf->stream("sample.pdf");
echo "PDF file is generated successfully!";
?>