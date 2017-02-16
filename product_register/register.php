<?php
include '../view/header.php'; 
include 'lockuser.php'; 
?>
<main>
    <link href="main.css" rel="Stylesheet" type="text/css"/>
</main>

<body>
    <div>
        <form action = "registered.php" class="form1" method="post">
            <h1>Register Product</h1>
            
            <p><label>Customer:</label>
<?php
                echo $login_session;
                echo " ";
                echo $login_session1; ?></p>
            <p><label>Product:</label>
                <select name="products">
                    <option value="TEAM10">Team Manager Version 1.0</option>
                    <option value="TRNY10">Tournament Master Version 1.0</option>
                    <option value="TRNY20" selected>Tournament Master Version 2.0</option>
                    <option value="LEAGD10">League Scheduler Deluxe 1.0</option>
                    <option value="LEAG10">League Scheduler 1.0</option>
                    <option value="DRAFT20">Draft Manager 2.0</option>
                    <option value="DRAFT10">Draft Manager 1.0</option>
                </select>
            </p>
            <p><label></label><input type="submit" name="register" value="Register Product" class="buttons" name="submit" /></p>
            <p><?php echo "You are logged in as ". $_SESSION['loginUser'];?></p>
                    </form>
                    <p><a href="logout.php"><button>Log Out</button></a></p>
    </div>
    <?php include '../view/footer.php'; ?>
</body>