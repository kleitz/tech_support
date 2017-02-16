<?php
session_start();
include ('../config.php');


	$user_check = $_SESSION['login_user'];


$ses_sql = mysqli_query($connectdb, "SELECT firstName,lastName FROM technicians WHERE email = '$user_check'");

$row = mysqli_fetch_array($ses_sql);

$login_session = $row['firstName'] . $row['lastName'];


if (isset($login_session)){
    header("Location: incident_display.php");
    exit();
    
}

else{
	echo "Session Error.";
}
?>