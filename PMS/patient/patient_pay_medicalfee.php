<?php
  include 'patient_config.php';
  
  error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="stylesheet" href="patient.css" />
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <title>Medical_fee</title>
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
 <body style="background-image: url('2.gif'); background-size: cover">
   <nav class="navbar">
     <!-- LOGO -->
     <div class="logo"><i class="material-icons" style="font-size:36px;">medication</i>&nbsp;  Patient</div>
     <!-- NAVIGATION MENU -->
     <ul class="nav-links">
       <!-- NAVIGATION MENUS -->
       <div class="menu">
         <li><a href="../index.php">Home</a></li>
         <li><a href="Patient_med.php">Medicines</a></li>
         <li><a href="patient_doc.php">Doctors</a></li>
         <li class="services">
            <a href="patient_pay_medicalfee.php">Payments</a>
            <!-- DROPDOWN MENU -->
            <ul class="dropdown">
              <li><a href="patient_pay_medicalfee.php">Medical Fee</a></li>
            </ul>
         <li><a href="patient_contact.php">Contact</a></li>
   </nav><br>
   <div class="form-container" >
    <h3>Medical Expenses</h3><br>
    <form action="patient_pay_medicalfee.php" method="POST">
        <label for="P_ID">Patient id </label>
        <input type="text" id="P_ID" name="P_ID" required><br>
        <label for="Token">Appointment number: </label>
        <input type="text" id="Token" name="Token" value=""><br>
        <label for="C_Date">Appoitment date : </label>
        <input type="text" id="C_Date" name="C_Date" value=""><br><br>
        <input  name="submit" type="submit" class="btn">
    </form> 
   </div>
   <table class="table_content"> 
       <tr>
           <th>Appointment id</th>
           <th>Patient id</th>
           <th>Patient name</th>
           <th>Room charge</th>
           <th>Doctor fee</th>
           <th>Medicines fee</th>
           <th>Extra Charges</th>
           <th>Total Bill</th>
       </tr>
       <?php 
  if(!isset($_POST['submit']))
  {
    echo "<br>Please Enter Patient id!<br><br>";
  }

  else{
    $P_ID = $_POST['P_ID'];
    $Token = $_POST['Token'];
    $C_Date= $_POST['C_Date'];
    
    if($P_ID!="")
      {
      $query="select Token,P_ID, F_name, Room_charge, Doctor_fee, Medical_fee, Extra_Charges, Total_bill from
      bill natural join appointment natural join patient where P_id='$P_ID'";
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
                <td><?php echo $row['Extra_Charges']; ?></td>
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