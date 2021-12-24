<?php 
require_once 'inc/functions.inc.php';
$otphide="hide";
$emailhide="";
if (isset($_POST['forget_submit']) && !empty($_POST['email'])) {
    $email=email_format($_POST['email']);
    $checkemail=select("users","*","email ='".$email."'");
    if (mysqli_num_rows($checkemail) > 0) {
        $resultforemail=mysqli_fetch_assoc($checkemail);
        $name=$resultforemail['name'];
        $vkey=rand(1111 , 999999);
        $selectvkey=select("users","*","vkey='".$vkey."'");
        if (mysqli_num_rows($selectvkey) > 0) {
           $vkey=$vkey + 2; 
        }
        $value="vkey='$vkey'";
        $insertcvkey=update("users",$value,"email='".$email."'");
        if ($insertcvkey) {
                $html="<h2>Your OTP is = ".$vkey."</h2>";
                require 'PHPMailer/PHPMailerAutoload.php';
                //mail send sample code
                $mail = new PHPMailer();
                //$mail->SMTPDebug = 3;
                $mail->isSMTP();
                $mail->SMTPAuth =true;
                $mail->SMTPSecure='tls';  //tls ssl
                $mail->Host = 'mail.bgdbilling.xyz';
                $mail->Port = 587;    // 587 465
                $mail->IsHTML(true);
                $mail->CharSet='UTF-8';
                $mail->Username='info@bgdbilling.xyz';
                $mail->Password='bgd1231#';
                $mail->SetFrom('info@bgdbilling.xyz', 'BGD Billing Software');
                $mail->AddAddress($email,$name);
                $mail->addBCC('ruhul1.bgd@gmail.com'); 
                $mail->Subject = 'Email Verification';
                $mail->Body=$html;
                $mail->SMTPOptions = array(
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_depth' => false,
                        'allow_self_signed' => false,
                        'verify_peer_name' => false
                    ]
                );
                
                if (!$mail->send()) {
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    $otphide="";
                    $emailhide="hide";
                    $success='<p class="text-center alert-success m-0 p-2" style="border-radius:5px;">Verification Code Send Check your email</p>';
                }
            }
    }else{
     $checkemail=select("clients","*","email ='".$email."'");
     if (mysqli_num_rows($checkemail) > 0) {
        $resultforemail=mysqli_fetch_assoc($checkemail);
        $name=$resultforemail['name'];
        $vkey=rand(1111 , 999999);
        $selectvkey=select("clients","*","vkey='".$vkey."'");
        if (mysqli_num_rows($selectvkey) > 0) {
           $vkey=$vkey + 2; 
        }
        $value="vkey='$vkey'";
        $insertcvkey=update("clients",$value,"email='".$email."'");
        if ($insertcvkey) {
                $html="<h2>Your OTP is = ".$vkey."</h2>";
                require 'PHPMailer/PHPMailerAutoload.php';
                //mail send sample code
                $mail = new PHPMailer();
                //$mail->SMTPDebug = 3;
                $mail->isSMTP();
                $mail->SMTPAuth =true;
                $mail->SMTPSecure='tls';  //tls ssl
                $mail->Host = 'mail.bgdbilling.xyz';
                $mail->Port = 587;    // 587 465
                $mail->IsHTML(true);
                $mail->CharSet='UTF-8';
                $mail->Username='info@bgdbilling.xyz';
                $mail->Password='bgd1231#';
                $mail->SetFrom('info@bgdbilling.xyz', 'BGD Billing Software');
                $mail->AddAddress($email,$name);
                $mail->addBCC('ruhul1.bgd@gmail.com'); 
                $mail->Subject = 'Email Verification';
                $mail->Body=$html;
                $mail->SMTPOptions = array(
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_depth' => false,
                        'allow_self_signed' => false,
                        'verify_peer_name' => false
                    ]
                );
                
                if (!$mail->send()) {
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    $otphide="";
                    $emailhide="hide";
                    $success='<p class="text-center alert-success m-0 p-2" style="border-radius:5px;">Verification Code Send Check your email</p>';
                }
            }
    
     }else{
         $wrongemail='<p class="text-center alert-danger m-0 p-2" style="border-radius:5px;">Email is incorrect</p>';
     }
    
}
}

