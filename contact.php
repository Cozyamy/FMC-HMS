<?php
include_once('pages/include/config.php');
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$mobileno=$_POST['mobileno'];
$dscrption=$_POST['description'];
$query=mysqli_query($con,"insert into tblcontactus(fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");
echo "<script>alert('Your information succesfully submitted');</script>";
echo "<script>window.location.href ='index.php'</script>";

} ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/svg" sizes="32x32" href="./images/logo.svg">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<title>Contact FMC Umuahia</title>
</head>
<body>
	<header>
		<nav>
			<a href="index.php">
					<img src="./images/logo.svg">
				</a>
			<div class="nav">
				<ul class="Navmenu">
					<li>
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li>
						<a class="nav-link" href="about.html">About Us</a>
					</li>
					<li>
						<a class="nav-link" href="departments.html">Departments</a>
					</li>
					<li>
						<a class="nav-link" href="services.html">Services</a>
					</li>
					<li>
						<a class="nav-link" href="news.html">News & Events</a>
					</li>
					<li>
						<a class="nav-link" href="contact.php" id="home">Contact Us</a>
					</li>
				
				<div class="button">
					<a href="./pages/patientlogin.php">Login</a>
					<a href="./pages/patientsignup.php">Sign up</a>
				</div>
				</ul>
				<div class="hamburger">
					<span class="bar"></span>
					<span class="bar"></span>
					<span class="bar"></span>
				</div>
			</div>
		</nav>
	</header>
	<main>
		<section class="ContactSection">
			<div>
				<h5>Contact Us</h5>
				<p>Get in touch with us</p>
			</div>
			<form class="ContactForm" method="post">
				<label for="fullname">Full Name</label>
				<input type="text" name="fullname" required>
				<label for="emailid">Email Address</label>
				<input type="text" name="emailid" required>
				<label>Phone Number</label>
				<input type="text" name="mobileno" required>
				<label>Message</label>
				<textarea id="Message" type="text" name="description" required></textarea>
				<button type="submit" name="submit">Submit</button>
			</form>
		</section>
	</main>
	<footer>
		<section>
			<img id="footerLogo" src="./images/logo.svg">
			<article>
				<p>Email : fmcumuahia@fmc-umuahia.com.ng</p>
				<p>Complaint Texts : +2348038089468</p>
				<a href="./pages/patientlogin.php">Book an appointment</a>
				<div class="socials">
					<div class="facebook"></div>
					<div class="twitter"></div>
				</div>
			</article>
			<article>
				<a href="index.php">Home</a>
				<a href="services.html">Services</a>
				<a href="./pages/patientsignup.php">Sign Up</a>
				<a href="./pages/patientlogin.php">Login</a>
			</article>
		</section>
		<hr>
		<div id="footnote">
			<a href="https://github.com/Cozyamy/FMC-HMS" target="_blank">Project Documentation</a>
			<p>© Copyright 2023 Amarachi Iheakam. All rights Reserved</p>
		</div>
	</footer>


<script src="scripts/script.js"></script>
</body>
</html>