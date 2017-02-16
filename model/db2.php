<?php 
    //Include DBObject.php file 
    include ("DBObject.php");
    
    //Create objects from DBObject class.
    $myObj = new DBObject("localhost","root","","tech_support");
    
    //Call methods of objects.
    $myObj ->connectToMySQL();
    $myObj ->selectDB();
    
    $myObj ->setTableName("technicians");
    $myObj ->viewTableData($myObj->getDBName(),$myObj->getTableName());
    $myObj ->showMessage();
?>