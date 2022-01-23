<?php
require_once("../../../user/_asset/process/dbcontroller.php");
$db_handler = new DBController();
$conn=$db_handler->connectDB();
if(isset($_GET['action']))
{
    $action = $_GET['action'];
    switch($action){
        case 'read':
            if(isset($_GET['f_id'])){

                $f_id=$_GET['f_id'];
                $sql=mysqli_query($conn,"SELECT facility_id, facility_name, facility_working_hours, facility_desc, count(court_id) as court_qty
                FROM facility JOIN court USING(facility_id) 
                WHERE facility_id='$f_id' GROUP BY facility_id")or die(mysqli_error($conn));
                $row=mysqli_fetch_array($sql);
                $detail='<div class="card card-secondary">';
                $detail.='    <div class="card-header">';
                $detail.='      <h5><strong> #'.$row["facility_id"].' '.$row["facility_name"].'</strong></h5>';
                $detail.='    </div>';
                $detail.='  <div class="card-body">';
                $detail.='    <div class="row">';
                $detail.='    <div class="col">';
                $detail.='<div class="input-group">';
                $detail.='    <div class="col-3"><label>Working Hour</label></div>';
                $detail.='    <div class="col-3">: '.$row['facility_working_hours'] .'</div>';
                $detail.='</div>';
                $detail.='<div class="input-group">';
                $detail.='    <div class="col-3"><label>Total Court</label></div>';
                $detail.='    <div class="col-3">: '.$row['court_qty'] .'</div>';
                $detail.='</div>';
                $detail.='<div class="input-group">';
                $detail.='    <div class="col-3"><label>Description</label></div>';
                $detail.='    <div class="col-3">: '.$row['facility_desc'] .'</div>';
                $detail.='</div>';
                $detail.='</div>'; //end col left
                $court_array = $db_handler->runQuery("SELECT court_id, court_name
                FROM court JOIN facility USING(facility_id)
                WHERE facility_id='$f_id';");
    if (!empty($court_array)) { 

                $detail.='    <div class="col">';
                $detail.='<div class="input-group">';
                $detail.='<div class="col-3"><label class="name">Court(s)</label></div><br>';
                $detail.='</div>';

    foreach($court_array as $key=>$value){
                $detail.='<div class="input-group">';
                $detail.='<div class="col-1" style="margin-left: 2em;"><label class="name">'.$court_array[$key]["court_id"].'</label></div>';
                $detail.='<div class="col-9">'. $court_array[$key]["court_name"].'</div>'; 
                $detail.='</div>';          
        } //end for 
    } //end if

                $detail.='  </div>';//end col right
                $detail.='</div>';//end row
                $detail.='</div>';//end of card body
                $detail.='  <div class="card-footer">';
                $detail.='    <button class="btn btn-secondary" onclick="closeCard()">Close</button>';
                $detail.='  </div>';
                $detail.='</div>';

                echo $detail;
            };
            break;

            
            case 'edit':
                extract($_POST);
                if(isset($_POST['f_id']))
                {
                    $id = $_POST['f_id'];
                    $name = $_POST['name'];
                    $hour = $_POST['wHour'];
                    $desc = $_POST['desc'];

                    $sql = "UPDATE facility SET facility_name='$name', facility_working_hours='$hour' , facility_desc='$desc'
                    WHERE facility_id='$id'";
                    
                    if(!mysqli_query($conn,$sql)){
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    else{
                        header("Location: ../../facility.php");
                    }
                } else echo $_POST['equip_id'];
                break;


            case 'editForm':
                if(isset($_GET['f_id'])){
    
                    $f_id=$_GET['f_id'];
                    $sql=mysqli_query($conn,"SELECT facility_id, facility_name, facility_working_hours, facility_desc
                    FROM facility 
                    WHERE facility_id='$f_id'")or die(mysqli_error($conn));

                    $row=mysqli_fetch_array($sql);
                    $form='<div class="card card-secondary">';
                    $form.='    <div class="card-header">';
                    $form.='      <h5><strong> #'.$row["facility_id"].' '.$row["facility_name"].'</strong></h5>';
                    $form.='    </div>';
                    $form.='<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'?action=edit" method="POST">';
                    $form.='  <div class="card-body">';
                    $form.='    <input  type="hidden" class="form-control" value="'.$row["facility_id"] .'" name="f_id"/>';
                    $form.='<div class="input-group">';
                    $form.='    <div class="col-3"><label>Facility Name</label></div>';
                    $form.='    <div class="col-3"><input  type="text" class="form-control" value="'.$row["facility_name"] .'" name="name" Required/></div>';
                    $form.='</div><br>';
                    $form.='<div class="input-group">';
                    $form.='    <div class="col-3"><label>Working Hour</label></div>';
                    $form.='    <div class="col-3"><input  type="text" class="form-control" value="'.$row['facility_working_hours'] .'" name="wHour" Required/></div>';
                    $form.='</div><br>';
                    $form.='<div class="input-group">';
                    $form.='    <div class="col-3"><label>Description</label></div>';
                    $form.='    <div class="col-3"><input  type="text" class="form-control" value="'.$row['facility_desc']  .'" name="desc" Required/></div>';
                    $form.='</div><br>';
                    // $form.='<div class="input-group">';
                    // $form.='    <div class="col-3"><label>Court:</label></div>';
                    // $form.='    <div class="col-3"><button class="btn btn-primary"> Add</button></div>';
                    // $form.='</div>';
                    $form.='</div>';
                    $form.='  <div class="card-footer">';
                    $form.='    <button class="btn btn-danger" onclick="closeCard()">Cancel</button>';
                    $form.='    <button type="submit" class="btn btn-primary">Submit</button>';
                    $form.='  </div>';                    
                    $form.='</form>';
                    $form.='</div>';
    
                    echo $form;
                };
                break;//end editform

        case 'lockForm':
                $sql=mysqli_query($conn,"SELECT count(court_id) as cQty FROM court GROUP BY facility_id;")or die(mysqli_error($conn));
                $row=mysqli_fetch_array($sql);

                $form='<div class="card card-secondary">';
                $form.='    <div class="card-header">';
                $form.='      <h5><strong>Lock Facility or Single Court</strong></h5>';
                $form.='    </div>';
                $form.='<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'?action=lock" method="POST">';
                $form.='<div class="card-body">';


                $form.='<div class="input-group">';
                $form.='<div class="col-2"><label for="facility">Facility</label></div>';
                $form.='    <div class="col-3"><select id="facility" name="facility" class="form-control" >';
                $form.='<option value="none" selected disabled> --- Select Facility --- </option>';
                $facility_array = $db_handler->runQuery("SELECT facility_id, facility_name FROM facility JOIN court USING (facility_id)
                            GROUP BY facility_id HAVING COUNT(court_id) >= 1;");
                if (!empty($facility_array)) {
                    foreach($facility_array as $key=>$value){

                        $form.='<option value="'.$facility_array[$key]['facility_id'].'">'.$facility_array[$key]['facility_name'].'</option>';
                    }
                }
                $form.='    </select></div>';//end of choose facility

                $form.='<div class="col-1"><i>OR /  ATAU</i></div>';

                $form.='<div class="col-2"><label for="court">Court</label></div>';
                $form.='    <div class="col-3"><select id="court" name="court" class="form-control" >';
                $form.='<option value="none" selected disabled> --- Select Court --- </option>';
                $court_array = $db_handler->runQuery("SELECT court_id, court_name FROM court;");
                if (!empty($court_array)) {
                    foreach($court_array as $key=>$value){

                        $form.='<option value="'.$court_array[$key]['court_id'].'">'.$court_array[$key]['court_name'].'</option>';
                    }
                }
                $form.='    </select></div>';//end of choose court
                $form.=' </div><br>';

                $form.='    <div class="input-group">';
                $form.='        <div class="col-2"><label for="reservationDate">Reservation Date</label></div>';
                $form.='        <div class="col-6"><input type="date" class="form-control" name="reservationDate" required/></div>';
                $form.='    </div><br>';

                $form.='    <div class="input-group">';
                $form.='        <div class="col-2"><label class="name">Remark</label></div>';
                $form.='        <div class="col-6"><textarea name="remark" class="form-control" style="width:500px;" required></textarea></div>';
                $form.='    </div><br>';

                $form.='    <div class="input-group">';
                $form.='         <div class="col-2"><label class="" name="type">Type</label></div>';
                $form.='         <div class="col-6"><select id="type" class="form-control" name="type">';
                $form.='         <option value="99999999">Event</option>';
                $form.='         <option value="88888888">Maintenance</option>';
                $form.='    </select></div><br>';
                $form.='    </div>';

                $form.='  </div>';//end of card body
                $form.='  <div class="card-footer">';
                $form.='    <button class="btn btn-danger" onclick="closeCard()">Cancel</button>';
                $form.='    <button class="btn btn-primary"> Submit </button>';
                $form.='  </div>';
                $form.='</form>';
                $form.='</div>';

                echo $form;
?>
<!-- facility -->
<script type="text/javascript">
$(document).ready(function() {

    $('#facility').change(function(event) {

        $("#court").val('none');
    });

    $('#court').change(function(event) {

        $("#facility").val('none');
    });
});
</script>
<?php                   break;
    
        case 'lock':
            extract($_POST);
            if(isset($_POST['type']))
            {
                date_default_timezone_set('Asia/Kuala_Lumpur');
                $datetime = date('Y-m-d H:i:s', time());
                $rsvp_date = $_POST['reservationDate'];
                $remark = $_POST['remark'];
                $type = $_POST['type'];
                $slot_time = array('1000-1100','1100-1200','1200-1300','1300-1400','1400-1500','1500-1600','1700-1800','1900-2000','2000-2100');

                if(isset($_POST['facility']))
                {
                    $fid = $_POST['facility'];
                    $facility_array = $db_handler->runQuery("SELECT court_id FROM court WHERE facility_id='".$fid."';");
                    if (!empty($facility_array)) {
                        foreach($facility_array as $key=>$value){

                            $cid=$facility_array[$key]['court_id'];
                            foreach($slot_time as $slot){   

                                $sql = "INSERT INTO reservation (court_id, user_id, reservation_submit, reservation_edit, reservation_date, reservation_slot, reservation_status, reservation_remark) 
                                VALUES ('$cid', '$type', '$datetime', '$datetime', '$rsvp_date', '$slot', 'Approved', '$remark')";

                                if(!mysqli_query($conn,$sql)){
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                }
                            }
                        }
                    }
                    header("Location: ../../facility.php?done");
                }
                else if(isset($_POST['court']))
                {
                    $cid = $_POST['court'];
                    foreach($slot_time as $slot){   

                        $sql = "INSERT INTO reservation (court_id, user_id, reservation_submit, reservation_edit, reservation_date, reservation_slot, reservation_status, reservation_remark) 
                        VALUES ('$cid', '$type', '$datetime', '$datetime', '$rsvp_date', '$slot', 'Approved', '$remark')";

                        if(!mysqli_query($conn,$sql)){
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    }
                    header("Location: ../../facility.php?done");
                }
                else {
                    echo"POST MISSING";
                     break;
                }
                
            }
            echo"POST TYPE MISSING";
            break;

            case 'remove':
                extract($_POST);
                
                if(isset($_POST['cid']))
                {
                    $cid = $_POST['cid'];
                    $date = $_POST['date'];
                    $uid = $_POST['uid'];
                    $sql = "DELETE FROM reservation WHERE court_id='$cid' AND reservation_date='$date' AND user_id='$uid'";
                    
                    if(!mysqli_query($conn,$sql)){
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    else{
                        header("Location: ../../facility.php?done");
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