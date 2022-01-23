<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../user/_asset/css/style.css">

	<title>AT2HB | Login</title>
	<link rel="shortcut icon" href="../img/favicon.ico"/>


</head>

<body>
<?PHP 

if (session_status() == PHP_SESSION_NONE) {
	session_start();
  }
  
if(isset($_SESSION['rand4ever'])){
  header("Location: dashboard.php");
}

include"_asset/process/clear_ctrl.php" ?>
<header>
	
	<a href="index.php" target="_blank" ><img src="../img/unimas_logo_small.png"><b> AT2HB eBooking System</b></a>
	
</header>

	<div class="container">
		<form name="LogForm" action="_asset/process/admin_login.php" method="POST" class="login-email" onsubmit="return logvalidation()">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Welcome Back :)</p>
			<?php 
				if(isset($_GET['error']))
				{
					$error = $_GET['error'];
					echo"<small class='error'>".$error."</small>";
				}
			?>
			<div class="input-group">
				<input type="text" placeholder="Admin ID" name="Id" value="" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="pass" value="" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
		</form>
	</div>
	<script type="text/javascript">
		function logvalidation()
		{
			var Id = document.forms["LogForm"]["Id"];
		    var Pass = document.forms["LogForm"]["pass"];
			
			if(Id_valid(Id))
			{
				if(Pass_valid(Pass))
				{
					return true;
				}
			}
			return false;
		}
		function Id_valid(Id)
		{
			if(Id.value == "")
			{
				setErrorFor(Id, 'ID cannot be blank!');
				Id.focus();
				return false;
			}
			else
			{
				setSuccessFor(Id);
				return true;
			}
		}
		function Pass_valid(Pass)
		{
			if(Pass.value == "")
			{
				setErrorFor(Pass, 'Password cannot be blank!');
				Pass.focus();
				return false;
			}
			else
			{
				setSuccessFor(Pass);
				return true;
			}
		}
			
		function setErrorFor(input, message)
		{
			const container = input.parentElement;
			const small = container.querySelector('small');
			small.innerText = message;
			container.className = 'input-group fail';
		}

		function setSuccessFor(input) 
		{
			const container = input.parentElement;
			const small = container.querySelector('small');
			small.innerText = "Valid";
			container.className = 'input-group success';
		}
			
	</script>
</body>
</html>