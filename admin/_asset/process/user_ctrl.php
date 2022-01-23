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

            case 'read':
                if(isset($_GET['user_id'])){
    
                    $uid=$_GET['user_id'];
                    $sql=mysqli_query($conn,"SELECT user_faculty,user_id,user_name,user_mobile_num,user_email, user_status
                    FROM  user 
                    WHERE user_id='$uid'")or die(mysqli_error($conn));
                    $row=mysqli_fetch_array($sql);

                    $sql2=mysqli_query($conn,"SELECT COUNT(user_id) as book_qty FROM  reservation                     
                    WHERE user_id='$uid'")or die(mysqli_error($conn));
                    $row2=mysqli_fetch_array($sql2);
                    
    
                    $detail='<div class="card card-secondary">';
                    $detail.='    <div class="card-header">';
                    $detail.='      <h5><strong>User Profile</strong></h5>';
                    $detail.='    </div>';
                    $detail.='  <div class="card-body">';
                    $detail.='<div class="input-group">';
                    $detail.='    <div class="col-3"><label>Faculyt/Department </label></div>';
                    $detail.='    <div class="col-9">: '.$row['user_faculty'] .'</div>';
                    $detail.='</div>';
                    $detail.='<div class="input-group">';
                    $detail.='    <div class="col-3"><label>User ID </label></div>';
                    $detail.='    <div class="col-3">: '.$row['user_id'] .'</div>';
                    $detail.='</div>';
                    $detail.='<div class="input-group">';
                    $detail.='    <div class="col-3"><label>Full Name </label></div>';
                    $detail.='    <div class="col-3">: '.$row['user_name'] .'</div>';
                    $detail.='</div>';
                    $detail.='<div class="input-group">';
                    $detail.='    <div class="col-3"><label>Email </label></div>';
                    $detail.='    <div class="col-3">: '.$row['user_email'] .'</div>';
                    $detail.='</div>';
                    $detail.='<div class="input-group">';
                    $detail.='    <div class="col-3"><label class="name">Mobile No. </label></div>';
                    $detail.='    <div class="col-3">: '.$row['user_mobile_num'] .'</div>';
                    $detail.='</div>';
                    $detail.='    <div class="input-group">';
                    $detail.='        <div class="col-3"><label class="name">Status</label></div>';
                    $detail.='        <div class="col-3">: '.$row["user_status"].'</div>';
                    $detail.='</div>';
                    $detail.='<div class="input-group">';
                    $detail.='        <div class="col-3"><label class="name">Total Booking Made</label></div>';
                    $detail.='        <div class="col-3">: '.$row2["book_qty"].'</div>';
                    $detail.='    </div>';                 
                    $detail.='  </div>';//end of card body
                    $detail.='  <div class="card-footer">';
                    $detail.='    <button class="btn btn-secondary" onclick="closeCard()">Close</button>';
                    $detail.='  </div>';
                    $detail.='</div>';
    
                    echo $detail;
                }
                else echo 'MISSING ID';
                break;


                case 'newForm':
        
                        $form='<div class="card card-secondary">';
                        $form.='    <div class="card-header">';
                        $form.='      <h5><strong>User Profile</strong></h5>';
                        $form.='    </div>';
                        $form.='<form action="../user/_asset/process/reg_process.php" method="POST">';
                        $form.='  <div class="card-body">';
                        $form.='<div class="input-group">';
                        $form.='    <div class="col-3"><label>Role </label></div>';
                        $form.='    <div class="col-3">
                                    <select  id="role"class="form-control" name="role">
                                        <option value="none" disabled selected>---Select Role---</option>
                                        <option value= "Student">Student</option>
                                        <option value= "Staff">Staff</option>
                                        <option value= "Guest" disabled>Guest</option>
                                    </select>
                                </div>';
                        $form.='</div><br>';
                        $form.='<div class="input-group">';
                        $form.='    <div class="col-3"><label>Faculyt/Department </label></div>';
                        $form.='    <div class="col-6">
                                    <select  id="Faculty"class="form-control" name="Faculty">
                                        <option value="none" disabled selected>---Select Faculty---</option>
                                        <option value= "Faculty of Resource Science and Technology">Faculty of Resource Science and Technology</option>
                                        <option value= "Faculty of Social Sciences & Humanites">Faculty of Social Sciences & Humanites</option>
                                        <option value= "Faculty of Cognitive Sciences and Human Devlopment">Faculty of Cognitive Sciences and Human Devlopment</option>
                                        <option value= "Faculty of Applied and Creative Arts">Faculty of Applied and Creative Arts</option>
                                        <option value= "Faculty of Engineering">Faculty of Engineering</option>
                                        <option value= "Faculty of Computer Science and Information Technology">Faculty of Computer Science and Information Technology</option>
                                        <option value= "Faculty of Medicine and Health Sciences">Faculty of Medicine and Health Sciences</option>
                                        <option value= "Faculty of Economics and Business">Faculty of Economics and Business</option>
                                        <option value= "Faculty of Built Environment">Faculty of Built Environment</option>
                                        <option value= "Faculty of Language and Communication">Faculty of Language and Communication</option>
                                    </select>   </div>';
                        $form.='</div><br>';
                        $form.='<div class="input-group">';
                        $form.='    <div class="col-3"><label>User ID </label></div>';
                        $form.='    <div class="col-3"><input type="text" class="form-control"  name="Id" required/></div>';
                        $form.='</div><br>';
                        $form.='<div class="input-group">';
                        $form.='    <div class="col-3"><label>Full Name </label></div>';
                        $form.='    <div class="col-3"><input type="text" class="form-control" name="Name" required/></div>';
                        $form.='</div><br>';
                        $form.='<div class="input-group">';
                        $form.='    <div class="col-3"><label>Email </label></div>';
                        $form.='    <div class="col-3"><input type="text" class="form-control"  name="email" required/></div>';
                        $form.='</div><br>';
                        $form.='<div class="input-group">';
                        $form.='    <div class="col-3"><label class="name">Mobile No. </label></div>';
                        $form.='    <div class="col-3"><input type="text" class="form-control"  name="phonenumber" required/></div>';
                        $form.='</div><br>'; 
                        $form.='<div class="input-group">';
                        $form.='    <div class="col-3"><label class="name"> Password </label></div>';
                        $form.='    <div class="col-3"><input type="password" class="form-control" name="cpassword" required/></div>';
                        $form.='</div>';                
                        $form.='  </div>';//end of card body
                        $form.='  <div class="card-footer">';
                        $form.='    <button class="btn btn-danger" onclick="closeCard()">Cancel</button>';
                        $form.='    <input type="submit" class="btn btn-primary"/>';
                        $form.='  </div></form>';
                        $form.='</div>';
        
                        echo $form;
                    break;

            case 'edit':
                extract($_POST);
                if(isset($_POST['user_id']))
                {
                    $uid = $_POST['user_id'];
                    $faculty = $_POST['faculty'];
                    $mobile = $_POST['mobile'];
                    $name = $_POST['name'];
                   
                    $sql = "UPDATE user SET user_name='$name', user_faculty='$faculty' , user_mobile_num='$mobile'
                    WHERE user_id='$uid'";
                    
                    if(!mysqli_query($conn,$sql)){
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    else{

                        if(isset($_POST['new_pass'])){
                            $key = $_POST['new_pass'];
                            $sql = "UPDATE user SET user_password='$key' WHERE user_id='$uid'";

                            if(!mysqli_query($conn,$sql)){
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                            else{

                                header("Location: ../../user.php");
                            }

                        }
                        else {header("Location: ../../user.php");}
                    }


                } else echo $_POST['equip_id'];
                break;

            case 'editForm':
                if(isset($_GET['user_id'])){
    
                    $uid=$_GET['user_id'];
                    $sql=mysqli_query($conn,"SELECT user_faculty,user_id,user_name,user_mobile_num,user_email, user_status
                    FROM  user 
                    WHERE user_id='$uid'")or die(mysqli_error($conn));
                    $row=mysqli_fetch_array($sql);
    
                    $form='<div class="card card-secondary">';
                    $form.='    <div class="card-header">';
                    $form.='      <h5><strong>User Profile</strong></h5>';
                    $form.='    </div>';
                    $form.='<form action="_asset/process/user_ctrl.php?action=edit" method="POST">';
                    $form.='  <div class="card-body">';
                    $form.='<div class="input-group">';
                    $form.='    <div class="col-3"><label>Faculyt/Department </label></div>';
                    $form.='    <div class="col-9"><input type="text" class="form-control" value="'.$row['user_faculty'].'" name="faculty" required/></div>';
                    $form.='</div><br>';
                    $form.='<div class="input-group">';
                    $form.='    <div class="col-3"><label>User ID </label></div>';
                    $form.='    <div class="col-3">'.$row['user_id'] .'</div>';
                    $form.='    <input type="hidden" class="form-control" value="'.$row['user_id'].'" name="user_id"/>';
                    $form.='</div><br>';
                    $form.='<div class="input-group">';
                    $form.='    <div class="col-3"><label>Full Name </label></div>';
                    $form.='    <div class="col-3"><input type="text" class="form-control" value="'.$row['user_name'].'" name="name" required/></div>';
                    $form.='</div><br>';
                    $form.='<div class="input-group">';
                    $form.='    <div class="col-3"><label>Email </label></div>';
                    $form.='    <div class="col-3">'.$row['user_email'] .'</div>';
                    $form.='</div><br>';
                    $form.='<div class="input-group">';
                    $form.='    <div class="col-3"><label class="name">Mobile No. </label></div>';
                    $form.='    <div class="col-3"><input type="text" class="form-control" value="'.$row['user_mobile_num'].'" name="mobile" required/></div>';
                    $form.='</div><br>'; 
                    $form.='<div class="input-group">';
                    $form.='    <div class="col-3"><label class="name">New Password </label></div>';
                    $form.='    <div class="col-3"><input type="password" class="form-control" name="new_pass"/></div>';
                    $form.='</div>';                
                    $form.='  </div>';//end of card body
                    $form.='  <div class="card-footer">';
                    $form.='    <button class="btn btn-danger" onclick="closeCard()">Cancel</button>';
                    $form.='    <button class="btn btn-secondary" onclick="removeIt('.$row['user_id'].')">Delete</button>';
                    $form.='    <input type="submit" class="btn btn-primary"/>';
                    $form.='  </div></form>';
                    $form.='</div>';
    
                    echo $form;
                }
                else echo 'MISSING ID';
                break;
    
        case 'remove':
            extract($_POST);
            if(isset($_POST['user_id']))
            {
                $uid = $_POST['user_id'];
                $sql = "DELETE FROM user WHERE user_id='$uid'";
                
                if(!mysqli_query($conn,$sql)){
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                else{
                    header("Location: ../../user.php"); 
                }
            }
            break;
// --------------------------------------------------------------------------------------Ban
            case 'readBan':
                if(isset($_GET['user_id'])){
    
                    $uid=$_GET['user_id'];
                    $sql=mysqli_query($conn,"SELECT ban_id,user_faculty,user_id,user_name,user_mobile_num,user_email,start_date,end_date,ban_reason 
                    FROM blacklist JOIN user USING(user_id) 
                    WHERE user_id='$uid'")or die(mysqli_error($conn));
                    $row=mysqli_fetch_array($sql);
                    
    
                    $detail='<div class="card card-secondary">';
                    $detail.='    <div class="card-header">';
                    $detail.='      <h5><strong>Banned #'.$row["ban_id"].'</strong></h5>';
                    $detail.='    </div>';
                    $detail.='  <div class="card-body">';
                    $detail.='<div class="input-group">';
                    $detail.='    <div class="col-3"><label>Faculyt/Department </label></div>';
                    $detail.='    <div class="col-9">: '.$row['user_faculty'] .'</div>';
                    $detail.='</div>';
                    $detail.='<div class="input-group">';
                    $detail.='    <div class="col-3"><label>User ID </label></div>';
                    $detail.='    <div class="col-3">: '.$row['user_id'] .'</div>';
                    $detail.='</div>';
                    $detail.='<div class="input-group">';
                    $detail.='    <div class="col-3"><label>Full Name </label></div>';
                    $detail.='    <div class="col-3">: '.$row['user_name'] .'</div>';
                    $detail.='</div>';
                    $detail.='<div class="input-group">';
                    $detail.='    <div class="col-3"><label>Email </label></div>';
                    $detail.='    <div class="col-3">: '.$row['user_email'] .'</div>';
                    $detail.='</div>';
                    $detail.='<div class="input-group">';
                    $detail.='    <div class="col-3"><label class="name">Mobile No. </label></div>';
                    $detail.='    <div class="col-3">: '.$row['user_mobile_num'] .'</div>';
                    $detail.='</div>';
                    $detail.='    <div class="input-group">';
                    $detail.='        <div class="col-3"><label>Ban Start</label></div>';
                    $detail.='        <div class="col-3">: '.$row["start_date"].'</div>';
                    $detail.='</div>';
                    $detail.='<div class="input-group">';
                    $detail.='        <div class="col-3"><label>Ban End</label></div>';
                    $detail.='        <div class="col-3">: '.$row["end_date"].'</div>';
                    $detail.='    </div>';
                    $detail.='    <div class="input-group">';
                    $detail.='        <div class="col-3"><label class="name">Remark</label></div>';
                    $detail.='        <div class="col-9">: '.$row["ban_reason"].'</div>';
                    $detail.='    </div>';               
                    $detail.='  </div>';//end of card body
                    $detail.='  <div class="card-footer">';
                    $detail.='    <button class="btn btn-secondary" onclick="closeCard()">Close</button>';
                    $detail.='  </div>';
                    $detail.='</div>';
    
                    echo $detail;
                }
                else echo 'MISSING ID';
                break;

            case 'newBan':
                extract($_POST);
                if(isset($_POST['user_id']))
                {
                    $id = $_POST['user_id'];
                    $start = $_POST['ban_start'];
                    $end = $_POST['ban_end'];
                    $reason = $_POST['ban_reason'];

                    $sql = "INSERT INTO blacklist ( user_id,start_date,end_date,ban_reason )
                    VALUES ('$id ','$start','$end','$reason')";
                    if(!mysqli_query($conn,$sql)){
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    else{
                        header("Location: ../../user.php");
                    }
                }
                else echo"USER ID EMPTY";
                break;

            case 'banForm':
                $form='<div class="card card-secondary">';
                $form.='    <div class="card-header">';
                $form.='      <h5><strong>Ban User</strong></h5>';
                $form.='    </div>';
                $form.='<form action="_asset/process/user_ctrl.php?action=newBan" method="POST">';
                $form.='  <div class="card-body">';
                $form.='<div class="input-group">';
                $form.='    <div class="col-2"><label>User</label></div>';
                $form.='    <div class="col-md-8" > <select class="form-control select2" name="user_id">';
                $form.='<option disabled selected> --- select user --- </option>';
                $user_array = $db_handler->runQuery("SELECT user_id,user_name FROM user;");
                if (!empty($user_array)) { 

                    foreach($user_array as $key=>$value){

                        $form.='<option value="'.$user_array[$key]['user_id'].'">'.$user_array[$key]['user_id'].' - '.$user_array[$key]['user_name'].'</option>';
                    }
                }
                $form.='    </select> </div>';
                $form.='</div><br>';
                $form.='<div class="input-group">';
                $form.='    <div class="col-2"><label>Start Date</label></div>';
                $form.='    <div class="col-3"><input type="datetime-local" class="form-control" name="ban_start" required/></div>';
                $form.='    <div class="col-2"><label>End Date </label></div>';
                $form.='    <div class="col-3"><input type="datetime-local" class="form-control" name="ban_end" required/></div>';
                $form.='</div><br>';
                $form.='<div class="input-group">';
                $form.='    <div class="col-2"><label>Reason </label></div>';
                $form.='    <div class="col-8"><input type="text" class="form-control" name="ban_reason" required/></div>';
                $form.='</div>';
                $form.='  </div>';//end of card body
                $form.='  <div class="card-footer">';
                $form.='    <button class="btn btn-danger" onclick="closeCard()">Cancel</button>';
                $form.='    <input type="submit" class="btn btn-primary"/>';
                $form.='  </div></form>';
                $form.='</div>';
                echo $form;
            ?><script type="text/javascript">
                $(document).ready(function () {
                  //Initialize Select2 Elements
                  $('.select2').select2();
                }); 
                
              </script>
              <?php
            break;

            case 'editBan':
                extract($_POST);
                if(isset($_POST['ban_id']))
                {
                    $bid = $_POST['ban_id'];
                    $start = $_POST['ban_start'];
                    $end = $_POST['ban_end'];
                    $reason = $_POST['ban_reason'];

                    $sql = "UPDATE blacklist SET start_date='$start', end_date='$end' , ban_reason='$reason' 
                    WHERE ban_id='$bid'";
                    
                    if(!mysqli_query($conn,$sql)){
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    else{
                        header("Location: ../../user.php");
                    }
                } else echo $_POST['user_id'];
                break;

            case 'editBanForm':
                if(isset($_GET['user_id'])){
    
                    $uid=$_GET['user_id'];
                    $sql=mysqli_query($conn,"SELECT ban_id,user_id,user_name,start_date,end_date,ban_reason 
                    FROM blacklist JOIN user USING(user_id) 
                    WHERE user_id='$uid'") or die(mysqli_error($conn));
                    $row=mysqli_fetch_array($sql);
                    $start=  date("Y-m-d\TH:i:s", strtotime($row['start_date']));
                    $end=  date("Y-m-d\TH:i:s", strtotime($row['end_date']));
                    $form='<div class="card card-secondary">';
                    $form.='    <div class="card-header">';
                    $form.='      <h5><strong>Ban #'.$row['ban_id'] .'</strong></h5>';
                    $form.='    </div>';
                    $form.='<form action="_asset/process/user_ctrl.php?action=editBan" method="POST">';
                    $form.='  <div class="card-body">';
                    $form.='<input type="hidden" value="'.$row['ban_id'].'" name="ban_id"/>';
                    $form.='<div class="input-group">';
                    $form.='    <div class="col-2"><label>User ID </label></div>';
                    $form.='    <div class="col-3">: '.$row['user_id'] .'</div>';
                    $form.='    <div class="col-2"><label>Full Name </label></div>';
                    $form.='    <div class="col-3">: '.$row['user_name'] .'</div>';
                    $form.='</div>';
                    $form.='<div class="input-group">';
                    $form.='    <div class="col-2"><label>Start Date</label></div>';
                    $form.='    <div class="col-3"><input type="datetime-local" class="form-control" value="'.$start.'" name="ban_start" required/></div>';
                    $form.='    <div class="col-2"><label>End Date </label></div>';
                    $form.='    <div class="col-3"><input type="datetime-local" class="form-control" value="'.$end.'" name="ban_end" required/></div>';
                    $form.='</div><br>';
                    $form.='<div class="input-group">';
                    $form.='    <div class="col-2"><label>Reason </label></div>';
                    $form.='    <div class="col-8"><input type="text" class="form-control" name="ban_reason" value="'.$row['ban_reason'].'" required/></div>';
                    $form.='</div>';
                    $form.='  </div>';//end of card body
                    $form.='  <div class="card-footer">';
                    $form.='    <button class="btn btn-danger" onclick="closeCard()">Cancel</button>';
                    $form.='    <button class="btn btn-secondary" onclick="removeBan('.$row['ban_id'].')">Delete</button>';
                    $form.='    <input type="submit" class="btn btn-primary"/>';
                    $form.='  </div></form>';
                    $form.='</div>';
                    echo $form;
                }
                break;
    
        case 'removeBan':
            extract($_POST);
            if(isset($_POST['ban_id']))
            {
                $bid = $_POST['ban_id'];
                $sql = "DELETE FROM blacklist
                WHERE ban_id='$bid'";
                
                if(!mysqli_query($conn,$sql)){
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                else{
                    header("Location: ../../user.php"); 
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
