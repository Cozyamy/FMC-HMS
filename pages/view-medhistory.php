<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
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
	<link rel="icon" type="image/svg" sizes="32x32" href="../images/logo.svg">
	<link rel="stylesheet" type="text/css" href="../styles/style.css">
		<title>Users | Medical History</title>
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
				<h1>Users | Medical History</h1>
				<?php
				$vid=$_GET['viewid'];
				$ret=mysqli_query($con,"select * from tblpatient where ID='$vid'");
				$cnt=1;
				while ($row=mysqli_fetch_array($ret)) {
					?>
					<div style="overflow-x:auto; table-layout: fixed; width: 100%;">
					<table border="1" class="table ">
            <tr align="center">
            	<td colspan="4" style="font-size:20px;color:blue">Patient Details</td>
            </tr>
            <tr>
            	<th scope>Patient Name</th>
            	<td><?php  echo $row['PatientName'];?></td>
            	<th scope>Patient Email</th>
              <td><?php  echo $row['PatientEmail'];?></td>
            </tr>
            <tr>
            	<th scope>Patient Mobile Number</th>
            	<td><?php  echo $row['PatientContno'];?></td>
            	<th>Patient Address</th>
            	<td><?php  echo $row['PatientAdd'];?></td>
            </tr>
            <tr>
            	<th>Patient Gender</th>
              <td><?php  echo $row['PatientGender'];?></td>
              <th>Patient Age</th>
              <td><?php  echo $row['PatientAge'];?></td>
            </tr>
            <tr>
            	<th>Patient Medical History(if any)</th>
              <td><?php  echo $row['PatientMedhis'];?></td>
              <th>Patient Reg Date</th>
              <td><?php  echo $row['CreationDate'];?></td>
              </tr>
              <?php }?>
              </table>
              <?php
              $ret=mysqli_query($con,"select * from tblmedicalhistory  where PatientID='$vid'");
            ?>
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            	<tr align="center">
            		<th colspan="8" >Medical History</th>
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
            		while ($row=mysqli_fetch_array($ret)) 
            			{
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
