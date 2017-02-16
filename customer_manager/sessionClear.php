<?php
 session_start();

if (isset($_SESSION['customerID']) && !empty($_SESSION['customerID'])) {
unset($_SESSION['customerID']);
unset($_SESSION['errorsarray']);
session_destroy();
 header("Location:select.php");
 exit();
} else {
	header("Location:select.php");
 exit();
}


 ?>
 