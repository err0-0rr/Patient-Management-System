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
         <li><a href="../index.html">Home</a></li>
         <li class="services">
           <a href="admin_patient_details.html">Patient</a>
           <!-- DROPDOWN MENU -->
           <ul class="dropdown">
             <li><a href="admin_patient_details.html">Details </a></li>
             <li><a href="admin_patient_prescriptions.html">Prescriptions</a></li>
             <li><a href="admin_patient_bills.html">Bills</a></li>
           </ul>
           <li class="services">
            <a href="admin_doctor_details.html">Doctor</a>
            <!-- DROPDOWN MENU -->
            <ul class="dropdown">
              <li><a href="admin_patient_details.html">Details </a></li>
              <li><a href="admin_doctor_patientscured.html">Patients Cured</a></li>
            </ul>
            <li class="services">
            <a href="admin_records_deaths.html">Records</a>
            <!-- DROPDOWN MENU -->
            <ul class="dropdown">
              <li><a href="admin_records_deaths.html">Deaths </a></li>
              <li><a href="admin_records_disease.html">Diseases</a></li>
            </ul>
            <li><a href="admin_contact.html">Contact</a></li>
         </li>
     </ul>
   </nav><br>
   <div class="form-container" >
       <h3>Patients Details</h3><br>
    <form action="patient_details.php" method="POST">
      <label for="id">Patient id:</label>
      <input type="text" id="id" name="p_id" ><br>
      <label for="Rname">Name</label>
      <input type="text" id="name" name="p_name" ><br>
      <input type="submit" name="submit">
    </form> 
   </div>
   <table> 
       <tr>
           <th>ID</th>
           <th>Name</th>
           <th>ph_no</th>
           <th>city</th>
       </tr>
        <?php 
    $conn=mysqli_connect('localhost', 'root', '', 'login_register');
    if(!isset($_POST['submit']))
    {
      $query="select * from admin_patient";
    $data =mysqli_query($conn, $query);
    if (mysqli_num_rows($data)>0){
    while($row=mysqli_fetch_array($data))
        {?>
            <tr>
                <td><?php echo $row['p_id']; ?></td>
                <td><?php echo $row['p_name']; ?></td>
                <td><?php echo $row['presc_id']; ?></td>
                <td><?php echo $row['token']; ?></td>
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
  $p_id = $_POST['p_id'];
  $p_name = $_POST['p_name'];
  
  if($p_id!=""||$p_name!="")
  {
    $query="select * from admin_patient where p_id='$p_id' or p_name='$p_name' ";
    $data =mysqli_query($conn, $query);
    if (mysqli_num_rows($data)>0){
    while($row=mysqli_fetch_array($data))
        {?>
            <tr>
                <td><?php echo $row['p_id']; ?></td>
                <td><?php echo $row['p_name']; ?></td>
                <td><?php echo $row['presc_id']; ?></td>
                <td><?php echo $row['token']; ?></td>
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
    }
    ?>
   </table>
 </body>
</html>