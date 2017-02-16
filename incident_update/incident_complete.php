<?php 
session_start();
include '../view/header.php'; 
include "../config.php";
?>
<link rel="stylesheet" type="text/css"
          href="../main.css">
<div  class="update">
	<?php
if (isset($_SESSION['loginUser'])) {
	echo"<p>";
	echo "<h1>Update Incident.</h1>";
	echo "The Incident was updated.<br>";
	echo "<a href='incident_display.php'>Select Another Incident</a><br><br>";
	echo"</p>";
}
echo "<p>You are Logged in as ".$_SESSION['loginUser']."</p>";
echo"<a href='logout.php'><button>Log Out</button></a>";

?>
</div>

<?php include '../view/footer.php'; ?>