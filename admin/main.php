<?php
include '../config.php';
 include '../view/header.php'; ?>
<section class="main">
           
 <?php if(isset($_SESSION['loginUser'])){
          $user = $_SESSION['loginUser'];
    ?>
      
      
    <h4 class="h4-responsive rgba-blue-light lighten-4">Administrators Menu.</h4>
    <div class="row">
       
         <div class="col-md-4"> <p><a href="../product_manager">Manage Products</a></p></div>
         <div class="col-md-4"> <p><a href="../technician_manager">Manage Technicians</a></p></div>
         <div class="col-md-4"><p><a href="../customer_manager">Manage Customers</a></p> </div>
    </div>
    <div class="row">
        <div class="col-md-4"><p><a href="../technician_manager_oop">Manage Technicians OOP</a></p></div>
        <div class="col-md-4"> <p><a href="../incident_create">Create Incident</a></p></div>
        <div class="col-md-4"> <p><a href="../incident_assign">Assign Incident</a></p></div>
        
    </div>
    <div class="row">
        <div class="col-md-4"><p><a href="../incident_update">Display Incidents</a></p><br></div> 
    </div>

  
</section> 
 <?php } include '../view/footer.php'; ?>
