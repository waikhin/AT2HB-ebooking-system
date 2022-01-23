<style>
/* Header */

#header {
		display:block;
		padding: 0.8em 0 0.1em 0 ;
		height: 4em;
		background-color: #444444;
	}

		#header .logo {
			display: flex;
			align-items:flex-end;
			font-weight: 900;
			letter-spacing: 0.35em;
			text-decoration: none;
			text-transform: uppercase;
		}

		a {
		-moz-transition: border-bottom-color 0.2s ease, color 0.2s ease;
		-webkit-transition: border-bottom-color 0.2s ease, color 0.2s ease;
		-ms-transition: border-bottom-color 0.2s ease, color 0.2s ease;
		transition: border-bottom-color 0.2s ease, color 0.2s ease;
		text-decoration: none;
		color: #585858;
		border-bottom: dotted 1px rgba(88, 88, 88, 0.5);
	}

		a:hover {
			border-bottom-color: transparent;
			color: #f2849e !important;
			text-decoration: none;
		}


		#header .s{
			text-transform: lowercase;
		}

		#header .title{
			margin-left: 2em;
		}

		#header .logo img{
			width: 	7em;
			height: 3em;
		}

		#header a {
			border:none;
			color: #E5E5E5;
			margin-left: 3em;
		}

		#header nav {
			position: fixed;
			right: 1em;
			top: 1em;
			z-index: 10000;
		}

			#header nav ul {
				display: -moz-flex;
				display: -webkit-flex;
				display: -ms-flex;
				display: flex;
				-moz-align-items: center;
				-webkit-align-items: center;
				-ms-align-items: center;
				align-items: center;
				list-style: none;
				margin: 0;
				padding: 0;
			}

				#header nav ul li {
					display: block;
					padding: 0;
				}

					#header nav ul li a {
						display: block;
						position: relative;
						height: 2em;
						line-height: 3em;
						padding: 0 1.5em;
						background-color: rgba(255, 255, 255, 0.5);
						border-radius: 4px;
						border: 0;
						font-size: 0.8em;
						font-weight: 900;
						letter-spacing: 0.35em;
						text-transform: uppercase;
					}

					#header nav ul li a[href="#menu"] {
						-webkit-tap-highlight-color: transparent;
						width: 4em;
						text-indent: 4em;
						font-size: 1em;
						overflow: hidden;
						padding: 0;
						white-space: nowrap;
					}

						#header nav ul li a[href="#menu"]:before, #header nav ul li a[href="#menu"]:after {
							-moz-transition: opacity 0.2s ease;
							-webkit-transition: opacity 0.2s ease;
							-ms-transition: opacity 0.2s ease;
							transition: opacity 0.2s ease;
							content: '';
							display: block;
							position: absolute;
							top: 0;
							left: 0;
							width: 100%;
							height: 100%;
							background-position: center;
							background-repeat: no-repeat;
							background-size: 2em 2em;
						}

						#header nav ul li a[href="#menu"]:before {
							background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100' preserveAspectRatio='none'%3E%3Cstyle%3Eline %7B stroke-width: 8px%3B stroke: %23f2849e%3B %7D%3C/style%3E%3Cline x1='0' y1='25' x2='100' y2='25' /%3E%3Cline x1='0' y1='50' x2='100' y2='50' /%3E%3Cline x1='0' y1='75' x2='100' y2='75' /%3E%3C/svg%3E");
							opacity: 0;
						}

						#header nav ul li a[href="#menu"]:after {
							background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100' preserveAspectRatio='none'%3E%3Cstyle%3Eline %7B stroke-width: 8px%3B stroke: %23585858%3B %7D%3C/style%3E%3Cline x1='0' y1='25' x2='100' y2='25' /%3E%3Cline x1='0' y1='50' x2='100' y2='50' /%3E%3Cline x1='0' y1='75' x2='100' y2='75' /%3E%3C/svg%3E");
							opacity: 1;
						}

						#header nav ul li a[href="#menu"]:hover:before {
							opacity: 1;
						}

						#header nav ul li a[href="#menu"]:hover:after {
							opacity: 0;
						}
						

		@media screen and (max-width: 736px) {

			#header {
				padding: 4em 0 0.1em 0 ;
			}

				#header nav {
					right: 0.5em;
					top: 0.5em;
				}

					#header nav ul li a[href="#menu"]:before, #header nav ul li a[href="#menu"]:after {
						background-size: 1.5em 1.5em;
					}

		}

/* Menu */

