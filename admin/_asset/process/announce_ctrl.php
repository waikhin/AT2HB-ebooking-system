<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AT2HB | Booking Request</title>
  <link rel="shortcut icon" href="../img/favicon.ico"/>
</head>
</html>
<?php
require_once("../../../user/_asset/process/dbcontroller.php");
$db_handler = new DBController();
$conn=$db_handler->connectDB();
if(isset($_GET['action']))
{
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $datetime = date('Y-m-d H:i:s', time());
    $action = $_GET['action'];
    switch($action){
        case 'announce':
            extract($_POST);
            if(isset($_POST['remark']))
            {
                $detail = $_POST['remark'];
                $sql = "INSERT INTO announcement ( announcement_submit,announcement_detail )
                VALUES ('$datetime','$detail')";
                
                if(!mysqli_query($conn,$sql)){
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                else{
                    header("Location: ../../announcement.php");
                }
            }
            break;

        case 'announceForm':

                $form='<div class="card card-secondary">';
                $form.='    <div class="card-header">';
                $form.='      <h5><strong>Make A New Annoucement</strong></h5>';
                $form.='    </div>';
                $form.='<form action="_asset/process/announce_ctrl.php?action=announce" onsubmit="return isValid()" method="POST">';
                $form.='  <div class="card-body">';
                $form.='    <div class="form-group">';
                $form.='        <div class="col-2"><label class="name">Announcment Details</label></div>';
                $form.='        <div class="col-9"> <textarea name="remark" id="remark" class="form-control"  style="height:100px;" required></textarea></div>';
                $form.='    </div>';
                $form.='  </div>';//end of card body
                $form.='  <div class="card-footer">';
                $form.='    <button class="btn btn-danger" onclick="closeCard()">Cancel</button>';
                $form.='    <input type="submit" class="btn btn-primary"/>';
                $form.='  </div>';
                $form.='</form>';
                $form.='</div>';
                echo $form;
            break;
    
        case 'remove':
            extract($_POST);
            if(isset($_POST['rid']))
            {
                $rid = $_POST['rid'];
                $sql = "DELETE FROM announcement
                WHERE announcement_id='$rid'";
                
                if(!mysqli_query($conn,$sql)){
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                else{
                    header("Location: ../../announcement.php"); 
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
<script type="text/javascript">

function closeCard(str){
    $("#detail").html('');
    return;     
}

function isValid(){

    var rm=document.getElementById('remark').value;
    
    if(rm!=""){return true}
    else{
        alert('Cannot be Empty');
    }
    return false;
}
</script>
