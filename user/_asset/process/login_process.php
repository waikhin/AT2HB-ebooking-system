<?php
session_start();

if(isset($_POST['submit']))
{
    extract($_POST);
    require_once("dbcontroller.php");
    $db_handler = new DBController();
    $conn=$db_handler->connectDB();
    $uid = $_POST['Id'];
    $pass = $_POST['pass'];
    $sql = mysqli_query($conn,"SELECT user_id,user_type,user_status FROM user WHERE user_id='$uid' AND user_password=md5('$pass')");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $stat=$row['user_status'];
        if($stat!='Verified'){
            header("Location: ../../login.php?badcredential&msg=Please go to your email to verify :)");
        }
        else{
            $_SESSION["id"]=$row['user_id'];
            $_SESSION["type"]=$row['user_type'];
            header("Location: ../../index.php"); 
        }
    }
    else 
    {
        header("Location: ../../login.php?badcredential&error=Check your ID OR password!!!");
    }
}
?>