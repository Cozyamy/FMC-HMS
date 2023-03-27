<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
	$fname=$_POST['fname'];
$address=$_POST['address'];
$city=$_POST['city'];
$gender=$_POST['gender'];

$sql=mysqli_query($con,"Update users set fullName='$fname',address='$address',city='$city',gender='$gender' where id='".$_SESSION['id']."'");
if($sql)
{
$msg="Your Profile updated Successfully";


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
	<title>User | Edit Profile</title>
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
		<h1>USER EDIT PROFILE</h1>
		<h5 style="color: green; font-size:18px; ">
			<?php if($msg) { echo htmlentities($msg);}?> 
		</h5>
		<article>
			<?php 
			$sql=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
			while($data=mysqli_fetch_array($sql))
				{?>
					<h4><?php echo htmlentities($data['fullName']);?>'s Profile</h4>
					<br>
					<p><b>Profile Reg. Date: </b><?php echo htmlentities($data['regDate']);?></p>
					<?php if($data['updationDate']){?>
						<p><b>Profile Last Updation Date: </b><?php echo htmlentities($data['updationDate']);?></p>
						<?php } ?>
		</article>
		<section>										
			<fieldset class="DashboardMain-fieldset" style="width: 100%; border-radius: 20px; border: 1px solid #BFBFBF; border-radius: 24px; padding: 7%;">
				<h4 style="color: #212529; font-weight: 400; margin-bottom:40px;">EDIT PROFILE</h4>
			<form class="SignupForm" role="form" name="edit" method="post">
				<label for="fname">Full Name</label>
				<input type="text" name="fname" value="<?php echo htmlentities($data['fullName']);?>">
				<label for="address">Address</label>
				<input type="text" name="address" value="<?php echo htmlentities($data['address']);?>">
				<label for="city">City</label>
				<input type="text" name="city" required="required"  value="<?php echo htmlentities($data['city']);?>">
				<legend>
					<label style="margin-bottom: 30px;" for="gender">Gender</label>
					<select name="gender" class="form-control" required="required" >
						<option value="<?php echo htmlentities($data['gender']);?>"><?php echo htmlentities($data['gender']);?></option>
						<option value="male">Male</option>
						<option value="female">Female</option>
						<option value="other">Other</option>
					</select>
				</legend>
				<label for="fess">Email Address</label>
				<input type="text" name="uemail" readonly="readonly"  value="<?php echo htmlentities($data['email']);?>">
				<a href="change-emaild.php">Update your email id</a>
				<button type="submit" id="submit" name="submit" class="updatebtn">Update</button>
			</form>
		</fieldset>
		<?php } ?>
		</section>
	</main>
</section>

		
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
	</body>
</html>