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
$sql = mysqli_query($conn,"SELECT user_password FROM user WHERE user_id='$uid'");
$row  = mysqli_fetch_array($sql);

if(isset($_POST['chgpass']))
{
    extract($_POST);
    $currentpass  = $_POST['currentpass'];
    $npass  = $_POST['newpass'];
    $cnpass = $_POST['cnewpass'];
    if(is_array($row))
    {
        if($currentpass == $row['user_password'])
        {
           $chgpass = mysqli_query($conn,"UPDATE user SET user_password=md5('$cnpass') WHERE user_id='$uid'"); 
        }
        else
        {
            echo mysqli_error($conn);
        }
        
    }

    if($chgpass)
    {
        mysqli_close($conn);
        header("Location: ../../user_profile.php?msg=Password Changed!"); // redirects to all records page
        exit;
    }
    else
    {
        header("Location: ../../user_profile.php?err=Wrong Password!"); 
    }
}


?>