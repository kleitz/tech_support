<?php
mysqli_report(MYSQLI_REPORT_STRICT);
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'tech_support';


try {
    @ $connectdb = new mysqli($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
} catch (Exception $e ) {
     echo "Service unavailable";
     echo "message: " . $e->message; 
      printf("Error - SQLSTATE %s.\n", $mysqli->sqlstate);  // not in live code obviously...
     exit;
}

// Establishing Connection with Server

/*if (!$connectdb){
    die(mysqli_error());
} else {
    echo "<strong><em>successfully connected</em></strong>";
}*/

// Selecting Database from Server

?>