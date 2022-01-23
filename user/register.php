<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="_asset/css/style.css">

	<title>AT2HB | Register</title>
	<link rel="shortcut icon" href="../img/favicon.ico"/>
	<script type="text/javascript" src="../user/_asset/js/studentReg.js"></script>
	
</head>
<body>

	<header>
	
	<a href="index.php" target="_blank" ><img src="../img/unimas_logo_small.png"><b> AT2HB eBooking System</a>
	
</header>

	<div class="container">
		<form name="RegForm" action="../user/_asset/process/reg_process.php" onsubmit="return regValidation()" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<?php 
				if(isset($_GET['error']))
				{
					$error = $_GET['error'];
					echo"<small>".$error."</small>";
				}
			?>
			<div class="input-group">
			<select  id="role" name="role">
				<option value="none" disabled selected>---Select Role---</option>
				<option value= "Student">Student</option>
				<option value= "Staff">Staff</option>
				<option value= "Guest" disabled>Guest</option>
			</select>
			<small>Error</small>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Student ID/Staff ID" name="Id" value="" >
				<small>Error</small>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Full Name" name="Name" value="" >
				<small>Error</small>
			</div>
			<div class="input-group">
			<select  id="Faculty" name="Faculty">
				<option value="none" disabled selected>---Select Faculty---</option>
				<option value= "Faculty of Resource Science and Technology">Faculty of Resource Science and Technology</option>
				<option value= "Faculty of Social Sciences & Humanites">Faculty of Social Sciences & Humanites</option>
				<option value= "Faculty of Cognitive Sciences and Human Devlopment">Faculty of Cognitive Sciences and Human Devlopment</option>
				<option value= "Faculty of Applied and Creative Arts">Faculty of Applied and Creative Arts</option>
				<option value= "Faculty of Engineering">Faculty of Engineering</option>
				<option value= "Faculty of Computer Science and Information Technology">Faculty of Computer Science and Information Technology</option>
				<option value= "Faculty of Medicine and Health Sciences">Faculty of Medicine and Health Sciences</option>
				<option value= "Faculty of Economics and Business">Faculty of Economics and Business</option>
				<option value= "Faculty of Built Environment">Faculty of Built Environment</option>
				<option value= "Faculty of Language and Communication">Faculty of Language and Communication</option>
			</select>
			<small>Error</small>
			</div>
			<div class="input-group">
				<input type="email" id="email" placeholder="UNIMAS Email" name="email" value="" >
				<small>Error</small>
			</div>
			<div class="input-group">
				<input type="text" id="phonenumber" placeholder="Phone number" name="phonenumber" value="" >
				<small>Error</small>
			</div>
			<div class="input-group">
				<input type="password" id="password" placeholder="Password" name="password" value="" >
				<small>Error</small>
            </div>
            <div class="input-group">
				<input type="password" id="cpassword" placeholder="Confirm Password" name="cpassword" value="" >
				<small>Error</small>
			</div>
			<div class="input-group">
				<button name="submit" class="btn" onclick="return regValidation()">Register</button>
			</div>

			<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>