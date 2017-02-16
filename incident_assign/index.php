<?php 
session_start();
?>
<?php
include '../view/header.php'; 
include "../config.php";
?>
<h1>Unassigned Incidents</h1>
<a href="assigned_incidents.php">View Assigned Incidents</a>
<?php
$sql = "SELECT *, IF(dateClosed IS NULL, 'OPEN', dateClosed)dateClosed,customers.customerID,customers.firstName, customers.lastName,incidents.productCode,products.name FROM incidents INNER JOIN customers ON customers.customerID = incidents.customerID INNER JOIN products ON incidents.productCode = products.productCode WHERE incidents.techID IS NULL";

if( $result = mysqli_query($connectdb,$sql)){

	echo "<table>";
	echo"<tr><th>Customer</th><th>Product</th><th>Incident</th></tr>";
	
	while($row = mysqli_fetch_object($result)){
	
		$_SESSION['incidentID'] = $row->incidentID;
		$_SESSION['customerID'] = $row->customerID;
		
		echo"<tr>";
				echo"<td>".$row->firstName."\t".$row->lastName."</td>";
		echo "<td>".$row->name."</td>";
		echo"<td>";
		echo "<label>ID:</label>".$row->incidentID."<br>";
		echo "<label>Opened:</label>".$row->dateOpened."<br>";
		echo "<label>Closed:</label>".$row->dateClosed."<br>";
		echo "<label>Title:</label>".$row->title."<br>";
		echo "<label>Description:</label>".$row->description."<br>";
		echo"</td>";
		 echo "<td><a href='selectTech.php?customerID=".$_SESSION['customerID']."'><button>Select</button></a></td>";
		echo"<tr>";
	
	
}
echo "</table>";
}

 

?>
<?php include '../view/footer.php'; ?>