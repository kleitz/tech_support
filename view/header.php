 <?php
  session_start();
  
  if(isset($_SESSION['loginUser'])){
          $user = "<a href='logout.php' class='btn-large'>Logout</a>(".$_SESSION['loginUser'].")";
              }
      
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>SportsPro Technical Support</title>

    <!-- Material Design Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="../assets/css/mdb.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">

</head>
<body class="view hm-black-strong full-bg-img flex-center">
<!-- the body section -->
<!--header section begins-->
<header class="head jello">
    <h2>SportsPro Technical Support</h2>
    <p class="lead">Sports management software for the sports enthusiast</p>
</header>
<!--header section end-->
<div class="divider-new"></div>
<!--navbar  section begins-->
<nav class="navbar-static-top">
 
       <ul>
           <li><a href="../admin/">Administrators</a></li>
           <li><a href="../technicians/">Technicians</a></li>
           <li><a href="../product_manager/">Product</a></li>
           <li class="position"><?php    $notLogin="No Logged in user.";echo isset($user)?$user:$notLogin;?></li>
       </ul>
      
</nav>
<!--navbar  section ends-->


   

