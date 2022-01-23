<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AT2HB | User Profile</title>
	<link rel="shortcut icon" href="../img/favicon.ico"/>

    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css' rel='stylesheet'>

	<link rel="stylesheet" href="_asset/css/user_profile.css">	

</head>
<body>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['id'])){
    header("Location: login.php");
  }
else{
$uid=$_SESSION['id'];
require_once("_asset/process/dbcontroller.php");
$db_handler = new DBController();
$conn=$db_handler->connectDB();

	include "header(user).php";


    $sql=mysqli_query($conn,"SELECT * FROM user WHERE user_id='$uid'")or die(mysqli_error($conn));
    $row=mysqli_fetch_array($sql);
?>
<main>
<div class="card-body-pass" id="chgpass">        
        <div class="card">
        <div class="card-header">
            <h1><i class="fa fa-list-alt"></i>  CHANGE PASSWORD</h1>
        </div>
        <form name="chgpassForm" method="post" action="_asset/process/chgpass_process.php">
            <!-- end card header -->
            <div class="card-body">
                <div class="pass">
                    <label>Current Password</label>
                    <input type="password" name="currentpass" value="">
                    <small>error</small>
                </div>
                <div class="pass">
                    <label>New Password</label>
                    <input type="password" name="newpass" value="">
                    <small>error</small>
                </div>
                <div class="pass">
                    <label>Confirm Password</label>
                    <input type="password" name="cnewpass" value="">
                    <small>error</small>
                </div>
                    
            </div>
            <!-- end card body -->
            <div class="card-footer">
                <button class="btn btn-secondary" name="chgpass" onclick="return passValidation()">Submit</button>
                <button type="button" class="btn btn-secondary" onclick="closePass()">Back</button>     
            </div>
            </form>
            <!-- end card footer -->
        </div>
            <!-- end Card -->
</div>
<!-- end of #pass -->

        <div class="card-body-pass" id="chgprofile">        
        <div class="card">
        <div class="card-header">
            <h1><i class="fa fa-list-alt"></i>  CHANGE PROFILE</h1>
        </div>
        <form name="chgprofileForm" method="post" action="_asset/process/chgprofile_process.php">
            <!-- end card header -->
            <div class="card-body">
                <div class="pass">
                    <label>Faculty</label>
                    <select  id="Faculty" name="faculty">
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
                <div class="pass">
                    <label>Phone</label>
                    <input type="text" name="phonenum" value="">
                    <small>error</small>
                </div>
                    
            </div>
            <!-- end card body -->
            <div class="card-footer">
                <button class="btn btn-secondary" name="chgprofile" onclick="return profileValidation()">Submit</button>
                <button type="button" class="btn btn-secondary" onclick="closeProfile()">Back</button>
            </div>
            </form>
            <!-- end card footer -->
            </div>
            <!-- end Card -->
</div>
    <!-- end card pop up -->
    <?php 
            if(isset($_GET['msg'])){
                $msg=$_GET['msg'];
                echo'<small  class="success">'.$msg.'</small>';
            }
            else if(isset($_GET['err'])){
                $err=$_GET['err'];
                echo'<small class="error">'.$err.'</small>';
            }
            ?>
	<div class="card" id="mybooking">
		<div class="card-header">

			<h1><i class="fa fa-user"></i>  MY PROFILE</h1>
            
		</div>
		<!-- end card header -->
		<div class="card-body">
            <div class="row">
                <div class="col-3"><label>User ID </label></div>
                <div class="col-9">: <?php echo $row['user_id'] ?></div>
            </div>
            <div class="row">
                <div class="col-3"><label>Full Name </label></div>
                <div class="col-9">: <?php echo $row['user_name'] ?></div>
            </div>
            <div class="row">
                <div class="col-3"><label>Faculyt/Department </label></div>
                <div class="col-9">: <?php echo $row['user_faculty'] ?></div>
            </div>
            <div class="row">
                <div class="col-3"><label>Email </label></div>
                <div class="col-9">: <?php echo $row['user_email'] ?></div>
            </div>
            <div class="row">
                <div class="col-3"><label class="name">Mobile No. </label></div>
                <div class="col-9">: <?php echo $row['user_mobile_num'] ?></div>
            </div>

            <?php
                if($row['user_status']=='Verified'){
                    echo'  <div class="row">';
                    echo'      <div class="col-3"><label class="name">Status </label></div>';
                    echo'     <div class="col-9">: <span class="Verified">VERIFIED</span></div> ';
                    echo'   </div>';
                }
            ?>
		</div>

		<!-- end card body -->
		<div class="card-footer">

			<button class="btn btn-secondary" name="editprofile" onclick="openProfile()">Edit Profile</button>
			<button class="btn btn-secondary" name="chgpass" onclick="openPass()">Change Password</button>
            <?php
                if($row['user_status']!='Verified'){
                    echo'<a href="_asset/pdf/pdf_gen.php?pi=1" target="_blank"><button class="btn btn-primary">Get Verified</button></a>';
                }
            ?>
		</div>



	</div>
	<!-- end card -->


</main>
<!-- SCRITP -->
<script type="text/javascript" src="_asset/js/edit_profile.js"></script>
    <!-- Script-->
    <script type="text/JavaScript">

    function openProfile() {
        document.getElementById("chgprofile").style.display = "block";
        document.getElementById("chgpass").style.display = "none";
    }
    function openPass() {
        document.getElementById("chgpass").style.display = "block";
        document.getElementById("chgprofile").style.display = "none";
    }
    function closePass() {
        document.getElementById("chgpass").style.display = "none";
    }
    function closeProfile() {
        document.getElementById("chgprofile").style.display = "none";
    }

    </script>
<?php }// end of session validation?>
</body>
</html>