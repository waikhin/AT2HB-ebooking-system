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
			background-color: rgb(242, 132, 158, 0.80);
			color: black;
			border-radius: 10px;
			width:100%;
			height: 100%;
			padding:20px;
		}

		.announce{

			height: 200px;
			width: 100%;
			font-size: 1.3rem;
			font-weight: 500;
			-ms-overflow-style: none;  /* IE and Edge */
    		scrollbar-width: none;  /* Firefox */
		}

		</style>
	</head>
	<body class="is-preload">
	<header id="header">
	<div class="inner">

				<!-- Logo -->
	<a href="index.php" class="logo" >
		<img src="../img/unimas_logo.png"> <span class="title">AT2HB <span class="s">e</span>Booking System</span>
	</a>

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
		<li><a href="index.php" class="active">Home</a></li>
		<li><a href="book_court.php?FID='0'">Profile</a></li>
		<li><a href="courtdetail.html">Booking</a></li>
		<li><a href="logout.html">Logout</a></li>
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
			<div class="announce">
				
					<h6><i class="fa fa-bullhorn "></i>Annoucement</h6>
				
					10/11/2021 1:05 pm AT2HB Swimming Pool will be shut down on 12/11/2021 until further notice
				
			</div>
		</div>
		Scroll Down to Start Booking
		<i class="fa fa-angle-double-down"></i>
</div> 
<!-- end carousel caption -->
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

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<section>
								<h2>Enquiry form</h2>
								<form method="post" action="#">
									<div class="fields">
										<div class="field half">
											<input type="text" name="name" id="name" placeholder="Name" />
										</div>

										<div class="field half">
											<input type="text" name="email" id="email" placeholder="Email" />
										</div>

										<div class="field">
											<input type="text" name="subject" id="subject" placeholder="Subject" />
										</div>

										<div class="field">
											<textarea name="message" id="message" rows="3" placeholder="Notes"></textarea>
										</div>

										<div class="field text-right">
											<label>&nbsp;</label>

											<ul class="actions">
												<li><input type="submit" value="Send Message" class="primary" /></li>
											</ul>
										</div>
									</div>
								</form>
							</section>
							<section>
								<h2>Contact Info</h2>

								<ul class="alt">
									<li><span class="fa fa-envelope-o"></span> <a href="#">corporate@unimas.my</a></li>
									<li><span class="fa fa-phone"></span> +60 82 58 1000 | +60 82 58 1388 </li>
									<li><span class="fa fa-fax"></span> Fax: +60 82 665 088 </li>
									<li><span class="fa fa-map-pin"></span> 94300 Kota Samarahan, Sarawak, Malaysia</li>
								</ul>

								<h2>Follow Us</h2>

								<ul class="icons">
									<li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon style2 fa-linkedin"><span class="label">LinkedIn</span></a></li>
								</ul>
							</section>

							<ul class="copyright">
								<li>© 2021 Official Portal of Universiti Malaysia Sarawak. All Rights Reserved </li>
							</ul>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="_asset/js/jquery.min.js"></script>
			<script src="_asset/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="_asset/js/jquery.scrolly.min.js"></script>
			<script src="_asset/js/jquery.scrollex.min.js"></script>
			<script src="_asset/js/index.js"></script>
	</body>
</html>