<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
date_default_timezone_set('Africa/Lagos');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['submit']))
{
$sql=mysqli_query($con,"SELECT password FROM  users where password='".md5($_POST['cpass'])."' && id='".$_SESSION['id']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($con,"update users set password='".md5($_POST['npass'])."', updationDate='$currentTime' where id='".$_SESSION['id']."'");
$_SESSION['msg1']="Password Changed Successfully !!";
{
	echo "<script>alert('Password Changed Successfully !!');</script>";
	header('location:dashboard.php');
}
}
else
{
$_SESSION['msg1']="Old Password not match !!";
{
	echo "<script>alert('Old Password not match !!');</script>";
	header('change-password.php');
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/svg" sizes="32x32" href="../images/logo.svg">
	<link rel="stylesheet" type="text/css" href="../styles/style.css">
	<title>User  | change Password</title>
	<script type="text/javascript">
		function valid()
		{
			if(document.chngpwd.cpass.value=="")
			{
				alert("Current Password Field is Empty !!");
				document.chngpwd.cpass.focus();
				return false;
			}
			else if(document.chngpwd.npass.value=="")
			{
				alert("New Password Field is Empty !!");
				document.chngpwd.npass.focus();
				return false;
			}
			else if(document.chngpwd.cfpass.value=="")
				{
					alert("Confirm Password Field is Empty !!");
					document.chngpwd.cfpass.focus();
					return false;
				}
				else if(document.chngpwd.npass.value!= document.chngpwd.cfpass.value)
					{
						alert("Password and Confirm Password Field do not match  !!");
						document.chngpwd.cfpass.focus();
						return false;
					}
					return true;
		}
	</script>

	</head>
<body>
	<header>
		<div class="NavigationDash">
			<div style="display: flex; flex-direction: row; gap: 20px; align-items: center;">
				<div id="menuToggle">
					<input type="checkbox" />
					<span></span>
					<span></span>
					<span></span>
					<ul id="menu">
						<li>
							<a href="dashboard.php">Dashboard</a>
						</li>
						<li>
							<a href="book-appointment.php">Book Appointment</a>
						</li>
						<li>
							<a href="appointment-history.php">Appointment History</a>
						</li>
						<li>
							<a href="manage-medhistory.php">Medical History</a>
						</li>
					</ul>
				</div>
				<a class="logonav" href="dashboard.php">
					<img src="../images/logo.svg">
				</a>
			</div>
			<p class="DashTag">FMC Umuahia</p>
			<div class="userNav">
				<img src="../images/usericon.svg">
				<p><span class="username">
					<?php $query=mysqli_query($con,"select fullName from users where id='".$_SESSION['id']."'");
					while($row=mysqli_fetch_array($query))
					{
						echo $row['fullName'];
					}
					?>
						
				</span></p>
				<div class="dropdown">
					<img src="../images/downicon.svg" class="dropbtn">
					<ul class="dropdown-content">
						<li>
							<a href="edit-profile.php">My Profile</a>
						</li>
						<li>
							<a href="change-password.php">Change Password</a>
						</li>
						<li>
							<a href="logout.php">Log Out</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<section class="DashboardContainer">
	<aside class="PatientAside">
		<div>
			<a href="dashboard.php">Dashboard</a>
			<a href="book-appointment.php">Book Appointment</a>
			<a href="appointment-history.php">Appointment History</a>
			<a href="manage-medhistory.php">Medical History</a>
		</div>
	</aside>
	<main class="DashboardMain">
		<div class="NavUserMenu">
				<img src="../images/usericon.svg">
				<p><span class="username">
					<?php $query=mysqli_query($con,"select fullName from users where id='".$_SESSION['id']."'");
					while($row=mysqli_fetch_array($query))
					{
						echo $row['fullName'];
					}
					?>
						
				</span></p>
				<div class="dropdown">
					<img src="../images/downicon.svg" class="dropbtn">
					<ul class="dropdown-content">
						<li>
							<a href="edit-profile.php">My Profile</a>
						</li>
						<li>
							<a href="change-password.php">Change Password</a>
						</li>
						<li>
							<a href="logout.php">Log Out</a>
						</li>
					</ul>
				</div>
			</div>
		<h1>USER CHANGE PASSWORD</h1>
		<h5 style="color: green; font-size:18px; ">
			<?php if($msg) { echo htmlentities($msg);}?> 
		</h5>
		<section>
		<fieldset class="DashboardMain-fieldset" style="width: 100%; border-radius: 20px; border: 1px solid #BFBFBF; border-radius: 24px; padding: 7%;">
			<form class="SignupForm" role="form" name="chngpwd" method="post" onSubmit="return valid();">
				<label for="exampleInputEmail1">Current Password</label>
				<input type="password" name="cpass" placeholder="Enter Current Password" class="InputPassword">
				<label for="exampleInputPassword1">New Password</label>
				<input type="password" name="npass" placeholder="New Password" class="InputPassword">
				<label for="exampleInputPassword1">Confirm Password</label>
				<input type="password" name="cfpass" placeholder="Confirm Password" class="InputPassword">
				<button type="submit" id="submit" name="submit" class="updatebtn">Submit</button>
			</form>
		</fieldset>
	</section>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
	</body>
</html>
