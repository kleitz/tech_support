<?php

/*

DELETE.PHP

Deletes a specific entry from the 'products' table

*/



// connect to the database

include('../config.php');



if (isset($_GET['id'])) {
    $id = $_GET['id'];
      
   $sql = "DELETE FROM `products` WHERE `id` = '$id'";

    if (mysqli_query($connectdb, $sql)) {
        header("Location: index.php");
        exit();
    }
 else {
        
     header("Location: index.php");
        exit();
 }
}
?>
