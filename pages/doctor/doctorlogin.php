<?php
session_start();
include("include/config.php");
error_reporting(0);
if(isset($_POST['submit']))
{
$uname=$_POST['username'];
$dpassword=md5($_POST['password']);	
$ret=mysqli_query($con,"SELECT * FROM doctors WHERE docEmail='$uname' and password='$dpassword'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$_SESSION['dlogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$uid=$num['id'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
//Code Logs
$log=mysqli_query($con,"insert into doctorslog(uid,username,userip,status) values('$uid','$uname','$uip','$status')");

header("location:dashboard.php");
}
else
{

$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
mysqli_query($con,"insert into doctorslog(username,userip,status) values('$uname','$uip','$status')");
$_SESSION['errmsg']="Invalid username or password";
header("location:doctorlogin.php");

}
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="icon" type="image/svg" sizes="32x32" href="../../images/logo.svg">
	<link rel="stylesheet" type="text/css" href="../../styles/style.css">
	<title>Doctor Login</title>
</head>
<body>
	<main class="Signup-main">
		<section class="Signup-header">
			<h1>Welcome Back</h1>
			<p>Please enter your login details below <br>
				<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
			</p>
		</section>
		<fieldset class="Signup-fieldset">
			<div class="Signup-toggle">
				<a href="../patientlogin.php" class="patientSignups">Patient Login</a>
				<a href="../admin/adminlogin.php" class="adminLogin">Admin Login</a>
				<a href="doctorlogin.php" class="doctorSignups">Doctor Login</a>
			</div>
			<form class="SignupForm" method="post">
				<label for="username">Email Address</label>
				<input type="text" name="username" placeholder="Enter your email address" required>
				<label for="password">Password</label>
				<input type="password" name="password" placeholder="Enter your Password" class="InputPassword" required>
				<button class="SignupButton" type="submit" name="submit">Sign In</button>
				<p><a href="forgot-password.php">Forgot Password</a></p>
				<a class="backHome" href="../../index.php">&#8656 Back to home</a>
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