if (isset($_POST['forget_submit']) && !empty($_POST['otp_number'])) {
    $otp=number_format($_POST['otp_number']);
    $checkemail=select("users","*","vkey ='".$otp."'");
    if (mysqli_num_rows($checkemail) > 0) {
        $vkeyres=mysqli_fetch_assoc($checkemail);
        $vkey=$vkeyres['vkey'];
        $email=$vkeyres['email'];
        $html="<p>please click<a href='https://bgdbilling.xyz/setpass.php?vkey=".$vkey."&&email=".$email."'>here</a> and set new password </p>";
        require 'PHPMailer/PHPMailerAutoload.php';
        //mail send sample code
        $mail = new PHPMailer();
        //$mail->SMTPDebug = 3;
        $mail->isSMTP();
        $mail->SMTPAuth =true;
        $mail->SMTPSecure='tls';  //tls ssl
        $mail->Host = 'mail.bgdbilling.xyz';
        $mail->Port = 587;    // 587 465
        $mail->IsHTML(true);
        $mail->CharSet='UTF-8';
        $mail->Username='info@bgdbilling.xyz';
        $mail->Password='bgd1231#';
        $mail->SetFrom('info@bgdbilling.xyz', 'BGD Billing Software');
        $mail->AddAddress($email,$name);
        $mail->addBCC('ruhul1.bgd@gmail.com'); 
        $mail->Subject = 'Email Verification';
        $mail->Body=$html;
        $mail->SMTPOptions = array(
            'ssl' => [
                'verify_peer' => false,
                'verify_depth' => false,
                'allow_self_signed' => false,
                'verify_peer_name' => false
            ]
        );
        
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $otphide="hide";
            $emailhide="hide";
            $success='<p class="text-center alert-success m-0 p-2" style="border-radius:5px;">please check your email and set new password</p>';
        }  
    }else{
        $checkemail=select("clients","*","vkey ='".$otp."'");
     if (mysqli_num_rows($checkemail) > 0) {
        $vkeyres=mysqli_fetch_assoc($checkemail);
        $vkey=$vkeyres['vkey'];
        $email=$vkeyres['email'];
        $html="<p>please click<a href='https://bgdbilling.xyz/setpass.php?vkey=".$vkey."&&email=".$email."'>here</a> and set new password </p>";
        require 'PHPMailer/PHPMailerAutoload.php';
        //mail send sample code
        $mail = new PHPMailer();
        //$mail->SMTPDebug = 3;
        $mail->isSMTP();
        $mail->SMTPAuth =true;
        $mail->SMTPSecure='tls';  //tls ssl
        $mail->Host = 'mail.bgdbilling.xyz';
        $mail->Port = 587;    // 587 465
        $mail->IsHTML(true);
        $mail->CharSet='UTF-8';
        $mail->Username='info@bgdbilling.xyz';
        $mail->Password='bgd1231#';
        $mail->SetFrom('info@bgdbilling.xyz', 'BGD Billing Software');
        $mail->AddAddress($email,$name);
        $mail->addBCC('ruhul1.bgd@gmail.com'); 
        $mail->Subject = 'Email Verification';
        $mail->Body=$html;
        $mail->SMTPOptions = array(
            'ssl' => [
                'verify_peer' => false,
                'verify_depth' => false,
                'allow_self_signed' => false,
                'verify_peer_name' => false
            ]
        );
        
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $otphide="hide";
            $emailhide="hide";
            $success='<p class="text-center alert-success m-0 p-2" style="border-radius:5px;">please check your email and set new password</p>';
        }
     }else{
         $otphide="";
        $emailhide="hide";
         $wrongemail='<p class="text-center alert-danger m-0 p-2" style="border-radius:5px;">OTP is incorrect</p>';
     }
    
}
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>forget password | BGD Billing </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- custom css -->
    <link href="assets/css/style.css" id="app-style" rel="stylesheet" type="text/css" />
    <style>
        .hide{
            display: none;
        }
    </style>
</head>

<body class="authentication-bg bg-primary">
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="px-2 py-3">
                                    <div class="text-center">
                                        <a href="index.php">
                                            <img src="assets/images/logo-dark.png" height="70" alt="logo">
                                        </a>
                                        <h5 class="text-primary  my-2">Forget Password</h5>
                                    </div>
                                    <form class="form-horizontal" action="forgetpass.php" method="post">
                                        <div>
                                            <?php 
                                            if (isset($wrongemail) && !empty($wrongemail)) {
                                                echo $wrongemail;
                                            }else if (isset($wrongemail) && !empty($wrongemail)) {
                                                echo $wrongemail;
                                            }else if (isset($success) && !empty($success)) {
                                                echo $success;
                                            }
                                            ?>
                                        </div>
                                         <div class="mb-3 <?=$otphide?>">
                                            <label for="email">OTP-Code</label>
                                            <input autocomplete="off" type="number" class="form-control" id="email" name="otp_number" placeholder="Enter Your OTP ">
                                            <?php if (isset($_SESSION['email_error'])) :  ?>
                                                <small class="text-danger"><?= $_SESSION['email_error'] ?></small>
                                            <?php
                                                unset($_SESSION['email_error']);
                                            endif; ?>
                                        </div>
                                        <div class="mb-3 <?=$emailhide?>">
                                            <label for="email">Email</label>
                                            <input autocomplete="off" type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email">
                                            <?php if (isset($_SESSION['email_error'])) :  ?>
                                                <small class="text-danger"><?= $_SESSION['email_error'] ?></small>
                                            <?php
                                                unset($_SESSION['email_error']);
                                            endif; ?>
                                        </div>
                                        
                                        <div>
                                            <button class="btn btn-primary w-100 waves-effect waves-light" name="forget_submit" type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-center text-white">
                            <p>© <script>
                                    document.write(new Date().getFullYear())
                                </script> Developed <i class="mdi mdi-heart text-danger"></i> by BGD Online LTD</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>