<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{
date_default_timezone_set('Africa/Lagos');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['submit']))
{
$cpass=md5($_POST['cpass']);
$did=$_SESSION['id'];
$sql=mysqli_query($con,"SELECT password FROM  doctors where password='$cpass' && id='$did'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
$npass=md5($_POST['npass']);
 $con=mysqli_query($con,"update doctors set password='$npass', updationDate='$currentTime' where id='$did'");
$_SESSION['msg1']="Password Changed Successfully !!";
}
else
{
$_SESSION['msg1']="Old Password not match !!";
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
	<title>Doctor  | change Password</title>
	<script type="text/javascript">
	function valid()
	{
	if(document.chngpwd.cpass.value=="")
	{
	alert("Current Password Filed is Empty !!");
	document.chngpwd.cpass.focus();
	return false;
	}
	else if(document.chngpwd.npass.value=="")
	{
	alert("New Password Filed is Empty !!");
	document.chngpwd.npass.focus();
	return false;
	}
	else if(document.chngpwd.cfpass.value=="")
	{
	alert("Confirm Password Filed is Empty !!");
	document.chngpwd.cfpass.focus();
	return false;
	}
	else if(document.chngpwd.npass.value!= document.chngpwd.cfpass.value)
	{
	alert("Password and Confirm Password Field do not match  !!");
	document.chngpwd.cfpass.focus();
	return false;
	}
	return true;
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
		<h1>DOCTOR | CHANGE PASSWORD</h1>
		<p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?>
		<?php echo htmlentities($_SESSION['msg1']="");?></p>
		<section class="section-div">
			<fieldset class="DashboardMain-fieldset" style="width: 100%; border-radius: 20px; border: 1px solid #BFBFBF; border-radius: 24px; padding: 7%;">
				<form class="SignupForm" role="form" name="chngpwd" method="post" onSubmit="return valid();">
				<label for="exampleInputEmail1">Current Password</label>
				<input type="password" name="cpass"  placeholder="Enter Current Password">
				<label for="exampleInputPassword1">New Password</label>
				<input type="password" name="npass"  placeholder="New Password">
				<label for="exampleInputPassword1">Confirm Password</label>
				<input type="password" name="cfpass" class="form-control"  placeholder="Confirm Password">
				<button type="submit" id="submit" name="submit" class="updatebtn">Submit</button>
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
