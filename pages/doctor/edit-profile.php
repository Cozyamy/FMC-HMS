<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
	$docspecialization=$_POST['Doctorspecialization'];
$docname=$_POST['docname'];
$docaddress=$_POST['clinicaddress'];
$docfees=$_POST['docfees'];
$doccontactno=$_POST['doccontact'];
$docemail=$_POST['docemail'];
$sql=mysqli_query($con,"Update doctors set specilization='$docspecialization',doctorName='$docname',address='$docaddress',docFees='$docfees',contactno='$doccontactno' where id='".$_SESSION['id']."'");
if($sql)
{
echo "<script>alert('Doctor Details updated Successfully');</script>";

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
	<title>Doctor | Edit Profile</title>
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
		<h1>DOCTOR | EDIT PROFILE</h1>
		<h5 style="color: green; font-size:18px; ">
			<?php if($msg) { echo htmlentities($msg);}?> 
		</h5>
		<article>
			<?php
			$did=$_SESSION['dlogin'];
			$sql=mysqli_query($con,"select * from doctors where docEmail='$did'");
			while($data=mysqli_fetch_array($sql))
				{?>
					<h4><?php echo htmlentities($data['doctorName']);?>'s Profile</h4>
					<br>
					<p><b>Profile Reg. Date: </b><?php echo htmlentities($data['creationDate']);?></p>
					<?php if($data['updationDate']){?>
						<p><b>Profile Last Updation Date: </b><?php echo htmlentities($data['updationDate']);?></p>
					<?php } ?>

		</article>
		<section>										
			<fieldset class="DashboardMain-fieldset" style="width: 100%; border-radius: 20px; border: 1px solid #BFBFBF; border-radius: 24px; padding: 7%;">
				<h4 style="color: #212529; font-weight: 400; margin-bottom:40px;">EDIT PROFILE</h4>
			<form class="SignupForm" role="form" name="adddoc" method="post" onSubmit="return valid();">
				<label for="DoctorSpecialization">Doctor Specialization</label>
				<select name="Doctorspecialization" class="options" required="required">
					<option value="<?php echo htmlentities($data['specilization']);?>">
					<?php echo htmlentities($data['specilization']);?></option>
					<?php $ret=mysqli_query($con,"select * from doctorspecilization");
					while($row=mysqli_fetch_array($ret))
						{?>
							<option value="<?php echo htmlentities($row['specilization']);?>">
								<?php echo htmlentities($row['specilization']);
							?>
							</option>
						<?php 
					} ?>
				</select>
				<label for="doctorname">Doctor Name</label>
				<input type="text" name="docname" value="<?php echo htmlentities($data['doctorName']);?>" >
				<label for="fess">Doctor Consultancy Fees</label>
				<input type="text" name="docfees" required="required"  value="<?php echo htmlentities($data['docFees']);?>" >
				<label for="doccontact">Doctor Contact no</label>
				<input type="text" name="doccontact" required="required"  value="<?php echo htmlentities($data['contactno']);?>">
				<label for="docemail">Doctor Email</label>
				<input type="email" name="docemail" readonly="readonly"  value="<?php echo htmlentities($data['docEmail']);?>">
				<?php } ?>
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