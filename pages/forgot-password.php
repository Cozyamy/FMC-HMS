<?php
session_start();
error_reporting(0);
include("include/config.php");
//Checking Details for reset password
if(isset($_POST['submit'])){
$name=$_POST['fullname'];
$email=$_POST['email'];
$query=mysqli_query($con,"select id from  users where fullName='$name' and email='$email'");
$row=mysqli_num_rows($query);
if($row>0){

$_SESSION['name']=$name;
$_SESSION['email']=$email;
header('location:reset-password.php');
} else {
echo "<script>alert('Invalid details. Please try with valid details');</script>";
echo "<script>window.location.href ='forgot-password.php'</script>";


}

}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="icon" type="image/svg" sizes="32x32" href="../images/logo.svg">
		<link rel="stylesheet" type="text/css" href="../styles/style.css">
		<title>Patient  Password Recovery</title>
	</head>
	<body>
	<main class="Signup-main">
		<section class="Signup-header">
			<h1>Patient Password Recovery</h1>
			<p>Please enter your Email and password to recover your password.</p>
		</section>
		<fieldset class="Signup-fieldset">
			<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
			<form class="SignupForm" method="post">
				<label for="fullname">Full Name</label>
				<input type="text" name="fullname" placeholder="Enter registered full name" required>
				<label for="email">Email Address</label>
				<input type="text" name="email" placeholder="Enter your registered email address" required>
				<button type="submit" name="submit" class="SignupButton">Reset</button>
				<p>Already have an Account? <a href="patientlogin.php">Login</a></p>
				<a class="backHome" href="../index.php">&#8656 Back to home</a>
			</form>
		</fieldset>
	</main>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
	
	</body>
</html>