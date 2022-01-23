<?php
session_start();

if(isset($_POST['submit']))
{
    extract($_POST);
    require_once("../../../user/_asset/process/dbcontroller.php");
    $db_handler = new DBController();
    $conn=$db_handler->connectDB();
    $uid = $_POST['Id'];
    $pass = $_POST['pass'];
    $sql = mysqli_query($conn,"SELECT admin_id FROM admin WHERE admin_id='$uid' AND admin_password='$pass'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {

        $_SESSION["rand4ever"]=$row['admin_id'];
        header("Location: ../../dashboard.php"); 
    }
    else 
    {

        header("Location: ../../index.php?badcredential&error=Check your ID OR password!!!");
    }
}
?>