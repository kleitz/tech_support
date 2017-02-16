<?php 
include '../view/header.php';
include 'lockuser.php';
?>
<main>
    <link href="main.css" rel="Stylesheet" type="text/css"/>
</main>

<body>
    <div>
        <h1>Create Incident</h1>
        <form action="incident_created.php" POST="" class="form1">
            <p><label>Customer:</label>
                <?php 
                echo $login_session;
                echo " ";
                echo $login_session1; 
                ?>
            </p>
            <p><label>Product:</label>
                <select name="product">
                    <option value="TEAM10">Team Manager Version 1.0</option><option value="TRNY10">Tournament Master Version 1.0</option><option value="TRNY20">Tournament Master Version 2.0</option>
                    <option value="LEAGD10">League Scheduler Deluxe 1.0</option><option value="LEAG10" selected>League Scheduler 1.0</option>
                    <option value="DRAFT20">Draft Manager 2.0</option>
                    <option value="DRAFT10">Draft Manager 1.0</option>
                </select>
            </p>
            <p><label>Title:</label><input type="text" name="title" /></p>
            <p><label>Description:</label><textarea type="text" name="description"></textarea></p>
            <p><label></label><input type="submit" name="insert" value="Create Incident" /></p>
        </form>
    </div>
<?php include '../view/footer.php'; ?>
</body>