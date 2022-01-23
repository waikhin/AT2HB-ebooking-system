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
    include "header(user).php";
    $rsvpid=$_GET['rsvp'];
?>
<main>
<!-- MultiStep Form -->
<div class="container-fluid" id="wrapper">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-2 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Your Booking Request Submitted</strong></h2>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="date"><strong>Choose Date</strong></li>
                                <li class="active" id="contact"><strong>Contact Info</strong></li>
                                <li class="active" id="confirmation"><strong>Confirmation</strong></li>
                                <li class="active" id="finish"><strong>Finish</strong></li>
                            </ul>

                            <!--page 4-->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center">Success !</h2> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                    </div> 
                                    <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5>We Will Process Your Request Soon</h5>
                                            <h6>Your Booking ID is #<?php echo $rsvpid?></h6>
                                        </div>
                                    </div>
                                </div>
                                <a href="index.php"><input type="button" class="action-button" name="Home" value="Home"/><a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</main>

    <!-- Script-->
    <script type="text/javascript" src="_asset/js/book_court.js"></script>

<?php }// end of session validation?>     
</body>
</html>
