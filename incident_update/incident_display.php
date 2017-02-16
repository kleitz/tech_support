<?php 
include '../config.php';
include '../view/header.php';
?>
<section class="main">
        
        <?php
        try{
        if ((isset($_SESSION['loginUser']) && isset($_SESSION['techLog']))) {
            $id = $_SESSION['techLog'];
         $email=$_SESSION['loginUser'];


$sql = "SELECT customers.customerID,customers.firstName, customers.lastName,incidents.productCode, incidents.incidentID,incidents.techID, incidents.dateOpened, incidents.title, incidents.description FROM incidents INNER JOIN customers ON customers.customerID = incidents.customerID WHERE incidents.techID = '$id'";
  if(!$stmt = $connectdb->prepare($sql)){
        throw new Exception("Message:[" . mysqli_sqlstate($conn) . "] Base Table or View not Found:" . mysqli_error($conn));
        
        
        }
            $stmt->execute();
            $res = $stmt->get_result();
            
 if ($res = $stmt->get_result()) {
          echo"<h4 class='h4-responsive'>Select Incident</h4>";      
    echo "<table>";
    echo"<tr><th>Customer</th><th>Product</th><th>Date Opened</th><th>Title</th><th>Description</th></tr>";
    if($res->num_rows()>0){
    
    while($row =$res->fetch_object()){
    
        $_SESSION['incidentID'] = $row->incidentID;
        $_SESSION['customerID'] = $row->customerID;
        
        echo"<tr>";
        echo"<td>".$row->firstName."\t".$row->lastName."</td>";
        echo "<td>".$row->productCode ."</td>";
        echo "<td>".$row->dateOpened ."</td>";
        echo "<td>".$row->title ."</td>";
        echo "<td>".$row->description."</td>";
        
         echo "<td><a href='incident_update.php?incidentID=".$_SESSION['incidentID']."'><button>Select</button></a></td>";
        echo"<tr>";
    
    }}}
    else{
        echo"<h1>Select Incident</h1>";  
        echo "<p>There are no Open incidents for this technician.</p>";
        echo"<p><a href='incident_display.php'>Refresh List of Incidents</a></p>";

    }
echo "</table>";
echo "<p>You are Logged in as ".$email."</p>";
echo"<a href='logout.php'><button>Log Out</button></a>";
                
                               }
             else 
                {
                echo "Encountered an error while Logging in:<br>";
                echo "<a href='index.php'><button>Try Logging in Again!!</button>";
                }}
                catch (Exception $e) {
            echo '<h1>Database Error</h1>';
            echo "An Error occured while working with the database:<br>", $e->getMessage();
        }
         
        ?>
    </section>
<?php include '../view/footer.php'; ?>
