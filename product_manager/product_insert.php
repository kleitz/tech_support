<?php
include "../config.php";
if(isset($_POST['productAdd'])){
    $productCode = $_POST['productCode'];
    $name = $_POST['name'];
    $version = $_POST['version'];
    $releaseDate = $_POST['releaseDate'];

    if($productCode !=''|| $name !=''){
           //Insert Query of SQL

    $date=date('Y-m-d',strtotime($releaseDate));
    $sql = "INSERT INTO `products` (`id`, `productCode`, `name`, `version`, `releaseDate`) VALUES (NULL, '$productCode', '$name', '$version', '$date')";
     
 if(mysqli_query($connectdb,$sql)){
        header("Location: index.php");
        exit();
    } 
    else
    {
        echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
    }
}
else{
    echo "<p>Product Code and Name are empty.Try again.</p>";
}
}

// Closing Connection with Server
mysqli_close($connectdb);
?>