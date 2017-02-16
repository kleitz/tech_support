<?php
//database class containing connection information
class Database {

    protected $db_name = 'tech_support';
    protected $db_user = 'root';
    protected $db_pass = '';
    protected $db_host = 'localhost';
    public $database;

    // Open a connect to the database.
    // Make sure this is called on every page that needs to use the database.

    public function connect() {
try {
    
        $conn= new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $database = $this->conn;
          throw new Exception("Message:[" . mysqli_sqlstate($conn) . "] Base Table or View not Found:" . mysqli_error($conn));
        

} catch (Exception $e) {
    
      if (mysqli_connect_errno()) {
            echo "An error occured while attempting to work with the database.",$e->getMessage();
            exit();
        }
}

      
  }  

}


?>