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
   <title>Medicines</title>
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
            <a href="patient_pay_rooms.php">Payments</a>
            <!-- DROPDOWN MENU -->
            <ul class="dropdown">
              <li><a href="patient_pay_rooms.php">Rooms </a></li>
              <li><a href="patient_pay_medicalfee.php">Medical Fee</a></li>
            </ul>
         <li><a href="patient_contact.php">Contact</a></li>
   </nav><br>
   <div class="form-container" >
        <h3>Medical Prescription</h3><br>
    <form action="patient_med.php" method="POST">
        <label for="P_ID">Patient's id : </label>
        <input type="text" id="P_ID" name="P_ID" required><br>
        <label for="D_Id">Doctor id : </label>
        <input type="text" id="D_Id" name="D_Id" value=""><br>
        <label for="Medicine">Medicine 1 : </label>
        <input type="text" id="Medicine" name="Medicine" value=""><br>
        <input  name="submit" type="submit" class="btn">
    </form> 
   </div>
   <table class="table_content"> 
       <tr>
           <th>Department name</th>
           <th>Department id</th>
           <th>Phone number</th>
       </tr>
       <?php 
  if(!isset($_POST['submit']))
  {
    echo "Please Enter Patient id!<br>";
  }

  else{
    $P_ID = $_POST['P_ID'];
    $D_Id = $_POST['D_Id'];
    $Medicine= $_POST['Medicine'];
    
    if($Medicine!=""||$D_Id!="")
      {
      $query="select * from prescription join prescription_doctor where P_ID='$P_ID' or (D_Id='$D_Id' or Medicine='$Medicine' or Medicine='$m2')";
      $data =mysqli_query($conn,$query);
        if (mysqli_num_rows($data)>0)
        {
          while($row=mysqli_fetch_array($data))
            {?>
              <tr>
                <td><?php echo $row['Dept_ID']; ?></td>
                <td><?php echo $row['Dept_name']; ?></td>
                <td><?php echo $row['Dept_phno']; ?></td>
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
    if($Medicine="" && $D_Id="")
      {
      $query="select * from prescription  where P_ID='$P_ID' ";
      $data =mysqli_query($conn,$query);
        if (mysqli_num_rows($data)>0)
        {
          while($row=mysqli_fetch_array($data))
            {?>
              <tr>
                <td><?php echo $row['P_ID']; ?></td>
                <td><?php echo $row['Medicine']; ?></td>
                <td><?php echo $row['Dosage']; ?></td>
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