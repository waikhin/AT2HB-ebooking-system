<?php
        require_once("../user/_asset/process/dbcontroller.php");
        $db_handler = new DBController();
        $conn=$db_handler->connectDB();
        $dt = new DateTime;
        $cid = intval($_GET['CID']);
        if (isset($_GET['year']) && isset($_GET['week'])) {
            if($_GET['week']===0){
                $dt->setISODate($_GET['year']+1,$_GET['week']);
            }
            else{
            $dt->setISODate($_GET['year'], $_GET['week']);
            }
        
        } else {
        
        $dt->setISODate($dt->format('o'), $dt->format('W')+1);
        }
        $year = $dt->format('o');
        $week = $dt->format('W');
        $day = $dt->format('D');

        $date1=$dt->format('d/m/y');
        $booked=[];
        $slot_array=$db_handler->runQuery("SELECT user_id,user_name,reservation_date,reservation_slot 
        FROM reservation JOIN user USING(user_id)
        WHERE court_id='$cid'&& reservation_status='Approved';");
        if (!empty($slot_array)) {
        foreach($slot_array as $key=>$value){

                $occupied_slot = $slot_array[$key]['reservation_date'];
                $occupied_slot .= $slot_array[$key]['reservation_slot'];
                $uid[$occupied_slot]=$slot_array[$key]['user_id'];
                $uName[$occupied_slot]=$slot_array[$key]['user_name'];
                array_push($booked,$occupied_slot);
        }
        }
        $sql=mysqli_query($conn,"SELECT court_name FROM court WHERE court_id='$cid'")or die(mysqli_error($conn));
        $row=mysqli_fetch_array($sql);
        ?>
        <div class='operator'>
        <div><h5><?php echo $row['court_name'];?></h5></div>
            <div class='week-ctrl'>
                <a class="btn btn-xs btn-secondary" href="?cid=<?php echo $cid;?>&week=<?php echo ($week-1);?>&year=<?php echo $year; ?>"><i class='fas fa-angle-left'></i></a> 
                Week <?php echo $week ?>&nbsp
                <a class="btn btn-xs btn-secondary" href="?cid=<?php echo $cid;?>&week=<?php echo ($week+1);?>&year=<?php echo $year; ?>"><i class='fas fa-angle-right'></i></a>
            </div>
        </div>
        
        <table class='table table-bordered slot'>
           <thead><tr>
                <th>Slot</th>
        <?php
        for($i=0; $i<5; $i++) {
                echo "<th>" . $dt->format('D') . "<br>" . $dt->format('d M') . "</th>\n";
                $dt->modify('+1 day');
        };
        echo"</tr></thead>";
        $slot_time = array('1000-1100','1100-1200','1200-1300','1300-1400','1400-1500','1500-1600','1700-1800','1900-2000','2000-2100');
        $calendar="<tbody>";

        //creating row
        foreach($slot_time as $slot){ 
        $calendar.="<tr>";

        $calendar.="<td>".$slot."</td>";

        //creating column
        
                $dt2 = new DateTime;
                $dt2->setISODate($year, $week);
                for($y=0; $y<5; $y++) {
                        $date=$dt2->format('Y-m-d');
                        $datetime=$date.$slot;
                        // check if booked
                        if(in_array($datetime, $booked)){
                                $calendar.="<td class='booked'>".$uid[$datetime]."<br>".$uName[$datetime]."</td>";
                        }
                        else{
                                $calendar.="<td class='empty'></td>";
                        }
                        $dt2->modify('+1 day');
                }

        $calendar.="</tr>";
        }
        $calendar.="</tbody>";
        $calendar.="</table>";

        echo $calendar;

?>