 <?php

//technician class that retrieves data fro the technicians and displays
class TechnicianDB
 
{
    
public function getData() {
 include 'technician.php';

 $myObj = new Technicians();

$rows = $myObj->get_rows();



    echo $myObj->get_name(0)."<br>";

}

 
}
$tech = new TechnicianDB();
$tech->getData();
?>
