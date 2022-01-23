<?php
require_once("dbcontroller.php");
$db_handler = new DBController();
$conn=$db_handler->connectDB();
$cid = intval($_GET['CID']);
$dt = new DateTime;

//remove the +1 for the check availability
$dt->setISODate($dt->format('o'), $dt->format('W')+1);
//}
$year = $dt->format('o');
$week = $dt->format('W');
$day = $dt->format('D');


$date1=$dt->format('y-m-d');
echo $date1;
$booked=[];
$slot_array=$db_handler->runQuery("SELECT reservation_date,reservation_slot FROM reservation WHERE court_id='$cid'&& reservation_date>='$date1' && reservation_status='Approved';");
if (!empty($slot_array)) {
    foreach($slot_array as $key=>$value){

        $occupied_slot = $slot_array[$key]['reservation_date'];
        $occupied_slot .= $slot_array[$key]['reservation_slot'];
        array_push($booked,$occupied_slot);
    }
}

$pending=[];
$slot2_array=$db_handler->runQuery("SELECT reservation_date,reservation_slot FROM reservation WHERE court_id='$cid'&& reservation_date>='$date1' && reservation_status='Pending';");
if (!empty($slot2_array)) {
    foreach($slot2_array as $key=>$value){

        $pending_slot = $slot2_array[$key]['reservation_date'];
        $pending_slot .= $slot2_array[$key]['reservation_slot'];
        array_push($pending,$pending_slot);
    }
}


// <!-- Use this 2 button for checking availability -->
// <!--  //echo 'Week'.$dt->format('W Y') Previous week -->
// <!-- <a href="// echo $_SERVER['PHP_SELF'].'?FID='.$f_id.'&week='.($week+1).'&year='.$year; ">Next Week</a> Next week -->

echo '<div class="col-3"> Week'.$dt->format('W Y').'</div>';
echo "<table class='table table-bordered slot'>";
echo"   <thead><tr>";
echo"        <th>Slot</th>";

for($i=0; $i<5; $i++) {
        echo "<th>" . $dt->format('D') . "<br>" . $dt->format('d M') . "</th>\n";
        $dt->modify('+1 day');
};
echo"</tr></thead>";
build_slot($booked,$pending);       
echo"</table>";


function build_slot($booked,$pending){
        
        $slot_time = array('1000-1100','1100-1200','1200-1300','1300-1400','1400-1500','1500-1600','1700-1800','1900-2000','2000-2100');
        $calendar="<tbody>";

        //creating row
        foreach($slot_time as $slot){ 
        $calendar.="<tr>";

        $calendar.="<td>".$slot."</td>";

        //creating column
        
                $dt2 = new DateTime;
                $dt2->setISODate($dt2->format('o'), $dt2->format('W')+1);
                for($y=0; $y<5; $y++) {
                        $date=$dt2->format('Y-m-d');
                        $datetime=$date.$slot;
                        //check if booked
                        if(in_array($datetime, $booked)){
                                $calendar.="<td class='booked'></td>";
                        }
                        // check if got any pending request
                        elseif(in_array($datetime, $pending)){
                                $calendar.="<td class='pending'></td>";
                        }
                        else{
                                $calendar.="<td class='empty'><label for='".$slot.$y."'><input type='checkbox'class='empty' name='slot' id='".$slot.$y."' value='".$slot."' date='".$date."'/></label></td>";
                        }
                        $dt2->modify('+1 day');
                }

        $calendar.="</tr>";
        }
        $calendar.="</tbody>";
        $calendar.="</table>";

        echo $calendar;
?>
        <script type="text/JavaScript">
        $('input[name="slot"]').on('change', function() {
        if ($('input[name="slot"]:checked').length > 1) {
                $(this).prop('checked', false);
                document.getElementById('slotErr').innerText = "MAX 1 slot only";
                document.getElementById('slotErr').className = 'fail';
        }
        else{
                $(this).closest('td').toggleClass('green', $(this).is(':checked'));
        }   
        });
        </script>     
<?php
} 
?>