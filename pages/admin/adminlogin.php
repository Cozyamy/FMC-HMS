<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
$uname=$_POST['username'];
$upassword=$_POST['password'];

$ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$uname' and password='$upassword'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
header("location:dashboard.php");

}
else
{
$_SESSION['errmsg']="Invalid username or password";

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
	<title>Admin Login</title>
</head>
<body>

	<main class="Signup-main">
		<section class="Signup-header">
			<h1>Welcome Back</h1>
			<p>Please enter your login details below<br />
				<span style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
			</p>
		</section>
		<fieldset class="Signup-fieldset">
			<div class="Signup-toggle">
				<a href="../patientlogin.php" class="patientSignups">Patient Login</a>
				<a href="adminlogin.php" class="adminLogins">Admin Login</a>
				<a href="../doctor/doctorlogin.php" class="doctorSignup">Doctor Login</a>
			</div>
			<form class="SignupForm" method="post">
				<label for="username">Email Address</label>
				<input type="text" name="username" placeholder="Enter your email address">
				<label for="password">Password</label>
				<input type="password" name="password" placeholder="Enter your Password" class="InputPassword">
				<button type="submit" name="submit" class="SignupButton">Sign In</button>
				<a class="backHome" href="../../index.php">&#8656 Back to home</a>
			</form>
		</fieldset>
	</main>

</body>
</html>