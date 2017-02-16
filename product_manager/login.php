<?php 
session_start();
include '../view/header.php';
require "../config.php";
?>
<h3>Admin Login</h3>
<form action="login.php" method="POST" class="loginForm">
<ul class="formField">
<li> <label>UserName:</label><input type="text" name="user"></li>
<li>  <label>Password:</label><input type="password" name="pass"> </li>
<li><input type="submit" name="login" value="Login"></li>
</ul>

</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])) {

    $username = $_POST['user'];
    $password = $_POST['pass'];
    $_SESSION['user'] = $username;

    $res = mysqli_query($connectdb, "select * from `administrators` where  `username` = '$username'  and  `password` = '$password' ");

    if (mysqli_num_rows($res) > 0) {
        $_SESSION['user'] = $username;
       echo "<h3>Success in Logging in</h3>\n";
          echo "<h4>You have logged in as:\t".$_SESSION['user']."</h4>";

        // echo 'sucess logging in';
    } else {
        echo "Error in Logging in.\n";
              echo "Please try again.\n";
    }
}
?>

<?php include '../view/footer.php';?>



