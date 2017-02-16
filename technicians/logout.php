<?php
session_start();
include '../view/header.php';

 unset($_SESSION['loginUser']);
 unset($_SESSION['techLog']);
 session_destroy();
header("location: index.php");
exit();
?>

<?php
 include '../view/footer.php'; 
 ?>