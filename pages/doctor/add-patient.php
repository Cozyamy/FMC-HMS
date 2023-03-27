<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

if(isset($_POST['submit']))
{	
	$docid=$_SESSION['id'];
	$patname=$_POST['patname'];
$patcontact=$_POST['patcontact'];
$patemail=$_POST['patemail'];
$gender=$_POST['gender'];
$pataddress=$_POST['pataddress'];
$patage=$_POST['patage'];
$medhis=$_POST['medhis'];
$sql=mysqli_query($con,"insert into tblpatient(Docid,PatientName,PatientContno,PatientEmail,PatientGender,PatientAdd,PatientAge,PatientMedhis) values('$docid','$patname','$patcontact','$patemail','$gender','$pataddress','$patage','$medhis')");
if($sql)
{
echo "<script>alert('Patient info added Successfully');</script>";
header('location:add-patient.php');

}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/svg" sizes="32x32" href="../../images/logo.svg">
	<link rel="stylesheet" type="text/css" href="../../styles/style.css">
	<title>Doctor | Add Patient</title>
	<script>
	function userAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "check_availability.php",
	data:'email='+$("#patemail").val(),
	type: "POST",
	success:function(data){
	$("#user-availability-status1").html(data);
	$("#loaderIcon").hide();
	},
	error:function (){}
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
		<h1>DOCTOR | ADD PATIENT</h1>
		<section class="section-div">
			<fieldset class="DashboardMain-fieldset" style="width: 100%; border-radius: 20px; border: 1px solid #BFBFBF; border-radius: 24px; padding: 7%;">
				<form class="SignupForm" role="form" name="" method="post">
				<label for="patname">Patient Name</label>
				<input type="text" name="patname"  placeholder="Enter Patient Name" required="true">
				<label for="fess">Patient Contact no</label>
				<input type="text" name="patcontact"   placeholder="Enter Patient Contact no" required="true" maxlength="11" pattern="[0-9]+">
				<label for="fess">Patient Email</label>
				<input type="email" id="patemail" name="patemail" class="form-control"  placeholder="Enter Patient Email id" required="true" onBlur="userAvailability()">
				<span id="user-availability-status1" style="font-size:12px;"></span>
				<article style="padding: 0%;">
					<legend style="margin-bottom: 30px;">Gender:</legend>
					<label for="rg-male">Male</label>
					<input type="radio" id="rg-male" name="gender" value="male">
					<label style="margin-left: 20px;" for="rg-female">Female</label>
					<input type="radio" id="rg-female" name="gender" value="female">
				</article>
				<label for="address">Patient Address</label>
				<input name="pataddress"  placeholder="Enter Patient Address" required="true"></input>
				<label for="fess">Patient Age</label>
				<input type="text" name="patage" placeholder="Enter Patient Age" required="true">
				<label for="fess">Medical History</label>
				<input type="text" name="medhis"  placeholder="Enter Patient Medical History(if any)" required="true"></input>
				<button type="submit" id="submit" name="submit" class="updatebtn">Update</button>
			</form>
			</fieldset>
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
