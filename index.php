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
	<title>FMC Umuahia</title>
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
						<a class="nav-link" href="index.php" id="home">Home</a>
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
						<a class="nav-link" href="contact.php">Contact Us</a>
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
		<section class="hero">
			<div>
				<h1>FEDERAL MEDICAL CENTER UMUAHIA</h1>
				<a href="./pages/patientlogin.php">BOOK APPOINTMENT ONLINE</a>
			</div>
		</section>
	</header>
	<main>
		<section class="AboutSection">
			<h2>About Us</h2>
			<div>
				<img src="./images/About img.svg">
				<p>The Federal Medical Centre, Umuahia came into existence in November 1991. It metamorphosed from the queen Elizabeth Hospital which was commissioned on March 24, 1956 by Sir Clement Pleas representing Queen Elizabeth the second of England. It started as a joint mission hospital administered by the Methodist, Anglican and Presbyterian churches. Before its takeover by the Federal Government, it had first been taken over from the missions by the then Imo State Government under the then Military Governor – Navy Captain Godwin Ndubuisi Kanu (now A retired rear Admiral). It was renamed Ramat Specialist Hospital in honour of the late slain Head of State, General Murtala Ramat Mohammed. During the first republic under the administration of late Chief Sam Mbakwe, Governor of the old Imo state, it reverted to its original name – Queen Elizabeth Hospital. It thus became the Federal Medical Centre (FMC), Umuahia on its takeover in November 1991. It is the first FMC to be so recognized.</p>
			</div>
		</section>
		<section class="Managements">
			<h2>Top Managements</h2>
			<article>
				<div>
					<img src="./images/Top img.svg">
					<h3>Dr. Emeka Philip</h3>
					<p>Managing Director</p>
				</div>
				<div>
					<img src="./images/Top img.svg">
					<h3>Dr. Emeka Philip</h3>
					<p>Managing Director</p>
				</div>
				<div>
					<img src="./images/Top img.svg">
					<h3>Dr. Emeka Philip</h3>
					<p>Managing Director</p>
				</div>
			</article>
			<a href="about.html">View More</a>
		</section>
		<section class="OurServices">
			<h3>Our Services</h3>
			<article>
				<div>
					<a href="#">Mental Health</a>
					<a href="#">Dental Health</a>
					<a href="#">Physiotherapy</a>
				</div>
				<div>
					<a href="#">Gynecology</a>
					<a href="#">Pediatrics</a>
					<a href="#">Laboratory</a>
				</div>
				<div>
					<a href="#">Surgeries</a>
					<a href="#">Ambulance</a>
					<a href="#">Pharmacy</a>
				</div>
			</article>
			<a id="ServiceButton" href="services.html">Explore all our Services</a>
		</section>
		<section class="IndexDepartments">
			<h3>Departments</h3>
			<section>
				<div class="carousel">
					<article>
						<img src="./images/Frame 1670.svg">
						<p>Physiotherapy</p>
					</article>
					<article>
						<img src="./images/Frame 1671.svg">
						<p>Dental Theatre</p>
					</article>
					<article>
						<img src="./images/Frame 1670 (1).svg">
						<p>Emergency</p>
					</article>
				</div>
				<div class="ellipse">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</section>
			<a href="departments.html">View all our Departments</a>
		</section>
		<section class="News">
			<h4>News and Events</h4>
			<section>
				<article>
					<div>
						<h5>INVITATION TO TENDER FOR YEAR 2022 CAPITAL PROJECTS</h5>
						<p>MAY 17, 2022</p>
					</div>
					<img src="./images/Article.svg">
					<p class="articleParagraph">The Federal Medical Centre, Umuahia in fulfillment of her mandate to provide Quality and Qualitative Health Care Services, intends to use her budgetary allocation for the procurement of works, goods and services towards achieving her mandate as appropriated by the Federal Government in the 2022 Capital Budget.</p>
				</article>
				<article>
					<div>
						<h5>INVITATION TO TENDER FOR YEAR 2022 CAPITAL PROJECTS</h5>
						<p>MAY 17, 2022</p>
					</div>
					<img src="./images/Article.svg">
					<p class="articleParagraph">The Federal Medical Centre, Umuahia in fulfillment of her mandate to provide Quality and Qualitative Health Care Services, intends to use her budgetary allocation for the procurement of works, goods and services towards achieving her mandate as appropriated by the Federal Government in the 2022 Capital Budget.</p>
				</article>
				<article>
					<div>
						<h5>INVITATION TO TENDER FOR YEAR 2022 CAPITAL PROJECTS</h5>
						<p>MAY 17, 2022</p>
					</div>
					<img src="./images/Article.svg">
					<p class="articleParagraph">The Federal Medical Centre, Umuahia in fulfillment of her mandate to provide Quality and Qualitative Health Care Services, intends to use her budgetary allocation for the procurement of works, goods and services towards achieving her mandate as appropriated by the Federal Government in the 2022 Capital Budget.</p>
				</article>
			</section>
			<a href="news.html">All News</a>
		</section>
		<section class="ContactSection">
			<div>
				<h5>Contact Us</h5>
				<p>Get in touch with us</p>
			</div>
			<form class="ContactForm" method="post">
				<label>Full Name</label>
				<input type="text" name="fullname" required>
				<label>Email Address</label>
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