<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AT2HB | Booking Court</title>
    <link rel="shortcut icon" href="../img/favicon.ico"/>
    <link rel="stylesheet" href="_asset/css/book_court.css">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

</head>
<body>
<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  if(!isset($_SESSION['id'])){
    header("Location: login.php");
  }
else{
    $uid=$_SESSION['id'];
    //get from session
    // $uid = 69448;
    require_once("_asset/process/dbcontroller.php");
    $db_handler = new DBController();
    $conn=$db_handler->connectDB();
    $conn2=$db_handler->pdo();
    $f_id = $_GET["FID"];

    $sql2=mysqli_query($conn,"SELECT user_id FROM blacklist WHERE user_id='$uid'")or die(mysqli_error($conn));
    if(mysqli_fetch_array($sql2)){
        header("Location: errPage.php?err=banned");
    }
    $sql3=mysqli_query($conn,"SELECT user_id FROM reservation 
    WHERE user_id='$uid' AND WEEKOFYEAR(reservation_submit)=WEEKOFYEAR(NOW()) AND YEAR(reservation_submit)=YEAR(now()) AND (reservation_status='Pending' OR reservation_status='Approved');")
    or die(mysqli_error($conn));
    if(mysqli_fetch_array($sql3)){
        header("Location: errPage.php?err=quota");
    }
    $sql=mysqli_query($conn,"SELECT * FROM user WHERE user_id='$uid'")or die(mysqli_error($conn));
    $row=mysqli_fetch_array($sql);
    include "header(user).php";

?>
<main>
<!-- MultiStep Form -->
<div class="container-fluid" id="wrapper">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-2 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Submit Your Booking Request</strong></h2>
                <p>Fill all form field to go to next step</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform" action="_asset/process/booking_process.php" method="POST">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="date"><strong>Choose Date</strong></li>
                                <li id="contact"><strong>Contact Info</strong></li>
                                <li id="confirmation"><strong>Confirmation</strong></li>
                                <li id="finish"><strong>Finish</strong></li>
                            </ul>

                            <!--page 1-->
                            <fieldset>
                                <div class="form-card">
                                    <div class="row input-group">
                                    <div class="col-3"><label class="court">Select Court: </label></div>
                                        <div class="col-9"><select class="form-control" id="court" name="court" onChange="switchCourt(this.value);" required>
                                        <option value="none" disabled selected> -- select court -- </option>
                                        <?php
                                            $court_array=$db_handler->runQuery("SELECT  court_id,court_name FROM court WHERE facility_id='$f_id';");
                                            if (!empty($court_array)) {
                                                foreach($court_array as $key=>$value){
                                                    echo "<option value='".$court_array[$key]['court_id']."' court_name='".$court_array[$key]['court_name']."'>".$court_array[$key]['court_name']."</option>";
                                                }
                                            }
                                        ?>
                                            </select>
                                        </div>
                                        <small id="courtErr"></small>  
                                    </div>
                                    <!-- /row -->
                                    <br/>
                                    <div class="row input-group">
                                    <div class="col-3"><label>Choose Your Slot: </label></div>
                                    <small id="slotErr"></small> 
                                    </div>

                                    <!-- Calendar -->
                                    <div class="row calendar" id="calendar"></div>
                                    
                                    <div class="row indicator">
                                        <div class='box red'></div> Not Available
                                        <div class='box yellow'></div> Pending
                                        <div class='box white'></div> Available
                                    </div>
                                    <br>
                                    <div class="row table-repsonsive input-group">
                                        <small id="equipErr"></small> 
                                        <table class="table table-bordered" id="equip_table">
                                        <tr>
                                            <th>Equipment</th>
                                            <th style="width:20px;">Quantity</th>
                                            <th><button type="button" name="add" class="btn btn-success btn-sm add"><i class="fa fa-plus"></i></button></th>
                                        </tr>
                                        </table>   
                                    </div>   
                                </div>
                                <!-- /form-card -->
                                <input type="button" name="next" class="next action-button" value="Next Step" />
                            </fieldset>

                            <!--page 2-->
                            <fieldset>
                            <div class="form-card">
                                    <div class="row input-group">
                                        <div class="col-3"><label class="user_id">User ID: </label></div>
                                        <div class="col-9 big"><?php echo $row['user_id']?></div>
                                        <input id="user_id" name="user_id" type="hidden" value="<?php echo $row['user_id']?>" required>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-3"><label class="name">Name: </label></div>
                                        <div class="col-9 big"><?php echo $row['user_name']?></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-3"><label class="name">Faculty/Department: </label></div>
                                        <div class="col-9 big"><?php echo $row['user_faculty']?></div> 
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-3"><label class="email">Email: </label></div>
                                        <div class="col-9 big"><?php echo $row['user_email']?></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-3"><label class="mobile">Mobile No.: </label></div>
                                        <div class="col-9 big"><?php echo $row['user_mobile_num']?></div>
                                    </div>
                                    <br>
                                    <div class="row input-group">
                                        <div class="col-3"><label class="remark">Booking Purpose: </label></div>
                                        <div class="col-9"><input class="form-control" id="remark" name="remark" type="text" placeholder="e.g. Club Ativity"required></div>
                                        <small id="remarkErr"></small>
                                    </div>                           
                                </div> 
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> <input type="button" name="next" class="next action-button" value="Next Step" />
                            </fieldset>

                            <!--page 3-->
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">

                                        <div class="col-3"><label>Court: </label></div>
                                        <div class="col-9 big" id="c1"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3"><label>Date: </label></div>
                                        <div class="col-9 big" id="c2"></div>
                                        <div id="inputDate"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3"><label>Choosen Slot: </label></div>
                                        <div class="col-9 big" id="c3"></div>
                                        <div id="inputSlot"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3"><label>User ID: </label></div>
                                        <div class="col-9 big" id="u4"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3"><label class="name">Name: </label></div>
                                        <div class="col-9 big"><?php echo $row['user_name']?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3"><label class="name">Faculty/Department: </label></div>
                                        <div class="col-9 big"><?php echo $row['user_faculty']?></div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-3"><label>Email: </label></div>
                                        <div class="col-9 big"><?php echo $row['user_email']?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3"><label>Mobile No.: </label></div>
                                        <div class="col-9 big"><?php echo $row['user_mobile_num']?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3"><label>Booking Purpose: </label></div>
                                        <div class="col-9 big" id="u5"></div>
                                    </div>
                                    <div class="row" id="ep">
                                    </div>
                                    <?php
                                    $role='Student';//get from session
                                    if($role=='Student'||$role=='Staff'){
                                        $fee=0;
                                    }
                                    ?>
                                    <div class="row">
                                        <div class="col-3"><label>Fee: </label></div>
                                        <div class="col-9 big"><?php echo "RM ".number_format($fee, 2);?></div>
                                        <input type="hidden" name="fee" value="<?php echo $fee?>">
                                    </div>

                                    <div class="row input-group">
                                        <div class="tc"><input type="checkbox" name="tnc" id="tnc" value="agree" placeholder="I Agree"required><label for="tnc">I Agree to <a href='#'>Terms & Conditions</a></label></div>
                                        <small id="tncErr"></small>
                                    </div> 
                                </div> 
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> <input type="submit" id="confirm" class="action-button" value="Confirm" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>

<?php
function fill_equipment($conn2)
{    
    $output = '';
    $query = "SELECT equipment_id,equipment_name,equipment_balance FROM equipment WHERE equipment_balance>0";
    $statement = $conn2->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        // $max['$row["equipment_id"]']=$row["equipment_id"];
        $output .= '<option value="'.$row["equipment_id"].'">'.$row["equipment_name"].'</option>';
    }
    return $output;
} 
?>
    <!-- Script-->
    <script type="text/javascript" src="_asset/js/book_court.js"></script>
    <script type="text/JavaScript">

    function switchCourt(str){

        $("#calendar").load('_asset/process/slot_form.php?CID='+str);
        return;     
    }

    

    $(document).ready(function(){
    $(document).on('click', '.add', function(){
        var html = '';
        html += '<tr>';
        html += '<td><select name="equipment_id[]" class="form-control" required><option value="none" disabled selected> -- select equipment -- </option><?php echo fill_equipment($conn2); ?></select></td>';
        html += '<td><input name="equipment_qty[]" type="number" value="0" min="0" required/></td>';
        html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><i class="fa fa-minus"></button></td></tr>';        
        $('#equip_table').append(html);
    });

    $(document).on('click', '.remove', function(){
        $(this).closest('tr').remove();
    });

    $('.equipment_id').each(function(){
        var count = 1;
        count = count + 1;
    });

    });

    </script>

<?php }// end of session validation?>   
</body>
</html>
