<?php
include_once('include/config.php');
if(isset($_POST['submit']))
{
$fname=$_POST['full_name'];
$address=$_POST['address'];
$city=$_POST['city'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$query=mysqli_query($con,"insert into users(fullname,address,city,gender,email,password) values('$fname','$address','$city','$gender','$email','$password')");
if($query)
{
	echo "<script>alert('Successfully Registered. You can login now');</script>";
	header('location:patientlogin.php');
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
	<title>FMC Signup</title>

	<script type="text/javascript">
		function valid()
		{
			if(document.registration.password.value!document.registration.password_again.value)
			{
				alert("Password and Confirm Password Field do not match  !!");
				document.registration.password_again.focus();
				return false;
			}
			return true;
		}
	</script>

</head>
<body>

	<main class="Signup-main">
		<section class="Signup-header">
			<h1>Create Your Account</h1>
			<p>Please enter your details to create your account</p>
		</section>
		<fieldset class="Signup-fieldset">
			<form class="SignupForm" name="registration" id="registration"  method="post" onSubmit="return valid();">
				<label for="full_name">Full Name</label>
				<input type="text" name="full_name" placeholder="Enter your full name" required>
				<label for="address">Address</label>
				<input type="text" name="address" placeholder="Enter your address" required>
				<label for="city">City</label>
				<input type="text" name="city" placeholder="Enter your city" required>
				<div>
					<legend style="margin-bottom: 30px;">Gender:</legend>
					<label for="male">Male</label>
					<input type="radio" name="gender" id="male" value="male" checked>
					<label style="margin-left: 20px;" for="female">Female</label>
					<input type="radio" name="gender" id="female" value="female">
				</div>
				<label for="email">Email Address</label>
				<input type="text" name="email" onBlur="userAvailability()" placeholder="Enter your email address" required>
				<label for="password">Password</label>
				<input type="password" name="password" placeholder="Enter your Password" class="InputPassword" required>
				<label for="password_again">Confirm Password</label>
				<input type="password" name="password_again" placeholder="Please confirm Password" class="InputPassword" required>
				<button type="submit" id="submit" name="submit" class="SignupButton">Create My Account</button>
				<p>Already have an Account? <a href="patientlogin.php">Sign in</a></p>
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
<script>
	function userAvailability() {
		$("#loaderIcon").show();
		jQuery.ajax({
			url: "check_availability.php",
			data:'email='+$("#email").val(),
			type: "POST",
			success:function(data){
				$("#user-availability-status1").html(data);
				$("#loaderIcon").hide();
			},
			error:function (){}
		});
	}
</script>
</body>
</html>