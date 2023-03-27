
<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
$puname=$_POST['email'];	
$ppwd=md5($_POST['password']);
$ret=mysqli_query($con,"SELECT * FROM users WHERE email='$puname' and password='$ppwd'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['id'];
$pid=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
// For stroing log if user login successfull
$log=mysqli_query($con,"insert into userlog(uid,username,userip,status) values('$pid','$puname','$uip','$status')");
header("location:dashboard.php");
}
else
{
// For stroing log if user login unsuccessfull
$_SESSION['login']=$_POST['email'];	
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
mysqli_query($con,"insert into userlog(username,userip,status) values('$puname','$uip','$status')");
$_SESSION['errmsg']="Invalid username or password";

header("location:patientlogin.php");
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
	<link rel="icon" type="image/svg" sizes="32x32" href="../images/logo.svg">
	<link rel="stylesheet" type="text/css" href="../styles/style.css">
	<title>FMC Login</title>
</head>
<body>

	<main class="Signup-main">
		<section class="Signup-header">
			<h1>Welcome Back</h1>
			<p>Please enter your login details below</p>
		</section>
		<fieldset class="Signup-fieldset">
			<div class="Signup-toggle">
				<a href="patientlogin.php" class="patientSignup">Patient Login</a>
				<a href="admin/adminlogin.php" class="adminLogin">Admin Login</a>
				<a href="doctor/doctorlogin.php" class="doctorSignup">Doctor Login</a>
			</div>
			<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
			<form class="SignupForm" method="post">
				<label>Email Address</label>
				<input type="text" name="email" placeholder="Enter your email address" required>
				<label>Password</label>
				<input type="password" name="password" placeholder="Enter your Password" class="InputPassword" required>
				<button type="submit" name="submit" class="SignupButton">Sign In</button>
				<p>Don't have an Account? <a href="patientsignup.php">Sign Up</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="forgot-password.php">Forgot Password</a></p>
				<a class="backHome" href="../index.php">&#8656 Back to home</a>
			</form>
		</fieldset>
	</main>


<script>
	jQuery(document).ready(function() {
		Main.init();
		Login.init();
	});
/</script>
</body>
</html>