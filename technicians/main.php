
<?php

include '../config.php';
 include '../view/header.php'; ?>
 <div class="update">
           
 <?php if(isset($_SESSION['loginUser'])){
    $user = $_SESSION['loginUser'];
   
   header("Location: ../incident_update ");
   exit();
   
 
}
?>
 </div> 
<?php include '../view/footer.php'; ?>
