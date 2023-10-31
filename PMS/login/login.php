<?php 

include 'config.php';

error_reporting(0);

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = ($_POST['password']);

	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_array($result);

		if($row["usertype"] =="admin" || $row["usertype"] == "Admin")
		{
			header("Location: ../admin/admin_home.php");
		}
		elseif($row["usertype"] =="doctor" || $row["usertype"] == "Doctor")
		{
			header("Location: ../doctor/doctor_home.php");
		}
		elseif($row["usertype"] =="patient" || $row["usertype"] == "Patient")
		{
			header("Location: ../patient/patient_home.php");
		}
			
	} else {
		echo "<script>alert('Username or Password is Wrong.')</script>";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<title>Login</title>

</head>
<body>
	<div class="container" id="container">
		<div class="form-container log-in-container forms">
			<h1>Login</h1>
			<form action="#" method="POST">
			<input id="username" type="username" placeholder="User Name" name ="username" value="<?php echo $username; ?>" required>
			<input id="password" type="password" placeholder="Password" name ="password" value="<?php echo $_POST['password'] ?>" required>
			<button  name="submit">Log In</button>
			<p>Don't have an account?<br><a class="login-register" href="register.php"><b>Register Here<b></a></p>
			</form>
	</div>
	<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<div class="d-flex align-items-center"> 
						<a href="#" class="box me-2 selection"><i class="material-icons" style="font-size:36px;">supervisor_account</i>
						<p class="profile">Admin</p>
					</a> <a href="#" class="box me-2"><i class="material-icons" style="font-size:36px;">account_circle</i>
						<p class="profile">Patient</p>
					</a> <a href="#" class="box"><i class="material-icons" style="font-size:36px;">local_hospital</i>
						<p class="profile">Doctor</p>
					</a> </div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>