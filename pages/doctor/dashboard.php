<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/svg" sizes="32x32" href="../../images/logo.svg">
	<link rel="stylesheet" type="text/css" href="../../styles/style.css">
		<title>Doctor | Dashboard FMC Umuahia</title>
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
							<a href="appointment-history.php">Appointment History</a>
						</li>
						<li>
							<a href="patients.php">Patients</a>
						</li>

						<li>
							<a href="search.php">Search</a>
						</li>
					</ul>
				</div>
				<a class="logonav" href="dashboard.php">
					<img src="../../images/logo.svg">
				</a>
			</div>
			<p class="DashTag">FMC Umuahia</p>
			<div class="userNav">
				<img src="../../images/usericon.svg">
				<p><span class="username">
					<?php $query=mysqli_query($con,"select doctorName from doctors where id='".$_SESSION['id']."'");
					while($row=mysqli_fetch_array($query))
					{
						echo $row['doctorName'];
					}
					?>
						
				</span></p>
				<div class="dropdown">
					<img src="../../images/downicon.svg" class="dropbtn">
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
			<a href="appointment-history.php">Appointment History</a>
			<a href="patients.php">Patients</a>
			<a href="search.php">Search</a>
		</div>
	</aside>
	<main class="DashboardMain">
		<div class="NavUserMenu">
				<img src="../../images/usericon.svg">
				<p><span class="username">
					<?php $query=mysqli_query($con,"select doctorName from doctors where id='".$_SESSION['id']."'");
					while($row=mysqli_fetch_array($query))
					{
						echo $row['doctorName'];
					}
					?>
						
				</span></p>
				<div class="dropdown">
					<img src="../../images/downicon.svg" class="dropbtn">
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
		<h1>DOCTOR DASHBOARD</h1>
		<section class="section-div">
			<div>
				<h2>My Profile</h2>
				<a href="edit-profile.php">Update Profile</a>
			</div>
			<div>
				<h2>My Appointments</h2>
				<a href="appointment-history.php">View Appointment History</a>
			</div>
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
<?php } ?>
