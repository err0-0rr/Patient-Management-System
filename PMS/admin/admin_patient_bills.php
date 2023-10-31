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
       <h3>Patients Bills</h3><br>
       <form action="admin_patient_bills.php" method="POST">
      <label for="id">Patient id:</label>
      <input type="text" id="id" name="P_ID" ><br>
      <label for="name">Token: </label>
      <input type="text" id="name" name="Token" ><br>
      <input  name="submit" type="submit" class="btn">
    </form> 
   </div>
   <table class="table_content"> 
      <thead>
       <tr>

           <th>Token</th>
           <th>Patient ID</th>
           <th>Patient Name</th>
           <th>Room charge</th>
           <th>Doctor fee</th>
           <th>medical fee</th>
           <th>Total</th>
       </tr>
       </thead>
       <?php 
  if(!isset($_POST['submit']))
  {
      $query="select * from bill natural join appointment natural join patient";
    $data =mysqli_query($conn, $query);
    if (mysqli_num_rows($data)>0)
    {
    while($row=mysqli_fetch_array($data))
        { ?>
          <tbody>
            <tr>
                <td><?php echo $row['Token']; ?></td>
                <td><?php echo $row['P_ID']; ?></td>
                <td><?php echo $row['F_name']; ?></td>
                <td><?php echo $row['Room_charge']; ?></td>
                <td><?php echo $row['Doctor_fee']; ?></td>
                <td><?php echo $row['Medical_fee']; ?></td>
                <td><?php echo $row['Total_bill']; ?></td>
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
    $Token = $_POST['Token'];
    $P_ID = $P_ID['P_ID'];
    if($Token!="")
      {
      $query="select * from bill natural join appointment natural join patient where Token='$Token' or P_ID ='$P_ID' ";
      $data =mysqli_query($conn,$query);
        if (mysqli_num_rows($data)>0)
        {
          while($row=mysqli_fetch_array($data))
            {?>
              <tr>
                <td><?php echo $row['Token']; ?></td>
                <td><?php echo $row['P_ID']; ?></td>
                <td><?php echo $row['F_name']; ?></td>
                <td><?php echo $row['Room_charge']; ?></td>
                <td><?php echo $row['Doctor_fee']; ?></td>
                <td><?php echo $row['Medical_fee']; ?></td>
                <td><?php echo $row['Total_bill']; ?></td>
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