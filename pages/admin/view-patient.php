<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    
    $vid=$_GET['viewid'];
    $bp=$_POST['bp'];
    $bs=$_POST['bs'];
    $weight=$_POST['weight'];
    $temp=$_POST['temp'];
   $pres=$_POST['pres'];
   
 
      $query.=mysqli_query($con, "insert   tblmedicalhistory(PatientID,BloodPressure,BloodSugar,Weight,Temperature,MedicalPres)value('$vid','$bp','$bs','$weight','$temp','$pres')");
    if ($query) {
    echo '<script>alert("Medicle history has been added.")</script>';
    echo "<script>window.location.href ='manage-patient.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
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
	<title>Admin | Manage Patient</title>
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
		<h1>ADMIN | MANAGE PATIENTS</h1>
		<article>
			<h2>View Patients</h2>
		</article>
		<?php
		$vid=$_GET['viewid'];
		$ret=mysqli_query($con,"select * from tblpatient where ID='$vid'");
		$cnt=1;
		while ($row=mysqli_fetch_array($ret))
			{
				?>
		<section>
			<div style="overflow-x:auto; table-layout: fixed; width: 100%;">
			<table border="1" class="table table-bordered">
				<tr align="center">
					<td colspan="8" style="font-size:20px;color: #212529">Patient Details</td>
				</tr>
				<tr>
					<th scope>Patient Name</th>
					<th scope>Patient Email</th>
					<th scope>Patient Mobile Number</th>
					<th>Patient Address</th>
					<th>Patient Gender</th>
					<th>Patient Age</th>
					<th>Patient Medical History(if any)</th>
					<th>Patient Reg Date</th>
					
				</tr>
				<tr>
					<td><?php  echo $row['PatientName'];?></td>
					<td><?php  echo $row['PatientEmail'];?></td>
					<td><?php  echo $row['PatientContno'];?></td>
					<td><?php  echo $row['PatientAdd'];?></td>
					<td><?php  echo $row['PatientGender'];?></td>
					<td><?php  echo $row['PatientAge'];?></td>
					<td><?php  echo $row['PatientMedhis'];?></td>
					<td><?php  echo $row['CreationDate'];?></td>
				</tr>
				<?php }?>
			</table>
		</div>
		</section>
		<section>
			<?php
			$ret=mysqli_query($con,"select * from tblmedicalhistory  where PatientID='$vid'");
		?>
		<div style="overflow-x:auto; table-layout: fixed; width: 100%;">
		<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
			<tr align="center">
				<th colspan="8" style="font-size:20px;color: #212529">Medical History</th>
			</tr>
			<tr>
				<th>#</th>
				<th>Blood Pressure</th>
				<th>Weight</th>
				<th>Blood Sugar</th>
				<th>Body Temprature</th>
				<th>Medical Prescription</th>
				<th>Visit Date</th>
			</tr>
			<?php  
			while ($row=mysqli_fetch_array($ret)) { 
			  ?>
			<tr>
			  	<td><?php echo $cnt;?></td>
			 	<td><?php  echo $row['BloodPressure'];?></td>
			 	<td><?php  echo $row['Weight'];?></td>
			 	<td><?php  echo $row['BloodSugar'];?></td> 
			  	<td><?php  echo $row['Temperature'];?></td>
			  	<td><?php  echo $row['MedicalPres'];?></td>
			  	<td><?php  echo $row['CreationDate'];?></td> 
			</tr>
			<?php $cnt=$cnt+1;} ?>
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
