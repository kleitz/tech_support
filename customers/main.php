<?php
session_start();
include '../config.php';
 include '../view/header.php'; ?>
 <div class="update">
           
 <?php 
 if(isset($_SESSION['loginUser'])){
    $user = $_SESSION['loginUser'];
   
   header("Location: ../product_register ");
   exit();
   }
   else{
    echo"<p>You have encountered and error while logging in.<br>";
    echo "Please try again!!<br></p>";
    echo "<a href='../customers'>Go Back and Log IN</a>";
   }
?>
 </div> 
<?php include '../view/footer.php'; ?>
