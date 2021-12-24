<?php 
if (isset($_POST['setpassbtn'])) {
    require_once 'inc/functions.inc.php';
    
    $vkey=get_safe_value($_POST['vkey']);
    $email=get_safe_value($_POST['email']);
    $newpass=password_format($_POST['newpass']);
    $cpass=password_format($_POST['cpass']);
    $condition="vkey='$vkey' AND email='$email' ";
    if (empty($newpass)) {
        $_SESSION['error']="Please Enter Password";
        header("location: setpassword.php");
    }else if (empty($cpass)) {
        $_SESSION['error']="confrim Password not Matched";
        header("location: setpassword.php");
    }else if ($newpass !== $cpass) {
        $_SESSION['error']="confrim Password not Matched";
        header("location: setpassword.php");
    }else{
        $check=select("users","*",$condition);
        if (mysqli_num_rows($check) > 0) {
            $update=update("users","password='$newpass'","vkey='".$vkey."' AND email='".$email."'");
            if ($update) {
                $_SESSION['success']="Password Set successful <br> Please Login Your Account";
                header("location: setpassword.php");
            }else{
                $_SESSION['error']="Password Set Faield";
                header("location: setpassword.php");
            }
        }else{
            $check=select("clients","*",$condition);
            if (mysqli_num_rows($check) > 0) {
                $update=update("clients","password='$newpass'","vkey='".$vkey."' AND email='".$email."'");
                if ($update) {
                $_SESSION['success']="Password Set successful <br> Please Login Your Account";
                header("location: setpassword.php");
                }else{
                $_SESSION['error']="Password Set Faield";
                header("location: setpassword.php");
                }
            }
        }
        
    }
}
?>