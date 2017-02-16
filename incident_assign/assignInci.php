<?php
session_start();
?>

<?php
include '../view/header.php';
include "../config.php";
?>
<?php

if (isset($_GET['technicianID']) && isset($_GET['customerID'])) {

$_SESSION['techID']=$_GET['technicianID'];
$tid =  $_SESSION['techID'];

$_SESSION['customerID'] = $_GET['customerID'];
$cid =   $_SESSION['customerID'];

     $sql1 = "SELECT `techID`,`firstName`,`lastName` FROM technicians WHERE techID='$tid'";

    $result1=mysqli_query($connectdb, $sql1);

   $sql2 = "SELECT customers.`customerID` AS cID, `firstName`,`lastName`,`productCode` FROM customers JOIN `incidents`ON customers.customerID = incidents.customerID WHERE customers.customerID='$cid'";

        $result2=mysqli_query($connectdb, $sql2);

    if ($row2 = mysqli_fetch_array($result2)) {
       
       echo "<h3>Assign Incident.</h3>";
       echo "<label>Customer:</label>" . $row2['firstName'] . "\t" . $row2['lastName'] . "<br>";
       echo "<label>Product:</label>" . $row2['productCode']. "<br>";

       $row1 = mysqli_fetch_array($result1);
        echo "<label>Technician:</label>" . $row1['firstName'] . "\t" . $row1['lastName']. "<br>";
        echo "<a href = 'assignUpt.php?techID=".$tid."&custID=".$cid."'><button>Assign Incident</button></a>";

        
    }
     else {

        echo "You have encountered the following Error" . mysqli_error($connectdb);
        
    }
    
      /*
   
} else {
    session_destroy();
    echo "Sessions of Customers and Incidents are not Set.";
   
}
*/
}
?>
<?php include '../view/footer.php'; ?>