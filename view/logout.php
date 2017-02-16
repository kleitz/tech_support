<?php
include '../view/header.php';

 unset($_SESSION['loginUser']);
 session_destroy();
header("location: index.php");
exit();
?>

<?php
 include '../view/footer.php'; 
 ?>