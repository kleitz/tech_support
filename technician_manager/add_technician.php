<?php include '../view/header.php'; ?>
<main>
    <link href="main.css" rel="Stylesheet" type="text/css"/>
</main>

<body>
    <div>
        <h1>Add Technician</h1>
        <form action="technician_insert.php" method="post" class="form1">
            <p><label>First Name:</label><input type="text" name="firstName" /></p>
            <p><label>Last Name:</label><input type="text" name="lastName" /></p>
            <p><label>Email:</label><input type="email" name="email" /></p>
            <p><label>Phone:</label><input type="tel" name="phone" /></p>
            <p><label>Password:</label><input type="password" name="password" /></p>
            <label></label><input type="submit" name="insert" value="Add Technician" /></p>
        </form><br />
    <p><a href="index.php">View Technician List</a></p>
    </div>
<?php include '../view/footer.php'; ?>
</body>