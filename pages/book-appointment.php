<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
$specilization=$_POST['Doctorspecialization'];
$doctorid=$_POST['doctor'];
$userid=$_SESSION['id'];
$fees=$_POST['fees'];
$appdate=$_POST['appdate'];
$time=$_POST['apptime'];
$userstatus=1;
$docstatus=1;
$query=mysqli_query($con,"insert into appointment(doctorSpecialization,doctorId,userId,consultancyFees,appointmentDate,appointmentTime,userStatus,doctorStatus) values('$specilization','$doctorid','$userid','$fees','$appdate','$time','$userstatus','$docstatus')");
	if($query)
	{
		echo "<script>alert('Your appointment successfully booked');</script>";
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
	<title>User  | Book Appointment</title>

	<script>
		function getdoctor(val) {
			$.ajax({
				type: "POST",
				url: "get_doctor.php",
				data:'specilizationid='+val,
				success: function(data){
					$("#doctor").html(data);
				}
			});
		}
	</script>
	<script>
		function getfee(val) {
			$.ajax({
				type: "POST",
				url: "get_doctor.php",
				data:'doctor='+val,
				success: function(data){
					$("#fees").html(data);
				}
			});
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
		<h1>User | Book Appointment</h1>
		<h5 style="color: green; font-size:18px; ">
			<?php if($msg) { echo htmlentities($msg);}?> 
		</h5>
		<section>
			<fieldset class="DashboardMain-fieldset" style="width: 100%; border-radius: 20px; border: 1px solid #BFBFBF; border-radius: 24px; padding: 7%;">
				<h4 style="color: #212529; font-weight: 400; margin-bottom:40px;">EDIT PROFILE</h4>
			<form class="SignupForm" role="form" name="book" method="post">
				<label for="DoctorSpecialization">Doctor Specialization</label>
				<select name="Doctorspecialization" class="options" onChange="getdoctor(this.value);" required="required">
					<option value="">Select Specialization</option>
					<?php $ret=mysqli_query($con,"select * from doctorspecilization");
					while($row=mysqli_fetch_array($ret))
						{?>
							<option value="<?php echo htmlentities($row['specilization']);?>">
								<?php echo htmlentities($row['specilization']);?>
							</option>
						<?php } ?>
					</select>
				<label for="doctor">Doctors</label>
				<select name="doctor" class="options" id="doctor" onChange="getfee(this.value);" required="required">
					<option value="">Select Doctor</option>
				</select>
				<label for="consultancyfees">Consultancy Fees</label>
				<select name="fees" class="options" id="fees"  readonly></select>
				<label for="AppointmentDate">Date</label>
				<input class="form-control datepicker" name="appdate"  required="required" placeholder="yyyy-mm-dd">
				<label for="Appointmenttime">Time</label>
				<input class="form-control" name="apptime" id="timepicker1" required="required" placeholder="8:50 PM">
				<button type="submit" id="submit" name="submit" class="updatebtn">Submit</button>
			</form>
		</fieldset>
	</section>
</main>
</section>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</body>
</html>