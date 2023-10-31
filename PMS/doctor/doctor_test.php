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
   <title>Tests</title>
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
    <h3>Test List</h3><br>  
    <form action="doctor_test.php" method="POST">
        <label for="Token">Appointment id : </label>
        <input type="text" id="Token" name="Token" value=""><br>
        <label for="T_name">Test's Name : </label>
        <input type="text" id="T_name" name="T_name" value=""><br>
        <label for="T_date">Date : </label>
        <input type="text" id="T_date" name="T_date" value=""><br>
        <label for="F_name">Patient Name : </label>
        <input type="text" id="F_name" name="F_name" value=""><br>
        <label for="P_ID">Patient id : </label>
        <input type="text" id="P_ID" name="P_ID" value=""><br><br>
        <input  name="submit" type="submit" class="btn">
    </form> 
   </div>
   <table class="table_content"> 
       <tr>
           <th>Test no.</th>
           <th>Appointment id</th>
           <th>Date</th>
           <th>Test name</th>
       </tr>
       <?php 
  if(!isset($_POST['submit']))
  {
      $query="select * from test natural join test_name";
    $data =mysqli_query($conn, $query);
    if (mysqli_num_rows($data)>0)
    {
    while($row=mysqli_fetch_array($data))
        { ?>
            <tr>
                <td><?php echo $row['T_no']; ?></td>
                <td><?php echo $row['Token']; ?></td>
                <td><?php echo $row['T_date']; ?></td>
                <td><?php echo $row['T_name']; ?></td>
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
    $Token = $_POST['Token'];
    $T_name= $_POST['T_name'];
    $T_date = $_POST['T_date'];
    $F_name = $_POST['F_name'];
    $P_ID = $_POST['P_ID'];
    
    if($Token!=""||$T_name!=""||$T_date!=""||$F_name!=""||$P_ID!="")
      {
      $query="select * from test natural join test_name where (T_no in (select T_no from test where Token='$Token')) or
      T_name='$T_name' or T_date-'$T_date' or
       (Token in (select Token from appointment where P_ID in (select P_ID from patient where F_name='$F_name')))
      or (Token in (select Token from appointment where P_ID='$P_ID'))  ";
      $data =mysqli_query($conn,$query);
        if (mysqli_num_rows($data)>0)
        {
          while($row=mysqli_fetch_array($data))
            {?>
              <tr>
                <td><?php echo $row['T_no']; ?></td>
                <td><?php echo $row['Token']; ?></td>
                <td><?php echo $row['T_date']; ?></td>
                <td><?php echo $row['T_name']; ?></td>
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