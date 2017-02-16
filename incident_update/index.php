 <?php 
     session_start();  
   ?>

<?php
 include '../view/header.php'; 
 include ("../config.php");
 ?>

<main>
    <link href="main.css" rel="Stylesheet" type="text/css"/>
</main>

<body>
    
    <?php
        
        if (isset($_SESSION['loginUser']) ){

       $email = ($_SESSION['loginUser']);
       

    $sql = "SELECT * FROM `technicians` WHERE `email` = '$email' LIMIT 1";
     $result = mysqli_query($connectdb, $sql);
      $row = mysqli_fetch_object($result);
           $_SESSION['techLog'] = $row->techID;
                 
                $_SESSION['loginUser'] = $email;
                header("Location: incident_display.php");
                exit();
            }
       
             else {
                header("Location:index.php");
                exit();
            }
        
    ?>
    
     <?php include '../view/footer.php'; ?>
</body>