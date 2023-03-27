<?php
session_start();
error_reporting(0);
include("include/config.php");
// Code for updating Password
if(isset($_POST['change']))
{
$cno=$_SESSION['cnumber'];
$email=$_SESSION['email'];
$newpassword=md5($_POST['password']);
$query=mysqli_query($con,"update doctors set password='$newpassword' where contactno='$cno' and docEmail='$email'");
if ($query) {
echo "<script>alert('Password successfully updated.');</script>";
echo "<script>window.location.href ='doctorlogin.php'</script>";
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
		<link rel="icon" type="image/svg" sizes="32x32" href="../../images/logo.svg">
		<link rel="stylesheet" type="text/css" href="../../styles/style.css">
		<title>Password Reset</title>
		<script type="text/javascript">
			function valid()
			{
				if(document.passwordreset.password.value!= document.passwordreset.password_again.value)
					{
						alert("Password and Confirm Password Field do not match  !!");
						document.passwordreset.password_again.focus();
						return false;
					}
					return true;
				}
		</script>
	</head>
	<body>
	<main class="Signup-main">
		<section class="Signup-header">
			<h1>Patient Reset Password</h1>
			<p>Please set your new password.</p>
		</section>
		<fieldset class="Signup-fieldset">
			<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
			<form class="SignupForm" name="passwordreset" method="post" onSubmit="return valid();">
				<label for="password">Password</label>
				<input type="password" id="password" name="password" placeholder="Password" required>
				<label for="password_again">Confirm Password</label>
				<input type="password" id="password_again" name="password_again" placeholder="Password Again" required>
				<button type="submit" name="change" class="SignupButton">Change</button>
				<p>Already have an Account? <a href="doctorlogin.php">Login</a></p>
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