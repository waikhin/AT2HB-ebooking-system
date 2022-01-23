<?php
require_once("dbcontroller.php");
$db_handler = new DBController();
$conn=$db_handler->connectDB();

if (session_status() == PHP_SESSION_NONE) 
{
session_start();
}

if(isset($_SESSION['id']))
{
    $uid=$_SESSION['id'];
}
$sql = mysqli_query($conn,"SELECT user_password, user_faculty, user_mobile_num FROM user WHERE user_id='$uid'");
$row  = mysqli_fetch_assoc($sql);

if(isset($_POST['chgprofile']))
{
    extract($_POST);
    $faculty  = $_POST['faculty'];
    $phonenum = $_POST['phonenum'];

    if($phonenum==''){
        $phonenum=$row['user_mobile_num'];
    }
    if($faculty==''){
        $faculty=$row['user_faculty'];
    }

    $chgprofile = mysqli_query($conn,"UPDATE user SET user_faculty='$faculty', user_mobile_num='$phonenum' WHERE user_id='$uid'"); 

    if($chgprofile)
    {
        mysqli_close($conn);
        header("Location: ../../user_profile.php?msg=Profile Update!"); // redirects to all records page
        exit;
    }
    else
    {
        header("Location: ../../user_profile.php?err=Somethig Wrong... Try Again Later...");
    }
}


?>