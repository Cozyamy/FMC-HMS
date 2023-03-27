<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/svg" sizes="32x32" href="../images/logo.svg">
	<link rel="stylesheet" type="text/css" href="../styles/style.css">
		<title>Users | View Medical History</title>
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
				<h1>Users | View Medical History</h1>
				<section class="dashboard-section">
					<div style="overflow-x:auto; table-layout: fixed; width: 100%;">
					<table class="table table-hover" id="sample-table-1">
						<thead>
							<tr>
								<th class="center">#</th>
								<th>Patient Name</th>
								<th>Patient Contact Number</th>
								<th>Patient Gender </th>
								<th>Creation Date </th>
								<th>Updation Date </th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$uid=$_SESSION['id'];
							$sql=mysqli_query($con,"select tblpatient.* from tblpatient join users on users.email=tblpatient.PatientEmail where users.id='$uid'");
							$cnt=1;
							while($row=mysqli_fetch_array($sql))
								{
								?>
								<tr>
									<td class="center"><?php echo $cnt;?>.</td>
									<td class="hidden-xs"><?php echo $row['PatientName'];?></td>
									<td><?php echo $row['PatientContno'];?></td>
									<td><?php echo $row['PatientGender'];?></td>
									<td><?php echo $row['CreationDate'];?></td>
									<td><?php echo $row['UpdationDate'];?></td>
									<td>
										<a href="view-medhistory.php?viewid=<?php echo $row['ID'];?>"><i class="fa fa-eye"></i></a>
									</td>
									</tr>
							<?php 
							$cnt=$cnt+1;
						}?></tbody>
					</table>
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
