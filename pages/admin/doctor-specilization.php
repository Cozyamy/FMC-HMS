<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

if(isset($_POST['submit']))
{
$doctorspecilization=$_POST['doctorspecilization'];
$sql=mysqli_query($con,"insert into doctorSpecilization(specilization) values('$doctorspecilization')");
$_SESSION['msg']="Doctor Specialization added successfully !!";
}
//Code Deletion
if(isset($_GET['del']))
{
$sid=$_GET['id'];	
mysqli_query($con,"delete from doctorSpecilization where id = '$sid'");
$_SESSION['msg']="data deleted !!";
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/svg" sizes="32x32" href="../../images/logo.svg">
	<link rel="stylesheet" type="text/css" href="../../styles/style.css">
	<title>Admin | Doctor Specialization</title>
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
		<h1>ADMIN DOCTOR SPECIALIZATION</h1>
		<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
		<?php echo htmlentities($_SESSION['msg']="");?></p>
		<section>
			<fieldset class="DashboardMain-fieldset" style="width: 100%; border-radius: 20px; border: 1px solid #BFBFBF; border-radius: 24px; padding: 7%;">
				<form class="SignupForm" role="form" name="dcotorspcl" method="post">
					<label for="exampleInputEmail1">Doctor Specialization</label>
					<input type="text" name="doctorspecilization" placeholder="Enter Doctor Specialization">
					<button type="submit" id="submit" name="submit" class="updatebtn">Submit</button>
				</form>
			</fieldset>
		</section>
		<h2 style="margin: 10px 0; padding: 20px; color: #212529;">Manage Docter Specialization</h2>
		<section>
			<div style="overflow-x:auto; table-layout: fixed; width: 100%;">
			<table class="table table-hover" id="sample-table-1">
				<thead>
					<tr>
						<th class="center">#</th>
						<th>Specialization</th>
						<th class="hidden-xs">Creation Date</th>
						<th>Updation Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql=mysqli_query($con,"select * from doctorSpecilization");
					$cnt=1;
					while($row=mysqli_fetch_array($sql))
						{
						?>
						<tr>
							<td class="center"><?php echo $cnt;?>.</td>
							<td class="hidden-xs"><?php echo $row['specilization'];?></td>
							<td><?php echo $row['creationDate'];?></td>
							<td><?php echo $row['updationDate'];?></td>
							<td >
								<div style="display: flex; flex-direction: row;">
								<a href="edit-doctor-specialization.php?id=<?php echo $row['id'];?>" tooltip-placement="top" tooltip="Edit">
									<p class="pencil"></p>
								</a>
								<a href="doctor-specilization.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" tooltip-placement="top" tooltip="Remove" class="cancel">
									<p class="cancel"></p>
								</a>
								</div>
								<?php
								$cnt=$cnt+1;
							}?>
						</td>
					</tr>
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
