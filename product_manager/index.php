<?php include '../view/header.php'; ?>
<main>
    <link href="main.css" rel="Stylesheet" type="text/css"/>
</main>

<body>
    <div>
<?php require '../config.php'; ?>


        <?php
        $servername = "localhost";
        $username = "root";
        $password = " ";
        $dbname = "tech_support";
        $conn = new mysqli($servername, $username, "", $dbname);
        try {


            $sql = "SELECT * FROM `products` ORDER BY `product`.`id` DESC";
        if(!$stmt = $conn->prepare($sql)){
        throw new Exception("Message:[" . mysqli_sqlstate($conn) . "] Base Table or View not Found:" . mysqli_error($conn));
        
        
        }
            $stmt->execute();
            $res = $stmt->get_result();
            
        echo "<h1>Product List</h1>";
            echo "<table border='1' cellpadding='10'>";
            echo "<tr><th>Code</th><th>Name</th><th>Version</th><th>Release Date</th></tr>";

            while ($row = $res->fetch_assoc()) {
                echo "<tr>";
                echo "<tr>";
                //echo '<td>' . $row['id'] .'</td>';
                echo '<td>' . $row['productCode'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['version'] . '</td>';
                echo '<td>' . date("m.d.Y", strtotime($row['releaseDate'])) . '</td>';
                echo '<td><a href="delete.php?id=' . $row['id'] . '"  onclick="return confirm(\'Are you sure?\')"><button>Delete</button></a></td>';
                echo "</tr>";
            }
           
            echo "</table>";
           
            echo "<a href='add_product.php'>Add Product</a>";
        } catch (Exception $e) {
            echo '<h1>Database Error</h1>';
            echo "An Error occured while working with the database:<br>", $e->getMessage();
        }
        ?>
       
    
       </div>
    <?php include '../view/footer.php'; ?>
</body>


