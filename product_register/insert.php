<?php
include "../config.php";
if(isset($_POST['insert'])){
    $product = $_POST['products'];
    
    $result = mysqli_num_rows(mysqli_query($connectdb, "SELECT * FROM registrations WHERE name = '$product'"));
    if ($result == 1){
        $query = mysqli_query($connectdb, "insert into registrations (customerID, productCode, registrationDate) values ('$customerid', '$productcode', '$registrationdate')");
        echo "<br/><br/><span><Strong>Product Successfully Registered...!!</strong></span>";
    }else{
        echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
    }
}

// Closing Connection with Server
mysqli_close($connectdb);
?>