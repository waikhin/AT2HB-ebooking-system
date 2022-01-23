<?php

    require_once("../user/_asset/process/dbcontroller.php");
    $db_handler = new DBController();
    $conn=$db_handler->connectDB();

    date_default_timezone_set('Asia/Kuala_Lumpur');
    $dt= date('Y-m-d H:i:s', time());
    $datetime=date_create($dt);

            $rsvp_array = $db_handler->runQuery("SELECT reservation_submit, reservation_id 
            FROM reservation WHERE reservation_status='Pending';");

            if (!empty($rsvp_array)) { 
                foreach($rsvp_array as $key=>$value){

                    $datetime2 = date_create($rsvp_array[$key]['reservation_submit']);
                    $interval = date_diff($datetime, $datetime2);
                    $pending_duration=$interval->format('%a');
                    if($pending_duration> 1){
                        $rsvp=$rsvp_array[$key]['reservation_id'];

                        $auto_reject = "UPDATE reservation SET reservation_status='Rejected', reservation_edit='$dt'
                        WHERE reservation_id=$rsvp";        

                        if(!mysqli_query($conn,$auto_reject))
                            echo "Error: " . $auto_reject . "<br>" . mysqli_error($conn);
                        }
                }
            }

            $user_array = $db_handler->runQuery("SELECT registered_date, user_id 
            FROM user WHERE user_status !='Verified';");
    
            if (!empty($user_array)) { 
                foreach($user_array as $key=>$value){

                    $datetime2 = date_create($user_array[$key]['registered_date']);
                    $interval2 = date_diff($datetime, $datetime2);
                    $pending_duration2=$interval2->format('%H');
                    if($pending_duration2> 1){

                        $uid=$user_array[$key]['user_id'];
                        $auto_del = "DELETE FROM user WHERE user_id=$uid";        
    
                        if(!mysqli_query($conn,$auto_del)){
                            echo "Error: " . $auto_del . "<br>" . mysqli_error($conn);
                        }
                    }

                }
            }
?>