<?php
include 'config.php';

error_reporting(0);

if (isset($_POST['submit'])) {
	$usertype = $_POST['usertype'];
	$username = $_POST['username'];
	$password = ($_POST['password']);
	$cpassword = ($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (usertype, username, password)
					VALUES ('$usertype', '$username', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('User Registration Completed ')</script>";
				$username = "";
				$usertype = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Something Went Wrong ')</script>";
			}
		} else {
			echo "<script>alert('Email Already Exists ')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched ')</script>";
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<title>Register</title>

</head>
<body>
	<div class="container" id="container">
        <form method="POST" action="#">
		<div class="form-container log-in-container forms">
			<h1 style="color:black;">Register</h1>
			<input id="usertype" type="text" placeholder="User Type" name ="usertype" value="<?php echo $usertype; ?>" required>
			<input id="username" type="text" placeholder="User Name" name ="username" value="<?php echo $username; ?>" required>
			<input id="password" type="password" placeholder="Password" name ="password" value="<?php echo $_POST['password'] ?>" required>
			<input id="password" type="password" placeholder="Confirm Password" name ="cpassword" value="<?php echo$_POST['cpassword'] ?>" required><br>
			<button  name="submit" class="btn">Register</button>
			<p>Have an account?<br><a href="login.php"><b>Login Here<b></a></p>
        </form> 
        </div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<h1 style="color:black;">User Type</h1><br>
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