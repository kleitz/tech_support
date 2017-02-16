<?php include '../view/header.php'; ?>
<main>
    <link href="main.css" rel="Stylesheet" type="text/css"/>
</main>

<body>
    <div>
        <h1>Add Product</h1>
        <form action="product_insert.php" method="post" class="form1">
            <p><label>Code:</label><input type="text" name="productCode" /></p>
            <p><label>Name:</label><input type="text" name="name" /></p>
            <p><label>Version:</label><input type="text" name="version" /></p>
            <p><label>Release Date:</label><input type="date" name="releaseDate"  <?php
            $regex = "/^(\d{2})\/(\d{2})\/(\d{4})$/"; 
            if (isset($_POST['releaseDate']) && preg_match($regex, $_POST['releaseDate'])) {?>
                value="<?php echo $_POST['releaseDate'];?>"
<?php
            }
            else{
                ?>
                value ="<?php echo 'Format dd/mm/yyy';?>"
                <?php
                } ?>
            /><span> Use any valid date format</span></p>
            <label></label><input type="submit" name="productAdd" value="Add Product" /></p>
        </form><br />
    <p><a href="index.php">View Product List</a></p>
    </div>
<?php include '../view/footer.php'; ?>
</body>