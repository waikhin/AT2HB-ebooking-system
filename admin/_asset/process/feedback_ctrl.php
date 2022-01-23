<?php
require_once("../../../user/_asset/process/dbcontroller.php");
$db_handler = new DBController();
$conn=$db_handler->connectDB();
if(isset($_GET['action']))
{

    $action = $_GET['action'];
    switch($action){
        
        case 'remove':
            extract($_POST);
            if(isset($_POST['feedback_id']))
            {
                $fid = $_POST['feedback_id'];
                $sql = "DELETE FROM feedback
                WHERE feedback_id='$fid'";
                
                if(!mysqli_query($conn,$sql)){
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                else{
                    header("Location: ../../feedback.php"); 
                }
            }
            break;

        default:
        echo "<script>alert('ERROR');</script>";
            break;
    }
}
else echo "<script>alert('GET MISSING');</script>";
?>
