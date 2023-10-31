<?php
  include 'admin_config.php';
  
  error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="UTF-8" >
   <meta http-equiv="X-UA-Compatible" content="IE=edge" >
   <meta name="viewport" content="width=device-width, initial-scale=1.0" >
   <link rel="stylesheet" href="admin.css" >
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <title>DoctorAndPatient</title>
   <style>
.table_content {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 50%;
    margin:auto;
  }
  
  .table_content td, .table_content th {
    border: 1px solid #ddd;
    padding: 8px;
  }
  
  .table_content tr:nth-child(even){background-color: #ccc;}

  .table_content tr:nth-child(odd){background-color: #fff;}

  .table_content tr:hover {background-color: cadetblue}
  
  .table_content th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: cadetblue;
    color: white;
  }
</style>
 </head>
 <body style="background-image: url('1.gif'); background-size: cover">
   <nav class="navbar">
     <!-- LOGO -->
     <div class="logo"><i class="material-icons" style="font-size:36px;">supervisor_account</i>&nbsp;  ADMIN</div>
     <!-- NAVIGATION MENU -->
     <ul class="nav-links">
       
       <!-- NAVIGATION MENUS -->
       <div class="menu">
         <li><a href="../index.php">Home</a></li>
         <li class="services">
           <a href="admin_patient_details.php">Patient</a>
           <!-- DROPDOWN MENU -->
           <ul class="dropdown">
             <li><a href="admin_patient_details.php">Details </a></li>
             <li><a href="admin_patient_prescriptions.php">Prescriptions</a></li>
             <li><a href="admin_patient_bills.php">Bills</a></li>
           </ul>
           <li class="services">
            <a href="admin_doctor_details.php">Doctor</a>
            <!-- DROPDOWN MENU -->
            <ul class="dropdown">
              <li><a href="admin_doctor_details.php">Details </a></li>
              <li><a href="admin_doctor_patientscured.php">Patients Cured</a></li>
            </ul>
            <li class="services">
            <a href="admin_records_deaths.php">Records</a>
            <!-- DROPDOWN MENU -->
            <ul class="dropdown">
              <li><a href="admin_records_deaths.php">Deaths </a></li>
            </ul>
            <li><a href="admin_contact.php">Contact</a></li>
         </li>
     </ul>
   </nav><br>
   <div class="form-container" >
       <h3>Patients </h3><br>
    <form action="admin_doctor_patientscured.php"  method="POST">
      <label for="D_ID">Doctor ID</label>
      <input type="text" id="D_ID" name="D_ID" value=""><br>
      <label for="D_name">Doctor name</label>
      <input type="text" id="D_name" name="D_name" value=""><br>
      <input  name="submit" type="submit" class="btn">
    </form> 
   </div>
   <table class="table_content"> 
       <tr>
           <th>Patient Id</th>
           <th>Patient name</th>
           <th>Appointment id</th>
           <th>Doctor id</th>
           <th>Doctor name</th>
       </tr>
       <?php 
  if(!isset($_POST['submit']))
  {
      $query="select * from appointment natural join doctor natural join patient";
    $data =mysqli_query($conn, $query);
    if (mysqli_num_rows($data)>0)
    {
    while($row=mysqli_fetch_array($data))
        { ?>
            <tr>
                <td><?php echo $row['P_ID']; ?></td>
                <td><?php echo $row['F_name']; ?></td>
                <td><?php echo $row['Token']; ?></td>
                <td><?php echo $row['D_ID']; ?></td>
                <td><?php echo $row['D_name']; ?></td>
            </tr>
<?php
        }
    }
    else{
?>
    <tr>
    <td>Records Not Found!</td>
    </tr>
<?php
        }
  }

  else{
    $D_ID = $_POST['D_ID'];
    $D_name = $_POST['D_name'];
    
    if($D_ID!=""||$D_name!=""||$D_desig!="")
      {
      $query="select * from appointment natural join doctor natural join patient
       where D_ID='$D_ID' or D_name='$D_name'";
      $data =mysqli_query($conn,$query);
        if (mysqli_num_rows($data)>0)
        {
          while($row=mysqli_fetch_array($data))
            {?>
              <tr>
                <td><?php echo $row['P_ID']; ?></td>
                <td><?php echo $row['F_name']; ?></td>
                <td><?php echo $row['Token']; ?></td>
                <td><?php echo $row['D_ID']; ?></td>
                <td><?php echo $row['D_name']; ?></td>
              </tr>
    <?php
            }
       }
        else
      {
      ?>
        <tr>
        <td>Records Not Found!</td>
        </tr>
      <?php
      }
    }
    }
    ?>
   </div>
 </body>
</html>