<?php
extract($_POST);
require_once("dbcontroller.php");
$db_handler = new DBController();
$conn=$db_handler->connectDB();

    $court  = $_POST['court'];
    $uid = $_POST['user_id'];
    $remark = $_POST['remark'];
    $date = $_POST['bookDate'];
    $slot = $_POST['bookSlot'];
    $fee = $_POST['fee'];
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $datetime = date('Y-m-d H:i:s', time());
   
    $sql = "INSERT INTO reservation (court_id, user_id, reservation_submit, reservation_edit, reservation_date, reservation_slot, reservation_status, reservation_remark) 
    VALUES ('$court', '$uid', '$datetime', '$datetime', '$date', '$slot', 'Pending', '$remark')"; 

    if(mysqli_query($conn,$sql))
    {
        $rsvp_id = mysqli_insert_id($conn);
        $sql2 = "INSERT INTO invoice(invoice_id, reservation_id, invoice_pay_amount, invoice_status) 
        VALUES ('$rsvp_id','$rsvp_id','$fee','Pending')";

        if(!mysqli_query($conn,$sql2)){
            echo '<script>console.log('.mysqli_error($conn).')</script>';
        }

        if($_POST['equipment_id'][0]){

            $connect=$db_handler->pdo();
            for($count = 0; $count < count($_POST["equipment_id"]); $count++)
            {  
            $query = "INSERT INTO reservation_addon (reservation_id, equipment_id, equipment_qty) VALUES (:rsvp_id, :equip_id, :equip_qty)";
            $statement = $connect->prepare($query);
                $statement->execute(
                    array(
                        ':rsvp_id'   => $rsvp_id,
                        ':equip_id'  => $_POST["equipment_id"][$count],
                        ':equip_qty'  => $_POST["equipment_qty"][$count]
                    )
                );
            }
        }
        header("Location:../../booking_submitted.php?rsvp=".$rsvp_id);
        
    }else{echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
?>