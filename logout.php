<?php
session_start();
$_SESSION['logged_in_doctor']=null;
$_SESSION['logged_in_patient']=null;
$_SESSION['BMR']=null;

header("Location:index.html");