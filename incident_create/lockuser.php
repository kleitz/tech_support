<?php
session_start();
include ('../config.php');
if (isset($_SESSION['login_user'])) {
	$user_check = $_SESSION['login_user'];


$ses_sql = mysqli_query($connectdb, "SELECT firstName FROM customers WHERE email = '$user_check'");

$row = mysqli_fetch_array($ses_sql);

$login_session = $row['firstName'];

$ses_sql1 = mysqli_query($connectdb, "SELECT lastName FROM customers WHERE email = '$user_check'");

$row1 = mysqli_fetch_array($ses_sql1);

$login_session1 = $row1['lastName'];

if (isset($login_session)){
    if(isset($login_session1)){
    header("Location: incident_creation.php");
    exit();
    }
}}
else{
	echo "Session Error.";
}
?>