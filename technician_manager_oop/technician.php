<?php

include '../view/header.php';
include 'database_oo.php';

//technicians class storing data for each teachnician it inherits objects from database class
class Technicians extends Database {

    private $name;
    private $email;
    private $phone;
    private $password;
    private $id;
    private $num_rows;

//function that get number of rows
    public function get_rows() {
        return $this->num_rows;
    }


//function for getting technicians info
    public function get_name($count) {
        
        //connection from database
        $conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

        //querying the database
         try {

 $sql = "SELECT * FROM  `technicians` ";
          if(!$stmt = $conn->prepare($sql)){
        throw new Exception("Message:[" . mysqli_sqlstate($conn) . "] Base Table or View not Found:" . mysqli_error($conn));
        
        
        }
            $stmt->execute();
            $res = $stmt->get_result();

              //$this->num_rows = mysqli_num_rows($result);
        echo '<h1>Technician List Page.</h1><br>';
        echo '<table border="1" cellpadding="10" class="tableTech">';
        echo"<th>NAME</th><th>EMAIL</th><th>PHONE</th><th>PASSWORD</th>";
        while ($record = $res->fetch_object()) {
            echo '<tr>';
            echo '<td>' . $this->name = $record->firstName . "\t" . $record->lastName. '</td>';
            echo '<td>' . $this->email = $record->email . '</td>';
            echo '<td>' . $this->phone = $record->phone . '</td>';
            echo '<td>' . $this->password = $record->password. '</td>';
            echo '<td><a href="delete.php?techID=' . $this->id = $record->techID. '"><button>Delete</button></a></td>';
            echo '</tr>';
        }
        echo '</table><br>';
        echo "\t\t<a href='add_technician.php'>Add Technician</a>";
    
}
    catch (Exception $e) {
            echo '<h1>Database Error</h1>';
            echo "An Error occured while working with the database:<br>", $e->getMessage();
        }


}
}
?>