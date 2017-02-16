<?php include '../view/header.php'; ?>
<main>
    <link href="main.css" rel="Stylesheet" type="text/css"/>
</main>

<body>
    <div>
            <h1>Product List</h1>
            <?php
            require ('../config.php');
            $result = "SELECT * FROM `products` ORDER BY `products`.`id` DESC";
           $products = $db->query($result);
            echo "<table border='1' cellpadding='10'>";
            echo "<tr><th>Code</th><th>Name</th><th>Version</th><th>Release Date</th></tr>";
           // while ($product = mysqli_fetch_array($result)){
            foreach ($products as $product) {
                # code...
            
                echo "<tr>";
                //echo '<td>' .$product['id'] .'</td>';
                echo '<td>' .$product['productCode'] .'</td>';
                echo '<td>' .$product['name'] .'</td>';
                echo '<td>' .$product['version'] .'</td>';
                echo '<td>' .date("m.d.Y", strtotime($product['releaseDate'])).'</td>';
                echo '<td><a href="delete.php?id=' .$product['id'] .'"  onclick="return confirm(\'Are you sure?\')"><button>Delete</button></a></td>';
                echo "</tr>";
            }
            echo "</table>";
            ?><br />
        <a href="add_product.php">Add Product</a>
    </div>
    <?php include '../view/footer.php'; ?>
</body>