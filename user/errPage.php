<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AT2HB | Booking Court</title>
    <link rel="shortcut icon" href="../img/favicon.ico"/>
    <link rel="stylesheet" href="_asset/css/book_court.css">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css' rel='stylesheet'>

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
?>
<main>
<!-- MultiStep Form -->
<div class="container-fluid" id="wrapper">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-2 mb-2">

            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                            <!--page 4-->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center">UH  OH...</h2> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"> <img src="../img/sad-emoji.png" class="fit-image"> </div>
                                    </div> 
                                    <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5><?php
                                            if(isset($_GET['err'])){
                                                $err=$_GET['err'];
                                                switch($err){
                                                    case 'banned':
                                                        echo"<h5> It seem like you are banned from making a booking request</h5>";
                                                        break;

                                                    case 'quota':
                                                        echo"<h5>Sorry... You already submmited a booking request this week.</h5>";
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
                                <a href="index.php"><input type="button" class="btn btn-secondary" name="Home" value="Home"/><a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</main>

<?php }// end of session validation?>     
</body>
</html>
