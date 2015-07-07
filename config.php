<?php
define("db_dsn","mysql:dbname=new_schema");
define("db_username","root");
define("db_password","root");

try{
	$conn=new PDO(db_dsn,db_username,db_password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOexception $e){
	echo "connection failed:".$e->getMessage();
}	
?>