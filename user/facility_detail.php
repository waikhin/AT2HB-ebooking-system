<?php
    require_once("_asset/process/dbcontroller.php");
    $db_handler = new DBController();
    $conn=$db_handler->connectDB();

    $f_id = $_GET["FID"];
    $sql=mysqli_query($conn,"SELECT facility_name,facility_desc,facility_working_hours FROM facility WHERE facility_id='$f_id'")or die(mysqli_error($conn));
    $row=mysqli_fetch_array($sql);
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AT2HB | <?php echo $row['facility_name']?></title>
    <link rel="shortcut icon" href="../img/favicon.ico"/>
    <link rel="stylesheet" href="_asset/css/facility_detail.css">
</head>
<body>
<?php include "header(user).php";?>
<main>
<div class="announcement">
<h6><i class="fa fa-bullhorn "></i>Announcement</h6>
<?php
    $announcement_array = $db_handler->runQuery("SELECT announcement_submit,announcement_detail FROM announcement ORDER BY announcement_id DESC;");
    if (!empty($announcement_array)) {
        foreach($announcement_array as $key=>$value){
            echo "<small>".$announcement_array[$key]["announcement_submit"].": </small>";
            echo $announcement_array[$key]["announcement_detail"]."<br>";
        }
    }
?> 
</div>

<div class="facility">

<div class="f_img">
    <h2><?php echo $row['facility_name']?></h2>
    <?php
        $sql=mysqli_query($conn,"SELECT COUNT(court_id) AS exist FROM court WHERE facility_id='$f_id'")or die(mysqli_error($conn));
        $row2=mysqli_fetch_array($sql);
        if($row2['exist']>=1){
            echo'<button class="book_btn" onclick="bookNow('.$f_id.')" > Book Now </button>';        
        }
    ?>
    <br>
    <img src="../img/sport-<?php echo "$f_id"?>-720x480.jpg" alt="<?php echo $row['facility_name']?>">
</div>    
<div class="f_detail">
    <div class="f_court">
        <button type="button" class="collapsible">
        <h4><i class="fa fa-map-pin"></i> Court</h4>
        <!-- <i class="right fa fa-angle-left"></i> -->
        </button>
        <div class="content" id="court">
            <div class="card card-body">
                
                <?php
                    $court_array = $db_handler->runQuery("SELECT court_name,court_location FROM court 
                    WHERE court.facility_id='$f_id';");
                    if (!empty($court_array)) {
                        foreach($court_array as $key=>$value){
                            echo "<strong>".$court_array[$key]["court_name"].":</strong><br>";
                            echo "Address".$court_array[$key]["court_location"]."<br>";
                        }
                    }
                ?> 
            </div>
        </div>
    </div>

    <div class="f_desc">
    <h4><i class="fa fa-list-alt"></i> Description</h4>
        <p>
            <?php echo $row['facility_desc']?>
        </p>
    </div>

    <div class="f_time">
        <h4><i class="fa fa-hourglass-2"></i> Working Hour</h4>
        <p>
        <?php
            echo $row['facility_working_hours'];
        ?>
        </p>
    </div>

    <div class="f_price">
        <h4><i class="fa fa-money"></i> Price</h4>
        <p>
        <?php
        $price_array = $db_handler->runQuery("SELECT rental_type,rental_unit,rental_price FROM rental_rate 
        WHERE rental_rate.facility_id='$f_id';");
        if (!empty($price_array)) {
            foreach($price_array as $key=>$value){
                echo $price_array[$key]["rental_type"]."(RM/".$price_array[$key]["rental_unit"].")".": RM ".$price_array[$key]["rental_price"]."<br>";
            }
        }
        ?> 
        </p>
    </div>
</div>
</div>

<div class="f_map">
    <h4><i class="fa fa-map"></i> Maps</h4>
    <p> </p>
</div>

<div class="f_review">
    <h4><i class="fa fa-star"></i> Review</h4>
    <p> </p>
</div>

<div class="f_policy">
    <h4><i class="fa fa-lock"></i> Policy</h4>
    <p> </p>
</div>


</main>
<?php //include "footer(user).php" ?>
<script type="text/javascript">

function bookNow(str){
    window.location.href='book_court.php?FID='+str;
};
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
</body>

</html>