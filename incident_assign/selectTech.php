<?php 
session_start();
include '../view/header.php'; 
include "../config.php";
?>

<?php
if (isset($_GET['customerID'])){
	$_SESSION['customerID'] = $_GET['customerID'];

$sql = "SELECT techID,firstName,lastName,(SELECT COUNT(techID) FROM incidents WHERE technicians.techID = incidents.techID) AS openIncidents FROM technicians ORDER BY openIncidents";

if( $result = mysqli_query($connectdb,$sql)){

	echo "<h3>Select Technician</h3>";
	echo "<table>";
	echo"<tr><th>Name</th><th>Open Incidents</th></tr>";
	
	while($row = mysqli_fetch_object($result)){

		$_SESSION['techID']= $row->techID;

		echo"<tr>";
		echo"<td>".$row->firstName."\t".$row->lastName."</td>";
		echo "<td>".$row->openIncidents."</td>";
		echo "<td><a href='assignInci.php?technicianID=". $row->techID."&customerID=".$_SESSION['customerID']."''><button>Select</button></a></td>";
		echo"<tr>";
	}

		echo "</table>";
}}
/*else{
	  session_destroy();
    echo "Sessions of Customers and Incidents are not Set.";
}
*/
?>
<?php include '../view/footer.php'; ?>