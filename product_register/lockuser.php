<?php
include ('../config.php');
session_start();

$user_check = $_SESSION['loginUser'];

$ses_sql = mysqli_query($connectdb, "SELECT firstName FROM customers WHERE email = '$user_check'");
$row = mysqli_fetch_array($ses_sql);

$login_session = $row['firstName'];

$ses_sql1 = mysqli_query($connectdb, "SELECT lastName FROM customers WHERE email = '$user_check'");
$row1 = mysqli_fetch_array($ses_sql1);

$login_session1 = $row1['lastName'];
if (!isset($login_session)){
    if(!isset($login_session1)){
    header("Location: index.php");
    exit();
    }
}
?>