#wrapper {
		-moz-transition: opacity 0.45s ease;
		-webkit-transition: opacity 0.45s ease;
		-ms-transition: opacity 0.45s ease;
		transition: opacity 0.45s ease;
		opacity: 1;
	}

	#menu {
		-moz-transform: translateX(22em);
		-webkit-transform: translateX(22em);
		-ms-transform: translateX(22em);
		transform: translateX(22em);
		-moz-transition: -moz-transform 0.45s ease, visibility 0.45s;
		-webkit-transition: -webkit-transform 0.45s ease, visibility 0.45s;
		-ms-transition: -ms-transform 0.45s ease, visibility 0.45s;
		transition: transform 0.45s ease, visibility 0.45s;
		position: fixed;
		top: 0;
		right: 0;
		width: 22em;
		max-width: 80%;
		height: 100%;
		-webkit-overflow-scrolling: touch;
		background: #585858;
		color: #ffffff;
		cursor: default;
		visibility: hidden;
		z-index: 10002;
	}

		#menu > .inner {
			-moz-transition: opacity 0.45s ease;
			-webkit-transition: opacity 0.45s ease;
			-ms-transition: opacity 0.45s ease;
			transition: opacity 0.45s ease;
			-webkit-overflow-scrolling: touch;
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			padding: 2.75em;
			opacity: 0;
			overflow-y: auto;
		}

			#menu > .inner > ul {
				list-style: none;
				margin: 0 0 1em 0;
				padding: 0;
			}

				#menu > .inner > ul > li {
					padding: 0;
					border-top: solid 1px rgba(255, 255, 255, 0.15);
				}

					#menu > .inner > ul > li a {
						display: block;
						padding: 1em 0;
						line-height: 1.5;
						border: 0;
						color: inherit;
					}

					#menu > .inner > ul > li .active {
						color: #f2849e;
					}

					#menu > .inner > ul > li:first-child {
						border-top: 0;
						margin-top: -1em;
					}

			#menu > .inner > ul > li ul { 
				padding-bottom: 15px;
				list-style: none; 
			}

			#menu > .inner > ul > li ul li { 
				margin-bottom: 15px;
			}

			#menu > .inner > ul > li ul a { 
				padding-top: 0;
				padding-bottom: 0;
			}

			#menu > .inner > ul > li ul .dropdown-toggle:after {
				margin-top: 4px!important;
				margin-bottom: -4px!important;
			}

		#menu > .close {
			-moz-transition: opacity 0.45s ease, -moz-transform 0.45s ease;
			-webkit-transition: opacity 0.45s ease, -webkit-transform 0.45s ease;
			-ms-transition: opacity 0.45s ease, -ms-transform 0.45s ease;
			transition: opacity 0.45s ease, transform 0.45s ease;
			-moz-transform: scale(0.25) rotate(180deg);
			-webkit-transform: scale(0.25) rotate(180deg);
			-ms-transform: scale(0.25) rotate(180deg);
			transform: scale(0.25) rotate(180deg);
			-webkit-tap-highlight-color: transparent;
			display: block;
			position: absolute;
			top: 2em;
			left: -6em;
			width: 6em;
			text-indent: 6em;
			height: 3em;
			border: 0;
			font-size: 1em;
			opacity: 0;
			overflow: hidden;
			padding: 0;
			white-space: nowrap;
		}

			#menu > .close:before, #menu > .close:after {
				-moz-transition: opacity 0.2s ease;
				-webkit-transition: opacity 0.2s ease;
				-ms-transition: opacity 0.2s ease;
				transition: opacity 0.2s ease;
				content: '';
				display: block;
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				background-position: center;
				background-repeat: no-repeat;
				background-size: 2em 2em;
			}

			#menu > .close:before {
				background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100' preserveAspectRatio='none'%3E%3Cstyle%3Eline %7B stroke-width: 8px%3B stroke: %23f2849e%3B %7D%3C/style%3E%3Cline x1='15' y1='15' x2='85' y2='85' /%3E%3Cline x1='85' y1='15' x2='15' y2='85' /%3E%3C/svg%3E");
				opacity: 0;
			}

			#menu > .close:after {
				background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100' preserveAspectRatio='none'%3E%3Cstyle%3Eline %7B stroke-width: 8px%3B stroke: %23585858%3B %7D%3C/style%3E%3Cline x1='15' y1='15' x2='85' y2='85' /%3E%3Cline x1='85' y1='15' x2='15' y2='85' /%3E%3C/svg%3E");
				opacity: 1;
			}

			#menu > .close:hover:before {
				opacity: 1;
			}

			#menu > .close:hover:after {
				opacity: 0;
			}

		@media screen and (max-width: 736px) {

			#menu {
				-moz-transform: translateX(16.5em);
				-webkit-transform: translateX(16.5em);
				-ms-transform: translateX(16.5em);
				transform: translateX(16.5em);
				width: 16.5em;
			}

				#menu > .inner {
					padding: 2.75em 1.5em;
				}

				#menu > .close {
					top: 0.5em;
					left: -4.25em;
					width: 4.25em;
					text-indent: 4.25em;
				}

					#menu > .close:before, #menu > .close:after {
						background-size: 1.5em 1.5em;
					}

		}

	body.is-menu-visible #wrapper {
		pointer-events: none;
		cursor: default;
		opacity: 0.25;
	}

	body.is-menu-visible #menu {
		-moz-transform: translateX(0);
		-webkit-transform: translateX(0);
		-ms-transform: translateX(0);
		transform: translateX(0);
		visibility: visible;
	}

		body.is-menu-visible #menu > * {
			opacity: 1;
		}

		body.is-menu-visible #menu .close {
			-moz-transform: scale(1.0) rotate(0deg);
			-webkit-transform: scale(1.0) rotate(0deg);
			-ms-transform: scale(1.0) rotate(0deg);
			transform: scale(1.0) rotate(0deg);
			opacity: 1;
		}

</style>

<!-- Header -->
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
		<li><a href="index.php"><i class="fa fa-home"></i>  Home</a></li>
		<li><a href="user_profile.php"><i class="fa fa-user"></i>  My Profile</a></li>
		<li><a href="check_booking.php"><i class="fa fa-list-alt"></i>  My Booking</a></li>
		<li><a href="index.php#contact-us"><i class="fa fa-flag"></i>  Contact Us</a></li>
		<li><a href="_asset/process/logout_process.php"><i class="fa fa-power-off"></i>  Logout</a></li>
	</ul>
</nav>
<script src="_asset/js/jquery.min.js"></script>
<script src="_asset/js/jquery.scrolly.min.js"></script>
<script src="_asset/js/index.js"></script>