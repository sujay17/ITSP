<?php
session_start();
require_once "config.php";
require "html2pdf/html2fpdf.php";
$pdf=new HTML2FPDF();
$pdf->AddPage();

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

$user=$_SESSION['logged_in_doctor'];

$sql= "SELECT * FROM doctor WHERE username='$user'";
$row=$conn->query($sql);
foreach($row as $single){
echo "<td>".$single['doctor_first_name']."  ".$single['doctor_last_name']."</td>";

?>
</tr>


<tr> 
<td id="2"> Patient name : </td> 
<?php
echo "<td>".$_SESSION['patient_name']."</td>";

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
<td id="4"> Date : </td>
<?php
echo "<td>".date("d/m/Y")."</td>";
?>
</tr>

</table>
<br>
Medication: 
<br>
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


<?php
$new_content=ob_get_clean();
$html=$new_content;
$pdf->WriteHTML($html);
$pdf->output("sample.pdf");



$fp      = fopen("sample.pdf", 'r');
$content = fread($fp, filesize("sample.pdf"));
$content = addslashes($content);
fclose($fp);


$user=$_SESSION['logged_in_patient'];

$sql="SELECT * FROM patient where username='$user'";
$row=$conn->query($sql);
foreach($row as $single){
	if($single['pre_1']==null) {$prescription='pre_1';break;}
	if($single['pre_2']==null) {$prescription='pre_2';break;}
	if($single['pre_3']==null) {$prescription='pre_3';break;}
	if($single['pre_4']==null) {$prescription='pre_4';break;}
	if($single['pre_5']==null) {$prescription='pre_5';break;}

}


$sql="UPDATE patient SET $prescription='$content' WHERE username='$user'";


if($conn->query($sql)) header("Location:personal.php") ;
else echo "invalid prescription - Go back and type again ";


$conn=null;


?>

</body>
</html>