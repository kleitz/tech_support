<?php
  
include ("../config.php");
 include '../view/header.php'; ?>



    <?php
     
     
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $user = trim($_POST['email']);
            $pass = trim($_POST['password']);

            $sql = "SELECT * FROM `technicians` WHERE `email` = '$user'  AND `password` = '$pass' LIMIT 1";

            $result = mysqli_query($connectdb, $sql);
            $count = mysqli_num_rows($result);
           
            if ($count == 1){
             $_SESSION['loginUser'] = $user;
                header("location: main.php");
                exit();
            } else {
                echo "<p style='color:red'>Invalid Username or Password!!!<br>";
                echo "Please try Again!!!</p>";
            }
        }
    ?>


<section class="main">
        <form action = "" class="form1" method="post">
            <h4 class="h4-responsive">Technician Login</h4>
         <p>You must login before you update an incident</p>
            <p><label>Username:</label><input type="email" name="email" required/>
            <p><label>Password:</label><input type="password" name="password" required/></p>
             <p> <input type="submit" name="login" value="Login"  name="submit" /></p>

        </form>
</section>>
    <?php include '../view/footer.php'; ?>
