<?php
include "../config.php";
if(isset($_POST['insert'])){
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    if($fname !=''|| $email !=''){
        //Insert Query of SQL
        $query = mysqli_query($connectdb, "insert into technicians (firstName, lastName, email, phone, password) values ('$fname', '$lname', '$email', '$phone', '$password')");
        echo "Technician Successfully added!!!";
    } else{
        echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
    }
}

// Closing Connection with Server
mysqli_close($connectdb);
?>