<?php
include "../config.php";
 include '../view/header.php'; 
if (isset($_GET['action'])== "insert"){
    //session_destroy();
    
   
        header("Location: select.php");
}
 else {
    echo 'error';
}

?>
<?php include '../view/footer.php'; ?>