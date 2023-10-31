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
   <title>Medical_rec</title>
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
    <h3>Patient's Medical Records</h3><br>  
    <form action="doctor_medical_rec.php" method="POST">
        <label for="P_ID">Patient ID: </label>
        <input type="text" id="P_ID" name="P_ID" value=""><br>
        <label for="Status">Status : </label>
        <input type="text" id="Status" name="Status" value=""><br>
        <label for="Disease">Diseases : </label>
        <input type="text" id="Disease" name="Disease" value=""><br>
        <label for="Surgery">Surgery : </label>
        <input type="text" id="Surgery" name="Surgery" value=""><br><br>
        <input  name="submit" type="submit" class="btn">
    </form> 
   </div>
   <table class="table_content"> 
       <tr>
           <th>Patient ID</th>
           <th>Surgery</th>
           <th>Disease</th>
           <th>Status</th>
       </tr>
       <?php 
  if(!isset($_POST['submit']))
  {
      $query="select * from medical_history";
    $data =mysqli_query($conn, $query);
    if (mysqli_num_rows($data)>0)
    {
    while($row=mysqli_fetch_array($data))
        { ?>
            <tr>
                <td><?php echo $row['P_ID']; ?></td>
                <td><?php echo $row['Surgery']; ?></td>
                <td><?php echo $row['Disease']; ?></td>
                <td><?php echo $row['Status']; ?></td>
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
    $P_ID = $_POST['P_ID'];
    $Surgery= $_POST['Surgery'];
    $Disease = $_POST['Disease'];
    $Status = $_POST['Status'];
    
    if($P_ID!=""||$Surgery!=""||$Disease!=""||$Status!="")
      {
      $query="select * from medical_history where P_ID='$P_ID' or Surgery='$Surgery' or Disease='$Disease' or Status='$Status'";
      $data =mysqli_query($conn,$query);
        if (mysqli_num_rows($data)>0)
        {
          while($row=mysqli_fetch_array($data))
            {?>
              <tr>
                  <td><?php echo $row['P_ID']; ?></td>
                  <td><?php echo $row['Surgery']; ?></td>
                  <td><?php echo $row['Disease']; ?></td>
                  <td><?php echo $row['Status']; ?></td>
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