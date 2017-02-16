<?php
// connect to the database

include ('../config.php');

// check if the 'id' variable is set in URL, and check that it is valid

if (isset($_GET['techID']) && is_numeric($_GET['techID'])){

// get id value

$id = $_GET['techID'];



// delete the entry

$result = mysqli_query($connectdb, "DELETE FROM technicians WHERE techID=$id")

or die(mysqli_error("Entry not found!!!"));



// redirect back to the technician list page

header("Location: index.php");

}

else

// if id isn't set, or isn't valid, redirect back to technician list page

{

header("Location: index.php");

}



?>