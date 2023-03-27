<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

//updating Admin Remark
if(isset($_POST['update']))
		  {
$qid=intval($_GET['id']);
$adminremark=$_POST['adminremark'];
$isread=1;
$query=mysqli_query($con,"update tblcontactus set  AdminRemark='$adminremark',IsRead='$isread' where id='$qid'");
if($query){
echo "<script>alert('Admin Remark updated successfully.');</script>";
echo "<script>window.location.href ='read-query.php'</script>";
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
	<title>Admin | Query Details</title>
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
		<h1>ADMIN | QUERY DETAILS</h1>
		<section>
			<div style="overflow-x:auto; table-layout: fixed; width: 100%;">
			<table class="table table-hover" id="sample-table-1">
				<tbody>
				<?php
				$qid=intval($_GET['id']);
				$sql=mysqli_query($con,"select * from tblcontactus where id='$qid'");
				$cnt=1;
				while($row=mysqli_fetch_array($sql))
				{
				?>

					<tr>
						<th>Full Name</th>
						<td><?php echo $row['fullname'];?></td>
					</tr>

					<tr>
						<th>Email Id</th>
						<td><?php echo $row['email'];?></td>
					</tr>
					<tr>
						<th>Conatact Numner</th>
						<td><?php echo $row['contactno'];?></td>
					</tr>
					<tr>
						<th>Message</th>
						<td><?php echo $row['message'];?></td>
					</tr>
					<tr>
						<th>Query Date</th>
						<td><?php echo $row['PostingDate'];?></td>
					</tr>

					<?php if($row['AdminRemark']==""){?>	
					<form name="query" method="post">
						<tr>
							<th>Admin Remark</th>
							<td><textarea name="adminremark" class="form-control" required="true"></textarea></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>	
								<button type="submit" class="btn btn-primary pull-left" name="update">Update</button>
							</td>
						</tr>
						</form>
						<?php } else {?>
							<tr>
								<th>Admin Remark</th>
								<td><?php echo $row['AdminRemark'];?></td>
							</tr>
							<tr>
								<th>Last Updatation Date</th>
								<td><?php echo $row['LastupdationDate'];?></td>
							</tr>
						<?php
						}} ?>
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
