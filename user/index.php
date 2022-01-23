<html>
	<head>
		<title>AT2HB eBooking System</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="shortcut icon" href="../img/favicon.ico"/>

		<link rel="stylesheet" href="_asset/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="_asset/css/index.css" />
		<noscript><link rel="stylesheet" href="_asset/css/noscript.css" /></noscript>
		<style>


		.carousel-caption{
			bottom: 130px;
			padding-left: 10px;
			padding-right:10px;

		}

		.carousel-caption p {

			font-size: 50px;
			font-weight:800;
		}

		.announcement {
			background-color: rgb(242, 132, 158, 0.95);
			color: black;
			border-radius: 10px;
			border:3px solid #ff0063;
			width:100%;
			height: 100%;
			padding:20px;
			overflow: scroll;
			-ms-overflow-style: none;  /* IE and Edge */
			scrollbar-width: none;  /* Firefox */
		}
		
		.announcement::-webkit-scrollbar {
			display: none;
		}
		
		.announce{

			height: 200px;
			width: 100%;
			font-size: 1.3rem;
			font-weight: 600;
			-ms-overflow-style: none;  /* IE and Edge */
    		scrollbar-width: none;  /* Firefox */
		}

		</style>
	</head>
	<body class="is-preload">

<?php

if (session_status() == PHP_SESSION_NONE) 
{
session_start();
}

if(isset($_SESSION['id'])){
    $uid=$_SESSION['id'];
  }
else{
    $uid='annonymous';
}
?>
	<header id="header">
	<div class="inner">

				<!-- Logo -->
	<a href="index.php" class="logo" >
		<img src="../img/unimas_logo.png"> <span class="title">AT2HB <span class="s">e</span>Booking System</span>
	</a>
	<!-- if havent login show this and hide the menu -->
<?php
if($uid=='annonymous'){
	echo' <a href="login.php"><button class="login-btn">Login</button></a>';
}
?>
	<!-- Nav -->
	<nav>
		<ul>
			<li><a href="#menu">Menu</a></li>
		</ul>
	</nav>

	</div>
</header>

<!-- Menu -->
<nav id="menu">
	<h2>Menu</h2>
	<ul>
		<li><a href="index.php" class="active"><i class="fa fa-home"></i>  Home</a></li>
		<li><a href="user_profile.php"><i class="fa fa-user"></i>  My Profile</a></li>
		<li><a href="check_booking.php"><i class="fa fa-list-alt"></i>  My Booking</a></li>
		<li><a href="#contact-us"><i class="fa fa-flag"></i>  Contact Us</a></li>
		<li><a href="_asset/process/logout_process.php"><i class="fa fa-power-off"></i>  Logout</a></li>
	</ul>
</nav>
		<!-- Wrapper -->
			<div id="wrapper">

				

				<!-- Main -->
					<div id="main">

					<!-- Search bar slide -->	
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						  <ol class="carousel-indicators">
						    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						  </ol>
<div class="carousel-inner">
<div class="carousel-caption d-none d-md-block">
	 	<p>Welcome to AT2HB eBooking System</p>

		<div class="container announcement">
					<h6><i class="fa fa-bullhorn "></i>Annoucement</h6>
			<div class="announce">
<?php
    require_once("_asset/process/dbcontroller.php");
    $db_handler = new DBController();
    $conn=$db_handler->connectDB();

    $announcement_array = $db_handler->runQuery("SELECT announcement_submit,announcement_detail FROM announcement ORDER BY announcement_submit desc;");
    if (!empty($announcement_array)) {
        foreach($announcement_array as $key=>$value){
            echo "<small>".$announcement_array[$key]["announcement_submit"]."</small> &nbsp &nbsp &nbsp";
            echo $announcement_array[$key]["announcement_detail"]."<br>";
        }
    }
?>
			</div>
		</div>
		Scroll Down to Start Booking
		<i class="fa fa-angle-double-down"></i>
