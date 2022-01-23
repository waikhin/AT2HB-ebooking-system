<?php
require_once("dbcontroller.php");
$db_handler = new DBController();
$conn=$db_handler->connectDB();
if(isset($_GET['action']))
{
    $action = $_GET['action'];
    switch($action){
    
        case 'update':
            extract($_POST);
            if(isset($_POST['rid']))
            {
                date_default_timezone_set('Asia/Kuala_Lumpur');
                $datetime = date('Y-m-d H:i:s', time());
                $rid = $_POST['rid'];
                $rst = $_POST['rst'];
                $sql = "UPDATE reservation SET reservation_status='$rst', reservation_edit='$datetime'
                WHERE reservation_id='$rid'";
                
                if(!mysqli_query($conn,$sql)){
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                else{
                    header("Location: ../check_booking.php");
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
