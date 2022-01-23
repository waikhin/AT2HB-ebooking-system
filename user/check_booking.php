<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AT2HB | My Booking</title>
	<link rel="shortcut icon" href="../img/favicon.ico"/>

    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css' rel='stylesheet'>

	<link rel="stylesheet" href="_asset/css/user_profile.css">	
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

	include "header(user).php";


    $sql=mysqli_query($conn,"SELECT reservation_id,reservation_submit,reservation_date,reservation_slot, reservation_remark, reservation_status, court_name,invoice_pay_amount
    FROM reservation JOIN court USING(court_id) JOIN invoice USING(reservation_id)
    WHERE reservation.user_id='$uid' ORDER BY reservation_id DESC LIMIT 1")or die(mysqli_error($conn));
    

    if($row=mysqli_fetch_array($sql)){

    $rsvp_id=$row['reservation_id'];
    $equip_array = $db_handler->runQuery("SELECT equipment_id,equipment_name,equipment_qty
    FROM reservation_addon JOIN equipment USING(equipment_id)
    WHERE reservation_id='$rsvp_id';");
    // $sql2 = mysqli_query($conn,"SELECT equipment_id,equipment_name,equipment_qty
    // FROM reservation_addon JOIN equipment USING(equipment_id)
    // WHERE reservation_id='$rsvp_id'")or die(mysqli_error($conn));
    // $row2=mysqli_fetch_array($sql2);


    $history_array = $db_handler->runQuery("SELECT reservation_id,reservation_submit,reservation_date,reservation_slot, reservation_remark, reservation_status, court_name
    FROM reservation JOIN court USING(court_id) 
    WHERE reservation.user_id='$uid'
    ORDER BY reservation_submit DESC;");
?>
<main>
    <div class="card-popup" id="history">        
        <div class="card">
        
        <div class="card-header">
            <h1><i class="fa fa-list-alt"></i>  MY BOOKING HISTORY</h1>
        </div>
        <!-- end card header -->
        <div class="card-body">
        <table>
            <thead>   
                <tr>
                <th>Reservation ID</th>
                <th>Date Submitted</th>
                <th>Court</th>
                <th>Date</th>
                <th>Slot</th>
                <th>Remarks</th>
                </tr>
            </thead> 
            <tbody>
    <?php
    if (!empty($history_array)) { 
    foreach($history_array as $key=>$value){
    ?>
                <tr>
                <td><?php echo $history_array[$key]["reservation_id"]; ?></td>
                <td><?php echo $history_array[$key]["reservation_submit"]; ?></td>
                <td><?php echo $history_array[$key]["court_name"]; ?></td>
                <td><?php echo $history_array[$key]["reservation_date"]; ?></td>
                <td><?php echo $history_array[$key]["reservation_slot"]; ?></td>
                <td><?php echo $history_array[$key]["reservation_remark"]; ?></td>
                </tr>
    <?php }} ?>
            </tbody>
        </table>
        </div>
		<!-- end card body -->
        <div class="card-footer">
            <button class="btn btn-secondary" onclick="closeForm()">Back</button>
        </div>
		<!-- end card footer -->
        </div>
        <!-- end Card -->
    </div>
    <!-- end card pop up -->

	<div class="card" id="myBooking">
		<div class="card-header">
			<h1><i class="fa fa-list-alt"></i>  MY BOOKING</h1>
		</div>
		<!-- end card header -->
		<div class="card-body">
            <div class="row">
                <div class="col-3"><label>Reservation ID</label></div>
                <div class="col-9">: <?php echo $row['reservation_id'] ?></div>
            </div>
            <div class="row">
                <div class="col-3"><label>Submitted Date Time</label></div>
                <div class="col-9">: <?php echo $row['reservation_submit'] ?></div>
            </div>
            <div class="row">
                <div class="col-3"><label>Court</label></div>
                <div class="col-9">: <?php echo $row['court_name'] ?></div>
            </div>
            <div class="row">
                <div class="col-3"><label>Reservation Date</label></div>
                <div class="col-9">: <?php echo $row['reservation_date'] ?></div>
            </div>
            <div class="row">
                <div class="col-3"><label>Slot</label></div>
                <div class="col-9">: <?php echo $row['reservation_slot'] ?></div>
            </div>
            <div class="row">
                <div class="col-3"><label class="name">Remark</label></div>
                <div class="col-9">: <?php echo $row['reservation_remark'] ?></div>
            </div>

            <div class="row">
                <div class="col-3"><label class="name">Status</label></div>
                <div class="col-9">: <span class="<?php echo $row['reservation_status'] ?>"><?php echo $row['reservation_status'] ?></span></div> 
            </div>

<?php
    if (!empty($equip_array)) { 
?>
        <div class="row">
        <div class="col-3"><label class="name">Equipement(s)</label></div><br>
        </div>
    <?php
    foreach($equip_array as $key=>$value){
    ?>  <div class="row">
                <div class="col-1" style="margin-left: 2em;"><label class="name"><?php echo $equip_array[$key]["equipment_name"]; ?></label></div>
                <div class="col-9"><?php echo $equip_array[$key]["equipment_qty"]; ?></div> 
        </div>          
    <?php } //end for 
    } //end if?>
        <div class="row">
                <div class="col-3"><label class="name">Fee</label></div>
                <div class="col-9">: RM<span><?php echo number_format($row['invoice_pay_amount'],2) ?></span></div> 
            </div>
		</div>
		<!-- end card body -->
		<div class="card-footer">
            <button class="btn btn-secondary" onclick="openHistory()">History</button>
            <?php
                if($row['reservation_status']=='Approved' || $row['reservation_status']=='Completed'){
                    echo'<a href="_asset/pdf/pdf_gen.php?pi=1" target="_blank"><button class="btn btn-secondary">Print Invoice</button></a>';
                }
            ?>
            <?php
                if($row['reservation_status']=='Completed'){
                    echo'<button class="btn btn-primary" name="submit">Submit Review</button>';
                }
            ?>
			<button class="btn btn-danger" onclick="cancelIt(<?php echo $row['reservation_id'] ?>)">Cancel</button>
		</div>
		<!-- end card footer -->
	</div>
	<!-- end card -->
</main>
<!-- end of if got booking -->
<?php } else {?>

    <main>
    <div class="card" id="myBooking">
		<div class="card-header">
			<h1><i class="fa fa-list-alt"></i>  MY BOOKING</h1>
		</div>
        <div class="card-body">
			<h3>It seems like you haven't submit any booking request yet...</h3>
		</div>
        <div class="card-footer">
		</div>
		<!-- end card footer -->
    </main>
<?php }?>
    <!-- Script-->
    <script type="text/JavaScript">

    function openHistory() {
        document.getElementById("history").style.display = "block";
        document.getElementById("myBooking").style.display = "none";
    }
    
    function closeForm() {
        document.getElementById("history").style.display = "none";
        document.getElementById("myBooking").style.display = "block";
    }

    function cancelIt(rid){

        if (confirm("Are You Sure? ") == true) {
            $.ajax({
                type: 'post',
                url: '_asset/process/edit_booking.php?action=update',
                data: {
                    rid:rid,
                    rst:'Cancelled' 
                },
                success: function( data ) {
                    console.log( "Success" );
                }
            });
            document.location.reload();
        } 
    }
    </script>
}
<?php }// end of session validation?>
</body>
</html>