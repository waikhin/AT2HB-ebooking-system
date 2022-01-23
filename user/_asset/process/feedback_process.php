<?php
extract($_POST);
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
else
{
    $uid='annonymous';
}
$Name = $_POST['name'];
$Email = $_POST['email'];
$Type = $_POST['type'];
$Subject = $_POST['subject'];
$Message = $_POST['message'];
$date = date('Y-m-d H:i:s');

$sql = "INSERT INTO feedback (user_id,feedback_type, feedback_subject, feedback_datetime, feedback_detail) 
VALUES ('$uid', '$Type', '$Subject', '$date', '$Message')"; 

if(!mysqli_query($conn,$sql))
{
    header("Location: ../../index.php?error=Failed!");
}
else
{
    header("Location: ../../index.php");
}
?>