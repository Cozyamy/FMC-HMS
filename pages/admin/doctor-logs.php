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
		<title>Admin | Doctor Session Logs</title>
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
		<h1>ADMIN | DOCTOR SESSION LOGS</h1>
		<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
			<?php echo htmlentities($_SESSION['msg']="");?>
		</p>
		<section class="section-div">
			<div style="overflow-x:auto; table-layout: fixed; width: 100%;">
			<table class="table table-hover" id="sample-table-1">
				<thead>
					<tr>
						<th class="center">#</th>
						<th class="hidden-xs">User id</th>
						<th>Username</th>
						<th>User IP</th>
						<th>Login time</th>
						<th>Logout Time </th>
						<th> Status </th>
					</tr>
				</thead>
				<tbody>
				<?php
				$sql=mysqli_query($con,"select * from doctorslog ");
				$cnt=1;
				while($row=mysqli_fetch_array($sql))
				{
				?>
					<tr>
						<td class="center"><?php echo $cnt;?>.</td>
						<td class="hidden-xs"><?php echo $row['uid'];?></td>
						<td class="hidden-xs"><?php echo $row['username'];?></td>
						<td><?php echo $row['userip'];?></td>
						<td><?php echo $row['loginTime'];?></td>
						<td><?php echo $row['logout'];?></td>
						<td>
							<?php if($row['status']==1)
							{
								echo "Success";
							}
							else
							{
								echo "Failed";
							}?>
						</td>
						</tr>
						<?php 
						$cnt=$cnt+1;
					}?>
				</tbody>
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
<?php } ?>