</div> 
<!-- end announcement -->
					    	<div class="carousel-item active">

						      <img class="d-block w-100" src="../img/slider-image-1-1920x850.jpg" alt="First slide">

						    </div>
						    <div class="carousel-item">
						      <img class="d-block w-100" src="../img/slider-image-2-1920x850.jpg" alt="Second slide">
						    </div>
						    <div class="carousel-item">
						      <img class="d-block w-100" src="../img/slider-image-3-1920x850.jpg" alt="Third slide">
						    </div>
							</div> <!-- end carousel-item active-->
						  
						  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>

						</div> <!-- end carousel inner-->

						<br>
						<br>

						<div class="inner">
							<!-- About Us -->
							<!-- <header id="inner">
								<h1>Manage your courts here!</h1>
							</header> -->

							<br>

							<h2 class="h2">Courts</h2>

							<!-- Courts -->
							<section class="tiles">
								<article class="style1">
									<span class="image">
										<img src="../img/sport-1-720x480.jpg" alt="" />
									</span>
									<a href="facility_detail.php?FID=1">
										<h2>Badminton</h2>
										
									</a>
								</article>
								<article class="style2">
									<span class="image">
										<img src="../img/sport-2-720x480.jpg" alt="" />
									</span>
									<a href="facility_detail.php?FID=2">
										<h2>Squash</h2>
										
									</a>
								</article>
								<article class="style3">
									<span class="image">
										<img src="../img/sport-3-720x480.jpg" alt="" />
									</span>
									<a href="facility_detail.php?FID=3">
										<h2>Futsal</h2>
										
									</a>
								</article>

								<article class="style4">
									<span class="image">
										<img src="../img/sport-4-720x480.jpg" alt="" />
									</span>
									<a href="facility_detail.php?FID=4">
										<h2>Tennis</h2>
										
									</a>
								</article>

								<article class="style5">
									<span class="image">
										<img src="../img/sport-5-720x480.jpg" alt="" />
									</span>
									<a href="facility_detail.php?FID=5">
										<h2>Netball</h2>
										
									</a>
								</article>

								<article class="style6">
									<span class="image">
										<img src="../img/sport-6-720x480.jpg" alt="" />
									</span>
									<a href="facility_detail.php?FID=6">
										<h2>Volleyball</h2>
										
									</a>
								</article>
								
								<article class="style7">
									<span class="image">
										<img src="../img/sport-7-720x480.jpg" alt="" />
									</span>
									<a href="facility_detail.php?FID=7">
										<h2>Basketball</h2>
										
									</a>
								</article>
								
								<article class="style8">
									<span class="image">
										<img src="../img/sport-8-720x480.jpg" alt="" />
									</span>
									<a href="facility_detail.php?FID=8">
										<h2>Takraw</h2>
										
									</a>
								</article>
								
								<article class="style9">
									<span class="image">
										<img src="../img/sport-9-720x480.jpg" alt="" />
									</span>
									<a href="facility_detail.php?FID=9">
										<h2>Rugby</h2>
										
									</a>
								</article>
								
								<article class="style10">
									<span class="image">
										<img src="../img/sport-10-720x480.jpg" alt="" />
									</span>
									<a href="facility_detail.php?FID=10">
										<h2>Stadium(Track & Field)</h2>
										
									</a>
								</article>
								
								<article class="style11">
									<span class="image">
										<img src="../img/sport-11-720x480.jpg" alt="" />
									</span>
									<a href="facility_detail.php?FID=11">
										<h2>Wall Climbing</h2>
										
									</a>
								</article>
							</section>
					
							<br>
					</div>
		</div>
		<!-- end body -->
				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<section>
								<h2>Enquiry form</h2>
								<form method="post" name="enqForm" action="_asset/process/feedback_process.php" onsubmit="return isValid()">
									<div class="fields">
										<div class="field half">
											<input type="text" name="name" id="name" placeholder="Name" autocomplete="off" />
											<small></small>
										</div>

										<div class="field half">
											<input type="text" name="email" id="email" placeholder="Email" autocomplete="off" />
											<small></small>
										</div>

										<div class="field">
											<select  id="type" name="type">
												<option value="NULL" disabled selected>--- Select Type ---</option>
												<option value="Enquiry">Enquiry</option>
												<option value="Report">Report</option>
											</select>
											<small></small>
										</div>

										<div class="field">
											<input type="text" name="subject" id="subject" placeholder="Subject" autocomplete="off" />
											<small></small>
										</div>

										<div class="field">
											<textarea name="message" id="message" rows="3" placeholder="Notes"></textarea>
											<small></small>
										</div>

										<div class="field text-right">
											<label>&nbsp;</label>

											<ul class="actions">
												<li><input type="submit" value="Send Message" class="primary" /></li>
												<small></small>
											</ul>
										</div>
									</div>
								</form>
							</section>
							<section id=contact-us>
								<h2>Contact Info</h2>

								<ul class="alt">
									<li><span class="fa fa-envelope-o"></span> <a href="mailto:bnorhamimah@unimas.my">bnorhamimah@unimas.my</a></li>
									<li><span class="fa fa-phone"></span><a href="tel:+6082581658"> +60 82 58 1658</a> </li>
									<li><span class="fa fa-fax"></span> +60 82 58 1660 </li>
									<li><span class="fa fa-map-pin"></span> Arena Tun Tuanku Haji Bujang, UNIMAS,<br>  94300 Kota Samarahan,<br> Sarawak, Malaysia</li>
								</ul>

								<h2>Follow Us</h2>

								<ul class="icons">
									<li><a href="https://twitter.com/ps_unimas?lang=en" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="https://www.facebook.com/pusatsukanunimas" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="https://www.instagram.com/at2hb/" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
								</ul>
							</section>

							<ul class="copyright">
								<li>© 2021 Official Portal of Universiti Malaysia Sarawak. All Rights Reserved </li>
							</ul>
						</div>
					</footer>

			

		<!-- Scripts -->
			<script src="_asset/js/jquery.min.js"></script>
			<script src="_asset/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="_asset/js/jquery.scrolly.min.js"></script>
			<script src="_asset/js/jquery.scrollex.min.js"></script>
			<script src="_asset/js/index.js"></script>
			<script type="text/javascript">
				function isValid()
				{
					var Name = document.forms["enqForm"]["name"];
					var Mail = document.forms["enqForm"]["email"];
					var Type = document.forms["enqForm"]["type"];
					var Subject = document.forms["enqForm"]["subject"];
					var Msg = document.forms["enqForm"]["message"];
					
					if(Name_valid(Name))
					{
						if(Mail_valid(Mail))
						{
							if(Type_valid(Type))
							{
								if(Subject_valid(Subject))
								{
									if(Msg_valid(Msg))
									{
										return true;
									}
								}
							}
						}
					}
					return false;
				}
				
				function Name_valid(Name)
				{
					var uppercaseCheck = /^[A-Z]/;
					var lowercaseCheck = /^(?=.*[a-z])/;
					if(Name.value.match(uppercaseCheck) && Name.value.match(lowercaseCheck))
					{
						setSuccessFor(Name);
						return true;
					}
					else if(Name.value === '')
					{
						setErrorFor(Name, 'Name cannot be blank!');
						Name.focus();
						return false;
					}
					else
					{
						setErrorFor(Name, 'First Character must be Uppercase follow by Lowercase');
						Name.focus();
						return false;
					}
				}

				function Mail_valid(Email)
				{
					var mailfomat = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
					if(Email.value.match(mailfomat))
					{
						setSuccessFor(email);
						return true;
					}
					else if(Email.value === '')
					{
						setErrorFor(email, 'Email cannot be blank!');
						Email.focus();
						return false;
					}
					else
					{
						setErrorFor(email,"You have entered an invalid email address!");
						Email.focus();
						return false;
					}
				}

				function Type_valid(Type)
				{
					if(Type.value === '')
					{
						setErrorFor(type, 'Enquiry type cannot be blank!');
						Type.focus();
						return false;
					}
					else
					{
						setSuccessFor(Type);
						return true;
					}
				}

				function Subject_valid(Subject)
				{
					if(Subject.value === '')
					{
						setErrorFor(subject, 'Subject cannot be blank!');
						Subject.focus();
						return false;
					}
					else
					{
						setSuccessFor(Subject);
						return true;
					}
				}

				function Msg_valid(Msg)
				{
					if(Msg.value === '')
					{
						setErrorFor(message, 'Message cannot be blank!');
						Msg.focus();
						return false;
					}
					else
					{
						setSuccessFor(message);
						return true;
					}
				}
					
				function setErrorFor(input, errMsg)
				{
					const container = input.parentElement;
					const small = container.querySelector('small');
					small.innerText = errMsg;
				}

				function setSuccessFor(input) 
				{
					const container = input.parentElement;
					const small = container.querySelector('small');
					small.innerText = "Valid";;
				}
					
			</script>
	</body>
</html>