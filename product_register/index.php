<?php include '../view/header.php'; ?>
<main>
    <link href="main.css" rel="Stylesheet" type="text/css"/>
</main>

<body>
    <?php
        include ("../config.php");
        session_start();
  if (isset($_SESSION['loginUser'])) {
    header("Location: register.php");
    exit();

}
else{
    header("Location: ../customers");
    exit();
}
     

    ?>


      <?php include '../view/footer.php'; ?>
