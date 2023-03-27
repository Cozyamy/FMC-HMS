<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

$did=intval($_GET['id']);// get doctor id
if(isset($_POST['submit']))
{
	$docspecialization=$_POST['Doctorspecialization'];
$docname=$_POST['docname'];
$docaddress=$_POST['clinicaddress'];
$docfees=$_POST['docfees'];
$doccontactno=$_POST['doccontact'];
$docemail=$_POST['docemail'];
$sql=mysqli_query($con,"Update doctors set specilization='$docspecialization',doctorName='$docname',address='$docaddress',docFees='$docfees',contactno='$doccontactno',docEmail='$docemail' where id='$did'");
if($sql)
{
$msg="Doctor Details updated Successfully";

}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/svg" sizes="32x32" href="../../images/logo.svg">
	<link rel="stylesheet" type="text/css" href="../../styles/style.css">
	<title>Admin | Edit Doctor Details</title>
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
		<h1>ADMIN | EDIT DOCTOR DETAILS</h1>
		<p style="color: green; font-size:18px;"><?php if($msg) { echo htmlentities($msg);}?></p>
		<article>
			<?php $sql=mysqli_query($con,"select * from doctors where id='$did'");
			while($data=mysqli_fetch_array($sql))
				{
				?>
				<h4><?php echo htmlentities($data['doctorName']);?>'s Profile</h4>
				<p><b>Profile Reg. Date: </b><?php echo htmlentities($data['creationDate']);?></p>
				<?php if($data['updationDate']){?>
					<p><b>Profile Last Updation Date: </b><?php echo htmlentities($data['updationDate']);?></p>
				<?php } ?>
		</article>	
		<section>
			<fieldset class="DashboardMain-fieldset" style="width: 100%; border-radius: 20px; border: 1px solid #BFBFBF; border-radius: 24px; padding: 7%;">
				<form class="SignupForm" role="form" name="adddoc" method="post" onSubmit="return valid();">
					<label for="DoctorSpecialization">Doctor Specialization</label>
					<select name="Doctorspecialization" required="required" class="options">
						<option value="<?php echo htmlentities($data['specilization']);?>">
							<?php echo htmlentities($data['specilization']);?></option>
							<?php $ret=mysqli_query($con,"select * from doctorspecilization");
							while($row=mysqli_fetch_array($ret))
								{
								?>
						<option value="<?php echo htmlentities($row['specilization']);?>">
							<?php echo htmlentities($row['specilization']);?>
						</option>
							<?php } ?>
					</select>
					<label for="doctorname">Doctor Name</label>
					<input type="text" name="docname" value="<?php echo htmlentities($data['doctorName']);?>" >
					<label for="fess">Doctor Consultancy Fees</label>
					<input type="text" name="docfees" required="required"  value="<?php echo htmlentities($data['docFees']);?>" >
					<label for="fess">Doctor Contact no</label>
					<input type="text" name="doccontact" required="required"  value="<?php echo htmlentities($data['contactno']);?>">
					<label for="fess">Doctor Email</label>
					<input type="email" name="docemail"  readonly="readonly"  value="<?php echo htmlentities($data['docEmail']);?>"><?php } ?>
					<button type="submit" id="submit" name="submit" class="updatebtn">Update</button>
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
<?php } ?>
