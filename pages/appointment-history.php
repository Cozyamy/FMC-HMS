<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{
if(isset($_GET['cancel']))
		  {
		          mysqli_query($con,"update appointment set userStatus='0' where id = '".$_GET['id']."'");
                  $_SESSION['msg']="Your appointment canceled !!";
		  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/svg" sizes="32x32" href="../images/logo.svg">
	<link rel="stylesheet" type="text/css" href="../styles/style.css">
		<title>User | Appointment History</title>
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
		<h1>User  | Appointment History</h1>
		<h5 style="color: green; font-size:18px; ">
			<?php if($msg) { echo htmlentities($msg);}?> 
		</h5>
		<section class="dashboard-section">
			<div style="overflow-x:auto; table-layout: fixed; width: 100%;">
			<table class="table table-hover" id="sample-table-1">
				<thead>
					<tr>
						<th class="center">#</th>
						<th class="hidden-xs">Doctor Name</th>
						<th>Specialization</th>
						<th>Consultancy Fee</th>
						<th>Appointment Date / Time </th>
						<th>Appointment Creation Date  </th>
						<th>Current Status</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php
					$sql=mysqli_query($con,"select doctors.doctorName as docname,appointment.*  from appointment join doctors on doctors.id=appointment.doctorId where appointment.userId='".$_SESSION['id']."'");
					$cnt=1;
					while($row=mysqli_fetch_array($sql))
						{?>
							<tr>
								<td class="center"><?php echo $cnt;?>.</td>
								<td class="hidden-xs"><?php echo $row['docname'];?></td>
								<td><?php echo $row['doctorSpecialization'];?></td>
								<td><?php echo $row['consultancyFees'];?></td>
								<td><?php echo $row['appointmentDate'];?> / <?php echo $row['appointmentTime'];?></td>
								<td><?php echo $row['postingDate'];?></td>
								<td>
									<?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
									{
										echo "Active";
									}
									if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
									{
										echo "Cancel by You";
									}
									if(($row['userStatus']==1) && ($row['doctorStatus']==0))
									{
										echo "Cancel by Doctor";
									}
								?></td>
								<td >
									<div class="visible-md visible-lg hidden-sm hidden-xs">
										<?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))
										{ ?>
											<a href="appointment-history.php?id=<?php echo $row['id']?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')"class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
										<?php } else {
											echo "Canceled";
										} ?>
									</div>
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