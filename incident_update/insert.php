<?php
include "../config.php";
if(isset($_POST['insert'])){
    $product = $_POST['product'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    if($product !=''|| $title !=''){
        //Insert Query of SQL
        $query = mysqli_query($connectdb, "insert into incidents (product, title, description) values ('$product', '$title', '$description')");
        header("location: incident_created.php");
    } else{
        echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
    }
}

// Closing Connection with Server
mysqli_close($connectdb);
?>