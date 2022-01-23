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
    $action = $_GET['action'];
    switch($action){
        case 'read':
            if(isset($_GET['rsvp_id'])){

                $rid=$_GET['rsvp_id'];
                $sql=mysqli_query($conn,"SELECT * 
                FROM reservation JOIN user USING(user_id) JOIN court USING(court_id) 
                WHERE reservation_id='$rid'")or die(mysqli_error($conn));
                $row=mysqli_fetch_array($sql);

                $detail='<div class="card card-secondary">';
                $detail.='    <div class="card-header">';
                $detail.='      <h5><strong>Reservation #'.$row["reservation_id"].'</strong></h5>';
                $detail.='    </div>';
                $detail.='  <div class="card-body">';
                $detail.='<div class="input-group">';
                $detail.='    <div class="col-3"><label>Faculyt/Department </label></div>';
                $detail.='    <div class="col-9">: '.$row['user_faculty'] .'</div>';
                $detail.='</div>';
                $detail.='    <div class="input-group">';
                $detail.='    <div class="col-3"><label>User ID </label></div>';
                $detail.='    <div class="col-3">: '.$row['user_id'] .'</div>';
                $detail.='    <div class="col-3"><label>Full Name </label></div>';
                $detail.='    <div class="col-3">: '.$row['user_name'] .'</div>';
                $detail.='</div>';
                $detail.='<div class="input-group">';
                $detail.='    <div class="col-3"><label>Email </label></div>';
                $detail.='    <div class="col-3">: '.$row['user_email'] .'</div>';
                $detail.='    <div class="col-3"><label class="name">Mobile No. </label></div>';
                $detail.='    <div class="col-3">: '.$row['user_mobile_num'] .'</div>';
                $detail.='</div>';
                $detail.='    <div class="input-group">';
                $detail.='        <div class="col-3"><label>Submitted Date Time</label></div>';
                $detail.='        <div class="col-3">: '.$row["reservation_submit"].'</div>';
                $detail.='        <div class="col-3"><label>Last Edited Time</label></div>';
                $detail.='        <div class="col-3">: '.$row["reservation_edit"].'</div>';
                $detail.='    </div>';
                $detail.='    <div class="input-group">';
                $detail.='        <div class="col-3"><label>Court</label></div>';
                $detail.='        <div class="col-3">: '.$row["court_name"].'</div>';
                $detail.='         <div class="col-3"><label class="name">Status</label></div>';
                $detail.='         <div class="col-3">: <span class="'.$row["reservation_status"] .'">'. $row["reservation_status"].'</span></div>';
                $detail.='    </div>';
                $detail.='    <div class="input-group">';
                $detail.='        <div class="col-3"><label>Reservation Date</label></div>';
                $detail.='        <div class="col-3">: '.$row["reservation_date"].'</div>';
                $detail.='        <div class="col-3"><label>Slot</label></div>';
                $detail.='        <div class="col-3">: '.$row["reservation_slot"].'</div>';
                $detail.='    </div>';
                $detail.='    <div class="input-group">';
                $detail.='        <div class="col-3"><label class="name">Remark</label></div>';
                $detail.='        <div class="col-9">: '.$row["reservation_remark"].'</div>';
                $detail.='    </div>';


                $rsvp_id=$row['reservation_id'];
                $equip_array = $db_handler->runQuery("SELECT equipment_id,equipment_name,equipment_qty
                FROM reservation_addon JOIN equipment USING(equipment_id)
                WHERE reservation_id='$rsvp_id';");
    if (!empty($equip_array)) { 

                $detail.='<div class="input-group">';
                $detail.='<div class="col-3"><label class="name">Equipement(s)</label></div><br>';
                $detail.='</div>';

    foreach($equip_array as $key=>$value){
                $detail.='<div class="input-group">';
                $detail.='<div class="col-1" style="margin-left: 2em;"><label class="name">'.$equip_array[$key]["equipment_name"].'</label></div>';
                $detail.='<div class="col-9">'. $equip_array[$key]["equipment_qty"].'</div>'; 
                $detail.='</div>';          
        } //end for 
    } //end if;
                $detail.='  </div>';//end of card body
                $detail.='  <div class="card-footer">';
                $detail.='    <button class="btn btn-secondary" onclick="closeCard()">Close</button>';
                $detail.='  </div>';
                $detail.='</div>';

                echo $detail;
            };
            break;

            
        case 'newForm':

                $form='<div class="card card-secondary">';
                $form.='    <div class="card-header">';
                $form.='      <h5><strong>New Booking</strong></h5>';
                $form.='    </div>';
                $form.='<form action="_asset/process/booking_ctrl.php?action=add" method="POST">';
                $form.='<div class="card-body">';
                $form.='<div class="input-group">';
                $form.='    <div class="col-3"><label>Faculyt/Department </label></div>';
                $form.='<div class="col-6"><select  id="Faculty" class="form-control" name="Faculty" required>';
                $form.='    <option value="none" disabled selected>---Select Faculty---</option>';
                $form.='    <option value= "Faculty of Resource Science and Technology">Faculty of Resource Science and Technology</option>';
                $form.='    <option value= "Faculty of Social Sciences & Humanites">Faculty of Social Sciences & Humanites</option>';
                $form.='    <option value= "Faculty of Cognitive Sciences and Human Devlopment">Faculty of Cognitive Sciences and Human Devlopment</option>';
                $form.='    <option value= "Faculty of Applied and Creative Arts">Faculty of Applied and Creative Arts</option>';
                $form.='    <option value= "Faculty of Engineering">Faculty of Engineering</option>';
                $form.='    <option value= "Faculty of Computer Science and Information Technology">Faculty of Computer Science and Information Technology</option>';
                $form.='    <option value= "Faculty of Medicine and Health Sciences">Faculty of Medicine and Health Sciences</option>';
                $form.='    <option value= "Faculty of Economics and Business">Faculty of Economics and Business</option>';
                $form.='    <option value= "Faculty of Built Environment">Faculty of Built Environment</option>';
                $form.='    <option value= "Faculty of Language and Communication">Faculty of Language and Communication</option>';
                $form.='</select></div>';
                $form.='</div><br>';
                $form.='    <div class="input-group">';
                $form.='    <div class="col-1"><label>User ID </label></div>';
                $form.='    <div class="col-2"><input type="text" class="form-control" name="reservation_date" required/></div>';
                $form.='    <div class="col-1"><label>Full Name </label></div>';
                $form.='    <div class="col-5"><input type="text" class="form-control" name="reservation_date" required/></div>';
                $form.='</div><br>';
                $form.='<div class="input-group">';
                $form.='    <div class="col-1"><label class="name">Mobile No. </label></div>';
                $form.='    <div class="col-2"><input type="text" class="form-control" name="reservation_date" required/></div>';
                $form.='    <div class="col-1"><label>Email </label></div>';
                $form.='    <div class="col-5"><input type="text" class="form-control" name="reservation_date" required/></div>';
                $form.='</div><br>';
                $form.='    <div class="input-group">';
                $form.='        <div class="col-3"><label>Court</label></div>';
                $form.='        <div class="col-6"><select class="form-control"  id="court" name="court" required>';
                $court_array=$db_handler->runQuery("SELECT  court_id,court_name FROM court;");
                if (!empty($court_array)) {
                        foreach($court_array as $key=>$value){
                $form.= "       <option value='".$court_array[$key]['court_id']."'>".$court_array[$key]['court_name']."</option>";
                        }
                    }
                $form.='    </select></div>';
                $form.='    </div><br>';// end of court

                $form.='    <div class="input-group">';
                $form.='        <div class="col-3"><label for="reservation_date">Reservation Date</label></div>';
                $form.='        <div class="col-6"><input type="date" class="form-control" name="reservation_date" required/></div>';
                $form.='    </div><br>';

                $form.='    <div class="input-group">';
                $form.='        <div class="col-3"><label>Slot</label></div>';
                $slot_time = array('1000-1100','1100-1200','1200-1300','1300-1400','1400-1500','1500-1600','1700-1800','1900-2000','2000-2100');
                $form.='        <div class="col-6"><select id="slot" class="form-control" name="slot" required>';
                foreach($slot_time as $slot){ 
                $form.='        <option value="'.$slot.'">'.$slot.'</option>';    
                }
                $form.='    </select></div>';
                $form.='    </div><br>';//end of slot

                $form.='    <div class="input-group">';
                $form.='        <div class="col-3"><label class="name">Remark</label></div>';
                $form.='        <div class="col-6"><textarea name="remark" class="form-control" style="width:450px;" required></textarea></div>';
                $form.='    </div><br>';

                $form.='    <div class="input-group">';
                $form.='         <div class="col-3"><label class="name">Status</label></div>';
                $form.='         <div class="col-6"><select id="status" class="form-control" name="status" required>';
                $form.='         <option value="Approved">Approved</option>';
                $form.='         <option value="Completed">Completed</option>';
                $form.='         <option value="Cancelled">Cancelled</option>';
                $form.='         <option value="Rejected">Rejected</option>';
                $form.='         <option value="NoShow">NoShow</option>';
                $form.='    </select></div><br>';
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

            case 'editForm':
                if(isset($_GET['rsvp_id'])){
    
                    $rid=$_GET['rsvp_id'];
                    $sql=mysqli_query($conn,"SELECT * 
                    FROM reservation JOIN user USING(user_id) JOIN court USING(court_id)
                    WHERE reservation_id='$rid'")or die(mysqli_error($conn));
                    $row=mysqli_fetch_array($sql);
    
                $form='<div class="card card-secondary">';
                $form.='    <div class="card-header">';
                $form.='      <h5><strong>Reservation #'.$row["reservation_id"].'</strong></h5>';
                $form.='    </div>';
                $form.='<form action="_asset/process/booking_ctrl.php?action=edit" method="POST">';
                $form.='<div class="card-body">';
                $form.='<div class="input-group">';
                $form.='    <div class="col-3"><label>Faculyt/Department </label></div>';
                $form.='    <div class="col-9">: '.$row['user_faculty'] .'</div>';
                $form.='</div>';
                $form.='<div class="input-group">';
                $form.='    <div class="col-3"><label>User ID </label></div>';
                $form.='    <div class="col-3">: '.$row['user_id'] .'</div>';
                $form.='    <div class="col-2"><label>Full Name </label></div>';
                $form.='    <div class="col-3">: '.$row['user_name'] .'</div>';
                $form.='</div>';
                $form.='<div class="input-group">';
                $form.='    <div class="col-3"><label>Email </label></div>';
                $form.='    <div class="col-3">: '.$row['user_email'] .'</div>';
                $form.='    <div class="col-2"><label class="name">Mobile No. </label></div>';
                $form.='    <div class="col-3">: '.$row['user_mobile_num'] .'</div>';
                $form.='</div>';
                $form.='<div class="input-group">';
                $form.='        <div class="col-3"><label>Submitted Date Time</label></div>';
                $form.='        <div class="col-3">: '.$row["reservation_submit"].'</div>';
                $form.='        <div class="col-2"><label>Last Edited Time</label></div>';
                $form.='        <div class="col-3">: '.$row["reservation_edit"].'</div>';
                $form.='</div>';
                $form.='<div class="input-group">';
                $form.='        <div class="col-3"><label>Court</label></div>';
                $form.='        <div class="col-6"><select class="form-control"  id="court" name="court">';
                $form.= "       <option value='".$row['court_id']."' selected>".$row['court_name']."</option>";
                $cid=$row['court_id'];
                $court_array=$db_handler->runQuery("SELECT  court_id,court_name FROM court WHERE court_id!=$cid;");
                if (!empty($court_array)) {
                        foreach($court_array as $key=>$value){
                $form.= "       <option value='".$court_array[$key]['court_id']."'>".$court_array[$key]['court_name']."</option>";
                        }
                    }
                $form.='    </select></div>';
                $form.='    </div><br>';// end of court

                $form.='    <div class="input-group">';
                $form.='        <div class="col-3"><label for="reservationDate">Reservation Date</label></div>';
                $form.='        <div class="col-6"><input type="date" class="form-control" name="reservationDate" value="'.$row["reservation_date"].'"/></div>';
                $form.='    </div><br>';

                $form.='    <div class="input-group">';
                $form.='        <div class="col-3"><label>Slot</label></div>';
                $slot_time = array('1000-1100','1100-1200','1200-1300','1300-1400','1400-1500','1500-1600','1700-1800','1900-2000','2000-2100');
                $form.='        <div class="col-6"><select id="slot" name="slot" class="form-control" >';
                $form.='        <option value="'.$row["reservation_slot"].' selected">'.$row["reservation_slot"].'</option>';
                foreach($slot_time as $slot){ 
                $form.='        <option value="'.$slot.' selected">'.$slot.'</option>';    
                }
                $form.='    </select></div>';
                $form.='    </div><br>';//end of slot

                $form.='    <div class="input-group">';
                $form.='        <div class="col-3"><label class="name">Remark</label></div>';
                $form.='        <div class="col-6"><textarea name="remark" class="form-control" style="width:450px;">'.$row["reservation_remark"].'</textarea></div>';
                $form.='    </div><br>';

                $form.='    <div class="input-group">';
                $form.='         <div class="col-3"><label class="name">Status</label></div>';
                $form.='         <div class="col-6"><select id="status" class="form-control" name="status">';
                $form.='         <option value="Approved">Approved</option>';
                $form.='         <option value="Completed">Completed</option>';
                $form.='         <option value="Cancelled">Cancelled</option>';
                $form.='         <option value="Rejected">Rejected</option>';
                $form.='         <option value="NoShow">NoShow</option>';
                $form.='    </select></div><br>';
                $form.='    </div>';
                $form.='  </div>';//end of card body
                $form.='  <div class="card-footer">';
                $form.='    <button class="btn btn-danger" onclick="closeCard()">Cancel</button>';
                $form.='    <input type="submit" class="btn btn-primary"/>';
                $form.='  </div>';
                $form.='</form>';
                $form.='</div>';

                echo $form;
    
                }
                break;
    
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
                    header("Location: ../../../user/_asset/pdf/mail_invoice.php?rid1=".$rid);
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
