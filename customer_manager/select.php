<?php
  session_start();
?>
<?php

include "../config.php";
include '../view/header.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
     $id = $_POST['customerID'];
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal = $_POST['postalCode'];
    $country = $_POST['countryName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

$errors = array();
$_SESSION['errorsarray'] = $errors;
    //form validation
    //checking for first name if empty

    if ((preg_match("/\S+/", $_POST['firstName']) === 0)) {
        $errors['fname'] = "* Required.";
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $_POST['firstName'])) {
        $errors['fname'] = "* Only letters and white space allowed.";
    }


    //checking for last name if empty

    if ((preg_match("/\S+/", $_POST['lastName']) === 0)) {
        $errors['lname'] = "* Required.";
    }

    if ((!preg_match("/^[a-zA-Z ]*$/", $_POST['lastName']))) {
        $errors['lname'] = "* Only letters and white space allowed.";
    }



    //checking for address

    if (empty($_POST['address'])) {
        $errors['address'] = "* Required.";
    }
    if (!preg_match('/^[\w \d]{1,51}$/', $_POST['address'])) {
        $errors['address'] = "Contains atleast 1 or max of 51 chars.";
    }


    //checking if city has min and max values
    if (empty($_POST['city'])) {
        $errors['city'] = "Required.";
    }

    if (!preg_match('/^[\w \d]{1,51}$/', $_POST['city'])) {
        $errors['city'] = "Contains atleast 1 or max of 51 chars.";
    }

    //checking if state has min and max values
    if (empty($_POST['state'])) {
        $errors['state'] = "* Required.";
    }

    if (!preg_match('/^[\w \d]{1,51}$/', $_POST['state'])) {
        $errors['state'] = "Contains atleast 1 or max of 51 chars.";
    }

    //checking if postal code has min of 1 and max 21 values
    if (empty($_POST['postalCode'])) {
        $errors['postalCode'] = "* Required.";
    }

    if (!preg_match('/^[\w \d]{1,21}$/', $_POST['postalCode'])) {
        $errors['postalCode'] = "Contains atleast 1 or max of 51 chars.";
    }

    //checking if phone is format (000) 000-0000 has min and max values
    if (empty($_POST['phone'])) {
        $errors['phone'] = "* Required.";
    }

    if (!preg_match("/^\(\d{3}\) \d{3}-\d{4}$/", $_POST['phone'])) {
        $errors['phone'] = "Use format (000) 000-0000.";
    }

    //checking if email is valid
    if (empty($_POST['email'])) {
        $errors['email'] = "* Required.";
    }
    if (!preg_match("/.+@.+\..+/", $_POST['email'])) {
        $errors['email'] = "Not a valid e-mail address.";
    }


    //checking  password 
    if (empty($_POST['password'])) {
        $errors['password'] = "* Required.";
    }

    if (!preg_match('/^[\w\d]{1,21}$/', $_POST['password'])) {
        $errors['password'] = "Password must contain atleast 6 or 21 Characters.";
    }

    //sending data to the database updating and inserting.

   
    //checking availability of errors.
    if (count($errors) === 0) {

        //inserting and updating commands.

        if (!empty($_POST['customerID'])) {
            echo "successfully updated";
             //sql code to update fields in the database
            $sql = "UPDATE `customers` SET `firstName` = '$fname', `lastName` = '$lname', "
                . "`address` ='$address',`city` = '$city',`state` = '$state',`postalCode` = '$postal',"
                . "`countryCode` = '$country',`phone` = '$phone',`email` = '$email',"
                . " `password` = '$pass'"
                . "WHERE `customerID` = '$id'";


            if (mysqli_query($connectdb, $sql)) {
                unset($_SESSION['customerID']);
                unset($_SESSION['errorsarray']);
                session_destroy();
                header("Location: index.php");
                exit();
            }
            else{
                echo mysqli_connect($connectdb);
            }
        }
         elseif (empty($_POST['customerID'])) {
             //sql code to insert data to the database.
            $sql1 = "INSERT INTO `customers` (`customerID`, `firstName`, `lastName`, `address`, `city`,
                 `state`, `postalCode`, `countryCode`, `phone`, `email`, `password`) VALUES (NULL, 
                 '$fname', '$lname', '$address', '$city', '$state', '$postal', '$country', '$phone', 
                 '$email', '$pass')";

            if (mysqli_query($connectdb, $sql1)) {

                unset($_SESSION['errorsarray']);
                session_destroy();
                header("Location: index.php");
                exit();
            }else{
                echo mysqli_error($connectdb);
            }
           
        }
        
    }
}
?>

<?php

if (isset($_GET['customerID'])) {

    $_SESSION['customerID'] = $_GET['customerID'];

    $id = $_SESSION['customerID'];

    $sql2 = "SELECT * FROM `customers`  WHERE `customerID` = '$id' LIMIT 1";

    $result = mysqli_query($connectdb, $sql2);

    if ($row = mysqli_fetch_object($result)) {

        require'customerDet.php';
        exit();
    }
} else {
    unset( $_SESSION['customerID']);
    session_destroy();
    require'customerDet.php';
    exit();
}
?>

<?php include '../view/footer.php'; ?>
