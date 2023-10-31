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
   <title>Doctor_details</title>
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
        <h3>Doctors</h3><br>
    <form action="patient_doc.php" method="POST">
        <label for="D_name">Doctor name : </label>
        <input type="text" id="D_name" name="D_name" value=""><br>
        <label for="Dept_name">Department : </label>
        <input type="text" id="Dept_name" name="Dept_name" value=""><br><br>
        <input  name="submit" type="submit" class="btn">
    </form> 
   </div>
   <table class="table_content"> 
       <tr>
           <th>Doctor Name</th>
           <th>Gender</th>
           <th>Department</th>
           <th>Designation</th>
       </tr>
       <?php 
  if(!isset($_POST['submit']))
  {
      $query="select D_name, D_gender, Dept_name, D_desig from doctor natural join doctor_dept 
      natural join department natural join doctor_desig";
    $data =mysqli_query($conn, $query);
    if (mysqli_num_rows($data)>0)
    {
    while($row=mysqli_fetch_array($data))
        { ?>
            <tr>
                <td><?php echo $row['D_name']; ?></td>
                <td><?php echo $row['D_gender']; ?></td>
                <td><?php echo $row['Dept_name']; ?></td>
                <td><?php echo $row['D_desig']; ?></td>
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
    $D_name = $_POST['D_name'];
    $Dept_name= $_POST['Dept_name'];
    
    if($Dept_name!=""||$D_name!="")
      {
      $query="select D_name, D_gender, Dept_name,D_desig from doctor natural join doctor_dept 
      natural join department natural join doctor_desig where Dept_name='$Dept_name' or D_name='$D_name'";
      $data =mysqli_query($conn,$query);
        if (mysqli_num_rows($data)>0)
        {
          while($row=mysqli_fetch_array($data))
            {?>
              <tr>
                <td><?php echo $row['D_name']; ?></td>
                <td><?php echo $row['D_gender']; ?></td>
                <td><?php echo $row['Dept_name']; ?></td>
                <td><?php echo $row['D_desig']; ?></td>
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