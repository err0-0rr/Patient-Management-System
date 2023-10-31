<?php
  include 'doctor_config.php';
  
  error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="stylesheet" href="doctor.css" />
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <title>Department</title>
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

  .table_content tr:hover {background-color: #04AA6D}
  
  .table_content th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;
  }
</style>
 </head>
 <body style="background-image: url('3.gif'); background-size: cover">
   <nav class="navbar">
     <!-- LOGO -->
     <div class="logo"><i class="material-icons" style="font-size:36px;">local_hospital</i>&nbsp;  Doctor</div>
     <!-- NAVIGATION MENU -->
     <ul class="nav-links">
       <!-- NAVIGATION MENUS -->
       <div class="menu">
         <li><a href="../index.php">Home</a></li>
         <li><a href="doctor_medical_rec.php">Patient Record</a></li>
         <li><a href="doctor_test.php">Tests</a></li>
         <li class="services">
            <a href="doctor_d_dept.php">Department</a>
            <!-- DROPDOWN MENU -->
            <ul class="dropdown">
              <li><a href="doctor_d_dept.php">Details</a></li>
            </ul>
         <li><a href="doctor_contact.php">Contact</a></li>
   </nav><br>
   <div class="form-container" >
    <h3>Department details</h3><br>  
    <form action="doctor_d_dept.php"  method="POST">
        <label for="Dept_name">Department Name : </label>
        <input type="text" id="Dept_name" name="Dept_name" value=""><br>
        <label for="Dept_ID">Department id : </label>
        <input type="text" id="Dept_ID" name="Dept_ID" value=""><br>
        <label for="Dept_phno">Department Contact No : </label>
        <input type="text" id="Dept_phno" name="Dept_phno" value=""><br><br>
        <input  name="submit" type="submit" class="btn">
    </form> 
   </div>
   <table class="table_content"> 
       <tr>
           <th>Department id</th>
           <th>Department name</th>
           <th>Phone number</th>
       </tr>
       <?php 
  if(!isset($_POST['submit']))
  {
      $query="select * from department";
    $data =mysqli_query($conn, $query);
    if (mysqli_num_rows($data)>0)
    {
    while($row=mysqli_fetch_array($data))
        { ?>
            <tr>
                <td><?php echo $row['Dept_ID']; ?></td>
                <td><?php echo $row['Dept_name']; ?></td>
                <td><?php echo $row['Dept_phno']; ?></td>
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
    $Dept_ID = $_POST['Dept_ID'];
    $Dept_name= $_POST['Dept_name'];
    $Dept_phno = $_POST['Dept_phno'];
    
    if($Dept_ID!=""||$Dept_name!=""||$Dept_phno!="")
      {
      $query="select * from department where Dept_ID='$Dept_ID' or Dept_name='$Dept_name' or Dept_phno='$Dept_phno'";
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
    }
    ?>
   </div>
 </body>
</html>