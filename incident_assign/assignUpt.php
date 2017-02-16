<?php
session_start();
?>

<?php
include '../view/header.php';
include "../config.php";
?>
<?php

if (isset($_GET['techID']) == $_SESSION['techID'] && 
	isset($_GET['custID']) == $_SESSION['customerID']) {

	echo $tid = $_SESSION['techID'];
	echo $cid =   $_SESSION['customerID'];

$sql="UPDATE `incidents` SET   `techID` = '$tid' WHERE  `customerID` = '$cid'";
if(mysqli_query($connectdb,$sql)){
	echo "The Incident was assigned to another Techncian";
	unset($_SESSION['techID']);
	unset($_SESSION['customerID']);
	session_destroy();
}
else {
	echo "You have encountered the following".mysqli_error($connectdb);
	unset($_SESSION['techID']);
	unset($_SESSION['customerID']);
	session_destroy();
}

}

?>
<a href="index.php">Select another Incident</a>
<?php include '../view/footer.php'; ?>

