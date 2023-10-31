<?php
  include 'admin_config.php';
  error_reporting(0);
?>

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

<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="UTF-8" >
   <meta http-equiv="X-UA-Compatible" content="IE=edge" >
   <meta name="viewport" content="width=device-width, initial-scale=1.0" >
   <link rel="stylesheet" href="admin.css" >
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <title>Patient_details</title>
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
              <li><a href="admin_doct_details.php">Details </a></li>
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
       <h3>Records</h3><br>
      <form action="admin_records_deaths.php" method="POST">
      <label for="id">Patient id: </label>
      <input type="text" id="id" name="P_ID" ><br>
      <label for="Disease">Disease: </label>
      <input type="text" id="Disease" name="Disease" ><br>
      <input  name="submit" type="submit" class="btn">
    </form> 
   </div>
   <table class="table_content"> 
      <thead>
       <tr>
           <th>Patient ID</th>
           <th>Disease</th>
           <th>Status</th>
           <th>Surgery</th>
       </tr>
       </thead>
       <?php 
  if(!isset($_POST['submit']))
  {
      $query="select P_ID,Disease,Status,Surgery from medical_history";
    $data =mysqli_query($conn, $query);
    if (mysqli_num_rows($data)>0)
    {
    while($row=mysqli_fetch_array($data))
        { ?>
          <tbody>
            <tr>
                <td><?php echo $row['P_ID']; ?></td>
                <td><?php echo $row['Disease']; ?></td>
                <td><?php echo $row['Status']; ?></td>
                <td><?php echo $row['Surgery']; ?></td>
            </tr>
          </tbody>
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
    $P_ID = $_POST['P_ID'];
    $Disease = $_POST['Disease'];
    
    if($P_ID!=""||$Disease!="")
      {
      $query="select P_ID,Disease,Status,Surgery from medical_history where P_ID='$P_ID' or Disease='$Disease' ";
      $data =mysqli_query($conn,$query);
        if (mysqli_num_rows($data)>0)
        {
          while($row=mysqli_fetch_array($data))
            {?>
              <tr>
                <td><?php echo $row['P_ID']; ?></td>
                <td><?php echo $row['Disease']; ?></td>
                <td><?php echo $row['Status']; ?></td>
                <td><?php echo $row['Surgery']; ?></td>
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