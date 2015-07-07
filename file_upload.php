<?php
session_start();
require_once "config.php";

$user=$_SESSION['logged_in_patient'];
$target_path = "uploads/";

$target_path = $target_path . basename( $_FILES['file_upload']['name']); 

if(move_uploaded_file($_FILES['file_upload']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['file_upload']['name']). 
    " has been uploaded"."</br>";
} 
else{
    echo "There was an error uploading the file, please try again!";
}

$name="uploads/".$_FILES['file_upload']['name'];
$fp      = fopen($name, 'r');
$content = fread($fp, filesize($name));
$content = addslashes($content);
fclose($fp);

$sql="UPDATE patient SET photo='$content' WHERE username='$user'";
$conn->query($sql);
echo "file entered in database successfully. Please go back to personal page"."</br>";
$conn=null;

?>