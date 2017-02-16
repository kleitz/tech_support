<?php 
  //Class called database which connects the technicians to the database.
    class  DBObject{
       //private properties for database connection details.
        private $hostname, $username, $password, $db_name, $con, $table_name;
        
    /**
       * Constructor
       * @param String $hostname,$username,$password,$db_name. 
       * All information we need to provide whenever connect to db.
       */
        public function __construct($hostname,$username,$password,$db_name){
            $this->hostname = $hostname;
            $this->username = $username;
            $this->password = $password;
            $this->db_name = $db_name;
        }
        
    /**
       * Connect to MySQL.
       * @return void
       */
        public function connectToMySQL(){
            $this->con = mysql_connect($this->hostname,$this->username,$this->password);
            if($this->con){
                echo "Connected sucessfully to MySQL .";
            }
            else{
                die( "Could not connect to MySQL" . mysql_error() . ".");
            }
        }
     /**
       * Select a database you will work with.
       * @return void
       */        
       public function selectDB(){
            $result = mysql_select_db($this->db_name,$this->con);
            if($result){
                echo "Connected sucessfully to database ' ".$this->db_name." ' .";
            }
            else{
                die( "Could not connect to database ' ". $this->db_name. " '  ".mysql_error() . ".");
            }
        }
    
     /**
       * View data of a table
       */    
        public function viewTableData($db_name,$table_name){
               mysql_select_db($db_name);
            $sql = "Select * from $table_name";
            $result = mysql_query($sql);
            $count_fields = mysql_num_fields($result); 
            $count_rows = mysql_num_rows($result);
            $index = 0;
            echo "
            <table border='1' width='50%'>
                <tr bgcolor='#CCCCCC'>
                    <td colspan='2'>This is '$table_name' table data</td>
                </tr>
                <tr bgcolor='#CCCCCC'>
                    <td>ID </td>
                    <td>Fruit name</td>
                </tr>
    
            ";
            while($row = mysql_fetch_array($result))
            {
            echo "
                <tr>
                    <td>".$row['id']."</td>
                    <td>".$row['name']."</td>
                </tr>";
            }
            echo "
            </table>
            "; 
        }
        
  
    }
?>