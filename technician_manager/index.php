<?php include '../view/header.php'; ?>
<main>
    <link href="main.css" rel="Stylesheet" type="text/css"/>
</main>

<body>
    <div>
            <h1>Technician List</h1>
            <?php
            include ('../config.php');
            $result = mysqli_query($connectdb, "SELECT * FROM technicians") or die(mysqli_error("Table not found!!!"));
            
            echo "<table border='1' cellpadding='10'>";
            echo "<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Password</th></tr>";
            while ($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo '<td>' .$row['firstName'].'</td>';
                echo '<td>' .$row['lastName'].'</td>';
                echo '<td>' .$row['email'].'</td>';
                echo '<td>' .$row['phone'].'</td>';
                echo '<td>' .$row['password'].'</td>';
                echo '<td><a href="delete.php?techID='.$row['techID'].'"><button>Delete</button></a></td>';
                echo "</tr>";
            }
            echo "</table>";
            ?>
        <br />
        <a href="add_technician.php">Add Technician</a>
    </div>
    <?php include '../view/footer.php'; ?>
</body>