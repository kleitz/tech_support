<?php
session_start();
include "../config.php";
 include '../view/header.php'; 
 $_SESSION['customerID']= $_GET['customerID'];
switch (isset($_POST['lastName'])) {
    case '!empty($_POST["lastName"])':
        $lname = $_POST['lastName'];
       
         $sql="SELECT * FROM `customers` WHERE  `lastName` LIKE '%" . $lname . "%'";
           
               $query= mysqli_query($connectdb,$sql);
          echo "<table border='1' cellpadding='10'>";
            echo "<tr><th>Name</th><th>Email Address</th><th>city</th><th></th></tr>";
            while ($row = mysqli_fetch_array($query)){
                
               echo "<tr>";
                echo '<td>' .$row['firstName'].$row['lastName'].'</td>';
                echo '<td>' .$row['email'].'</td>';
                echo '<td>' .$row['city'].'</td>';
                echo '<td><a href="select.php?customerID=' .$row['customerID'].'"><button>Select</button>';
                echo "</tr>";
                 $_SESSION['customerID']= $row['customerID'];
            }
            echo "</table>";
        break;
    
    default:
        echo "Sorry, but we can not find an entry to match your query...<br><br>";
        break;
}

?> 
<?php include '../view/footer.php'; ?>