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
        
            case 'new':
                extract($_POST);
                if(isset($_POST['equip_name']))
                {
                    $name = $_POST['equip_name'];
                    $desc = $_POST['equip_desc'];
                    $total = $_POST['equip_total'];
                    $bal = $_POST['equip_bal'];
                    
                    if($bal==0){$bal=$total;}

                    $sql = "INSERT INTO equipment ( equipment_name,equipment_desc,equipment_total,equipment_balance )
                    VALUES ('$name ','$desc','$total','$bal')";
                    
                    if(!mysqli_query($conn,$sql)){
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    else{
                        header("Location: ../../equipment.php");
                    }
                }
                break;

            case 'newForm':

                $form='<div class="card card-secondary">';
                $form.='    <div class="card-header">';
                $form.='      <h5><strong>New Equipment</strong></h5>';
                $form.='    </div>';
                $form.='<form action="_asset/process/equip_ctrl.php?action=new" method="POST">';
                $form.='  <div class="card-body">';
                $form.='<div class="input-group">';
                $form.='    <div class="col-2"><label>Equipment </label></div>';
                $form.='    <div class="col-9"><input type="text" class="form-control" name="equip_name" required/></div>';
                $form.='</div><br>';
                $form.='<div class="input-group">';
                $form.='    <div class="col-2"><label>Description </label></div>';
                $form.='    <div class="col-9"><input type="text" class="form-control" name="equip_desc" required/></div>';
                $form.='</div><br>';
                $form.='<div class="input-group">';
                $form.='    <div class="col-2"><label>Total </label></div>';
                $form.='    <div class="col-3"><input type="number" class="form-control" name="equip_total" min="0" required/></div>';
                $form.='    <div class="col-2"><label>Stock Left </label></div>';
                $form.='    <div class="col-3"><input type="number" class="form-control" name="equip_bal" min="0" /></div>';
                $form.='</div>';
                $form.='  </div>';//end of card body
                $form.='  <div class="card-footer">';
                $form.='    <button class="btn btn-danger" onclick="closeCard()">Cancel</button>';
                $form.='    <input type="submit" class="btn btn-primary"/>';
                $form.='  </div>';
                $form.='</div>';

                echo $form;
            break;

            case 'edit':
                extract($_POST);
                if(isset($_POST['equip_id']))
                {
                    $epd_id = $_POST['equip_id'];
                    $name = $_POST['equip_name'];
                    $desc = $_POST['equip_desc'];
                    $total = $_POST['equip_total'];
                    $bal = $_POST['equip_bal'];

                    $sql = "UPDATE equipment SET equipment_name='$name', equipment_desc='$desc' , equipment_total='$total' ,equipment_balance='$bal'
                    WHERE equipment_id='$epd_id'";
                    
                    if(!mysqli_query($conn,$sql)){
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    else{
                        header("Location: ../../equipment.php");
                    }
                } else echo $_POST['equip_id'];
                break;

            case 'editForm':
                if(isset($_GET['eqp_id'])){
    
                    $eid=$_GET['eqp_id'];
                    $sql=mysqli_query($conn,"SELECT * 
                    FROM equipment WHERE equipment_id='$eid'") or die(mysqli_error($conn));
                    $row=mysqli_fetch_array($sql);
                    $form='<div class="card card-secondary">';
                    $form.='    <div class="card-header">';
                    $form.='      <h5><strong>Equipment #'.$row["equipment_id"].'</strong></h5>';
                    $form.='    </div>';
                    $form.='<form action="_asset/process/equip_ctrl.php?action=edit" method="POST">';
                    $form.='    <input type="hidden" name="equip_id" value="'.$row['equipment_id'] .'"/>';
                    $form.='  <div class="card-body">';
                    $form.='<div class="input-group">';
                    $form.='    <div class="col-2"><label>Equipment </label></div>';
                    $form.='    <div class="col-9"><input type="text" class="form-control" name="equip_name" value="'.$row['equipment_name'] .'"/></div>';
                    $form.='</div><br>';
                    $form.='<div class="input-group">';
                    $form.='    <div class="col-2"><label>Description </label></div>';
                    $form.='    <div class="col-9"><input type="text" class="form-control" name="equip_desc" value="'.$row['equipment_desc'] .'"/></div>';
                    $form.='</div><br>';
                    $form.='<div class="input-group">';
                    $form.='    <div class="col-2"><label>Total </label></div>';
                    $form.='    <div class="col-3"><input type="number" class="form-control" name="equip_total" min="0" value="'.$row['equipment_total'] .'"/></div>';
                    $form.='    <div class="col-2"><label>Stock Left </label></div>';
                    $form.='    <div class="col-3"><input type="number" class="form-control" name="equip_bal" min="0" value="'.$row['equipment_balance'] .'"/></div>';
                    $form.='</div>';
    
                    $form.='  </div>';//end of card body
                    $form.='  <div class="card-footer">';
                    $form.='    <button class="btn btn-danger" onclick="closeCard()">Close</button>';
                    $form.='    <button class="btn btn-secondary" onclick="removeIt('.$row["equipment_id"].')">Delete</button>';
                    $form.='    <input type="submit" class="btn btn-primary"/>';
                    $form.='  </div>';
                    $form.='</div>';
    
                    echo $form;
                }
                break;
    
        case 'remove':
            extract($_POST);
            if(isset($_POST['epd_id']))
            {
                $epd_id = $_POST['epd_id'];
                $sql = "DELETE FROM equipment
                WHERE equipment_id='$epd_id'";
                
                if(!mysqli_query($conn,$sql)){
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                else{
                    header("Location: ../../equipment.php"); 
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
