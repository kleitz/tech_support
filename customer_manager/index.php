<?php
session_start();
include '../view/header.php'; 
include '../config.php'; 
?>
<main>
    <link href="main.css" rel="Stylesheet" type="text/css"/>
</main>

<body>
    <div>
        <form action = "index.php" class="form1" method="post">
            <h1>Customer Search</h1>
            <p><label>Last Name:</label><input type="text" name="lastName" required />
                <input type="submit" name="search" value="Search" class="buttons" name="submit" /></p>
        </form>
       
        <?php
        
        if (isset($_POST['lastName'])){
    $lname = $_POST['lastName'];
    if (!empty($lname)){

        $sql="SELECT * FROM `customers` WHERE  `lastName` LIKE '%" . $lname . "%'";
       // $sql="SELECT * FROM `customers` WHERE `lastName` LIKE '%".$lname."%')";
        $query= mysqli_query($connectdb,$sql);
        
        if (mysqli_num_rows($query) >=1 ){
            echo " <h1>Results</h1>";
            echo "<table border='1' cellpadding='10'>";
            echo "<tr><th>customerID</th><th>Name</th><th>Email Address</th><th>city</th><th></th></tr>";
            while ($row = mysqli_fetch_array($query)){
               $_SESSION['customerID']=$row['customerID'];
               echo "<tr>";
               echo '<td>' .$row['customerID'].'</td>';
                echo '<td>' .$row['firstName']."\t".$row['lastName'].'</td>';
                echo '<td>' .$row['email'].'</td>';
                echo '<td>' .$row['city'].'</td>';
                echo '<td><a href="select.php?customerID=' .$row['customerID'].'"><button>Select</button>';
                echo "</tr>";
                        }
            echo "</table>";
        }else{
            echo "Sorry, but we can not find an entry to match your query...<br><br>";
        }
    }
}
?>
        <p><h3>Add a new customer</h3>
        <a href="sessionClear.php"><button>Add Customer</button></a> 
        </p>
    </div>
    <?php include '../view/footer.php'; ?>
</body>