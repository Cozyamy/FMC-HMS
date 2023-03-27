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
		<title>Admin | Dashboard FMC Umuahia</title>
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
							<a href="doctors.php">Doctors</a>
						</li>
						<li>
							<a href="manage-users.php">Users</a>
						</li>
						<li>
							<a href="manage-patients.php">Patients</a>
						</li>
						<li>
							<a href="appointment-history.php">Appointment History</a>
						</li>
						<li>
							<a href="contactus-queries.php">Contact-Us Queries</a>
						</li>
						<li>
							<a href="doctor-logs.php">Doctor Session Logs</a>
						</li>
						<li>
							<a href="user-logs.php">User Session Logs</a>
						</li>
						<li>
							<a href="between-dates-reports.php">Reports</a>
						</li>
						<li>
							<a href="patient-search.php">Patient Search</a>
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
				<p>Admin</p>
				<div class="dropdown">
					<img src="../../images/downicon.svg" class="dropbtn">
					<ul class="dropdown-content">
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
			<a href="doctors.php">Doctors</a>
			<a href="manage-users.php">Users</a>
			<a href="manage-patient.php">Patients</a>
			<a href="appointment-history.php">Appointment History</a>
			<a href="contactus-queries.php">Contact-Us Queries</a>
			<a href="doctor-logs.php">Doctor Session Logs</a>
			<a href="user-logs.php">User Session Logs</a>
			<a href="between-dates-reports.php">Reports</a>
			<a href="patient-search.php">Patient Search</a>
		</div>
	</aside>
	<main class="DashboardMain">
		<div class="NavUserMenu">
				<img src="../../images/usericon.svg">
				<p>Admin</p>
				<div class="dropdown">
					<img src="../../images/downicon.svg" class="dropbtn">
					<ul class="dropdown-content">
						<li>
							<a href="change-password.php">Change Password</a>
						</li>
						<li>
							<a href="logout.php">Log Out</a>
						</li>
					</ul>
				</div>
			</div>
		<h1>ADMIN DASHBOARD</h1>
		<section class="section-div">
			<div>
				<h2>Manage Users</h2>
				<a href="manage-users.php">
					<?php $result = mysqli_query($con,"SELECT * FROM users ");
					$num_rows = mysqli_num_rows($result);
					{
						?>
						Total Users :<?php echo htmlentities($num_rows);  
					} 
				?>
				</a>
			</div>
			<div>
				<h2>Manage Doctors</h2>
				<a href="manage-doctors.php">
					<?php $result1 = mysqli_query($con,"SELECT * FROM doctors ");
					$num_rows1 = mysqli_num_rows($result1);
					{
						?>
						Total Doctors :<?php echo htmlentities($num_rows1);  
					} 
					?>
				</a>
			</div>
			<div>
				<h2>Appointments</h2>
				<a href="appointment-history.php">
					<?php $sql= mysqli_query($con,"SELECT * FROM appointment");
					$num_rows2 = mysqli_num_rows($sql);
					{
						?>
						Total Appointments :<?php echo htmlentities($num_rows2);
					}
					?>
				</a>
			</div>
		</section>
		<section class="section-div">
			<div>
				<h2>Manage Patients</h2>
				<a href="manage-patient.php">
					<?php $result = mysqli_query($con,"SELECT * FROM tblpatient ");
					$num_rows = mysqli_num_rows($result);
					{
						?>
						Total Patients :<?php echo htmlentities($num_rows);  
					}
					?>
				</a>
			</div>
			<div>
				<h2>New Queries</h2>
				<a href="unread-queries.php">
					<?php
					$sql= mysqli_query($con,"SELECT * FROM tblcontactus where  IsRead is null");
					$num_rows22 = mysqli_num_rows($sql);
					?>
					Total New Queries :<?php echo htmlentities($num_rows22);
					?>
				</a>
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
