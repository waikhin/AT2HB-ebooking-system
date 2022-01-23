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
    include "header(user).php";
?>
<main>
<!-- MultiStep Form -->
<div class="container-fluid" id="wrapper">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-2 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <div class="row">
                    <div class="col-md-12 mx-0">
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center">Yayyyyyyy</h2> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                    </div> 
                                    <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                        <h5><?php
                                            if(isset($_GET['msg'])){
                                                $msg=$_GET['msg'];
                                                switch($msg){
                                                    case 'newUser':
                                                        echo"<h5>Your Are Almost Done With Your Registration</h5>";
                                                        echo"<h6>Please check your email to verify your account (might be inside the junk mail)</h6>";
                                                        break;

                                                    default:
                                                        echo "<h5>Something went wrong...</h5>";
                                                        break;
                                                }
                                            }
                                            else {
                                                echo "<h5>Something went wrong...</h5>";
                                            }
                                            ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <a href="login.php"><button class="btn btn-primary">Login Now</button><a>
                            </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</main>
</body>
</html>
