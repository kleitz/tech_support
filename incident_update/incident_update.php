<?php 
session_start();
include '../view/header.php'; 
include "../config.php";
?>

<?php
echo "<h2>Update Incident.</h2>";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['incidentID'])) {
	$id = $_SESSION['incidentID'];
	$desc = $_POST['description'];
	$date = $_POST['dateClosed'];
	$date= date('Y-m-d',strtotime($date));   

$sql = " UPDATE `incidents` SET `dateClosed` = '$date', `description` = '$desc'WHERE `incidentID` = '$id' ";
if(mysqli_query($connectdb,$sql)){
	header("Location:incident_complete.php");
	exit();
}
else {
	echo mysqli_error($connectdb);
}

} 


?>
<?php
if (isset($_GET['incidentID'])){
	if (isset($_SESSION['loginUser'])) {
		$email = $_SESSION['loginUser'];
	}
	$_SESSION['incidentID'] = $_GET['incidentID'];
	$incident = $_SESSION['incidentID'];

	$sql = "SELECT `incidentID`,`productCode`,`dateOpened`,`dateClosed`,`title`,`description` FROM `incidents` WHERE `incidentID` ='$incident' ";


if( $result = mysqli_query($connectdb,$sql)){
$row = mysqli_fetch_object($result);

	
	echo "<form action='' method='POST'>";
	echo"<Label>Incident ID:</label><input type='text' readonly  value='".$row->incidentID."'><br><br>";
	echo"<Label>Product Code:</label><input type='text' readonly value='".$row->productCode."'><br><br>";
	echo"<Label>Date Opened:</label><input type='date'readonly value='".$row->dateOpened."'><br><br>";
	echo"<Label>Date Closed:</label><input type='date' name='dateClosed' value='".$row->dateClosed."'><br><br>";
	echo"<Label>Title:</label><input type='text' readonly value='".$row->title."'><br><br>";
	echo"<Label>Description:</label><textarea name='description'>".$row->description."</textarea><br><br>";
	echo"<input type='submit' name='update' value='Update Incident.'>";
	echo "</form>";
}}

?>



<?php 
echo "<p>You are Logged in as ".$email."</p>";
echo"<a href='logout.php'><button>Log Out</button></a>";
include '../view/footer.php'; ?>