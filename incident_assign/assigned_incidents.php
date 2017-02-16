<?php 
session_start();
?>
<?php
include '../view/header.php'; 
include "../config.php";
?>
<h1>Assigned Incidents</h1>
<a href="index.php">View Unassigned Incidents</a>
<?php
$sql = "SELECT *, IF(incidents.dateClosed IS NULL, 'OPEN', incidents.dateClosed)dateClosed,customers.firstName AS cfname,customers.lastName AS clname, technicians.firstName AS tfname, technicians.lastName AS tlname FROM incidents\n"
    . "INNER JOIN customers ON incidents.`customerID` = customers.`customerID`\n"
    . "INNER JOIN technicians ON incidents.`techID` = technicians.`techID`";

/*$sql = "SELECT * ,customers.firstName AS cfname,customers.lastName AS clname, technicians.firstName AS tfname, technicians.lastName AS tlname FROM incidents\n"
    . "INNER JOIN customers ON incidents.`customerID` = customers.`customerID`\n"
    . "INNER JOIN technicians ON incidents.`techID` = technicians.`techID`";
    */

if( $result = mysqli_query($connectdb,$sql)){

	echo "<table>";
	echo"<tr><th>Customer</th><th>Product</th><th>Technicians</th><th>Incidennt</th></tr>";
	
	while($row = mysqli_fetch_array($result)){
	
		$_SESSION['incidentID'] = $row['incidentID'];
		$_SESSION['customerID'] = $row['customerID'];
		
		echo"<tr>";
		echo"<td>".$row['cfname']."\t".$row['clname']."</td>";

		echo "<td>".$row['productCode'] ."</td>";

		echo"<td>".$row['tfname']."\t".$row['tlname']."</td>";

		echo"<td>";
		echo "<label>ID:</label>".$row['incidentID']."<br>";
		echo "<label>Opened:</label>".$row['dateOpened']."<br>";
		echo "<label>Closed:</label>".$row['dateClosed']."<br>";
		echo "<label>Title:</label>".$row['title']."<br>";
		echo "<label>Description:</label>".$row['description']."<br>";
		echo"</td>";
		 echo "<td><a href='selectTech.php?customerID=".$_SESSION['customerID']."'><button>Select</button></a></td>";
		echo"<tr>";
	
	
}
echo "</table>";
}

 

?>
<?php include '../view/footer.php'; ?>