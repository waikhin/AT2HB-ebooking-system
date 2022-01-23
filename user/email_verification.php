<?php

if(isset($_GET['key']))
{
    require_once("_asset/process/dbcontroller.php");
    $db_handler = new DBController();
    $conn=$db_handler->connectDB();

    $uid = $_GET['id'];
    $key = $_GET['key'];

    $sql = mysqli_query($conn,"SELECT user_id,user_status FROM user WHERE user_id='$uid'");
    $row  = mysqli_fetch_array($sql);
    $user_id=$row['user_id'];
    $user_stat=$row['user_status'];

    if($user_stat=='Verified'){
        header("Location: login.php?error=Your Account is already verified");
    }

    if($user_id==$uid && $user_stat==$key)
    {
        $sql = "UPDATE user SET user_status='Verified' WHERE user_id='$user_id'";
        
        if(!mysqli_query($conn,$sql)){
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        else{
            header("Location: login.php?error=Verified Succesful"); 
        }
    }
    else 
    {
        echo "Error";
    }
}
?>