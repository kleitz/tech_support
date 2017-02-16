<?php include '../view/header.php'; ?>
<main>
    <link href="main.css" rel="Stylesheet" type="text/css"/>
</main>

<body>
    
    <?php
    session_start();
 include ("../config.php");
        
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
       $email = ($_POST['email']);
       $sql = "SELECT techID FROM technicians WHERE email = '$email'";
      $result = mysqli_query($connectdb, $sql);

            $count = mysqli_num_rows($result);
            if ($count == 1){
                $_SESSION['login_user'] = $email;
                header("location: incident_creation.php");
            } else {
                echo 'Email Address Invalid!!!';
            }
        }
    ?>
    
    <div>
        <form action = "" class="form1" method="post">
           <h1>Technician Login</h1>
            <p>You must be login before you can Update an incident.</p>
            <p><label>Email:</label><input type="email" name="email" required/>
                <input type="submit" name="login" value="Login" class="buttons" name="submit" /></p>
        </form>
    </div>
    <?php include '../view/footer.php'; ?>
</body>