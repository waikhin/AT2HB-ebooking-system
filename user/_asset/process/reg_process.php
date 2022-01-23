<?php
extract($_POST);
require_once("dbcontroller.php");
$db_handler = new DBController();
$conn=$db_handler->connectDB();

    $role  = $_POST['role'];
    $uid  = $_POST['Id'];
    $name  = $_POST['Name'];
    $faculty  = $_POST['Faculty'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $cpass = $_POST['cpassword'];
    $key=md5($cpass);
    $date = date('Y-m-d H:i:s');
    $generated_key = rand_string(10);

    $sql = "INSERT INTO user (user_type, user_id, user_name, user_faculty, user_email, user_mobile_num, user_password, user_status, registered_date) 
    VALUES ('$role', '$uid', '$name', '$faculty', '$email', '$phonenumber', '$key', '$generated_key','$date')"; 

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require '../phpmailer/includes/Exception.php';
    require '../phpmailer/includes/PHPMailer.php';
    require '../phpmailer/includes/SMTP.php';

    if(!mysqli_query($conn,$sql))
    {
        header("Location: ../../register.php?error=AccountExisted!");
    }
    else
    {
            //Create a new PHPMailer instance
        $mail = new PHPMailer;

        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6

        //Set the SMTP port number - 587 for authenticated TLS
        $mail->Port = 587;

        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = 'at2hb.rand@gmail.com';

        //Password to use for SMTP authentication
        $mail->Password = 'F!&4ajZy<&83Tf{+';

        $mail->Subject = 'AT2HB eBooking System Registration Email Verification';

        //Set who the message is to be sent from
        $mail->setFrom('at2hb.rand@gmail.com');
        $mail->Body ='Hello '.$name.'\n';
        $mail->Body .='Thank you for resgistering AT2HB eBooking system\n';
        $mail->Body .='Click the link to complete your registration:\n';
        $mail->Body .='http://at2hb.epizy.com/user/email_verification.php?id='.$uid.'&key='.$generated_key;
        //Set an alternative reply-to address
        $mail->addReplyTo($email);

        //Set who the message is to be sent to
        $mail->addAddress($email);
        if($mail->Send())        //Send an Email. Return true on success or false on error
        {
        $message = '<div class="alert alert-success">Application Successfully Submitted</div>';
        }
        else
        {
        $message = '<div class="alert alert-danger">There is an Error</div>';
        }
        $mail->smtpClose();

        if(isset($_SESSION['rand4ever'])){
            header("Location: ../../../admin/user.php");
        }
        header("Location: ../../success.php?info=newUser");

    }

    function rand_string( $length ) {  
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz0123456789";  
        $size = strlen( $chars );  
        $str="";  
        for( $i = 0; $i < $length; $i++ ) {  
            $str.= $chars[ rand( 0, $size - 1 ) ];    
        } 
        return $str; 
        }
?>