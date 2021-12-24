<?php
if (isset($_POST['add_client'])){

    require_once 'inc/functions.inc.php';
    $created_by=$_SESSION['LOGIN_ID'];
    $name=name_format($_POST['name']);
    $email=email_format($_POST['email']);
    $mobile=get_safe_value($_POST['mobile']);
    $designation=get_safe_value($_POST['designation']);
    $pass=password_format($_POST['pass']);
    $cpass=password_format($_POST['cpass']);
    $cname=name_format($_POST['cname']);
    $cemail=email_format($_POST['cemail']);
    $cmobile=get_safe_value($_POST['cmobile']);
    $caddress=message_format($_POST['caddress']);
    $client_id=rand(111,99999);
    $date=date('Y-m-d h:i:s');
    $file_name='set_profile.jpeg';
     $qslforcheckid=select('clients','clientid',$client_id);
        if (mysqli_num_rows($qslforcheckid) > 0) {
        	$client_id= $client_id + 2;
        }

    if (empty($name)) {
    	$_SESSION['error']="please enter valid name";
    	header("location: add_client.php");
    }elseif (empty($email)) {
    	$_SESSION['error']="please enter valid email";
    	header("location: add_client.php");
    }elseif (empty($mobile)) {
    	$_SESSION['error']="please enter valid mobile number";
    	header("location: add_client.php");
    }elseif (empty($pass)) {
    	$_SESSION['error']="please enter valid password";
    	header("location: add_client.php");
    }elseif ($pass !== $cpass) {
    	$_SESSION['error']="confrim password dose not matched";
    	header("location: add_client.php");
    }else{
    	$check_condition="email= '$email' ";
        $qslforcheckuser=select('clients','email',$check_condition);
        if (mysqli_num_rows($qslforcheckuser) > 0) {
        $_SESSION['error']="This Email Already Exists";
    	header("location: add_client.php");
        }else{
            
            if (!empty($_FILES['image'] ['name'])) {

            $file_name=date("d_m_Y_h_i_s") . $_FILES['image'] ['name'];
            $file_size= $_FILES['image'] ['size'];
            $convert_mb= $file_size / 1048576 ;
            $convert_float= round($convert_mb , 2);
            $file_tmp= $_FILES['image'] ['tmp_name'];
            $file_type= $_FILES['image'] ['type'];
            $file_ext=explode('.' , $file_name);
            $result=end($file_ext);

            $extentions= array("jpeg","jpg","png" ,"JPEG","PNG","JPG");
            if (in_array($result , $extentions) === false) {
                $_SESSION['error'] = "This file is not allowed . please upload jpg or png image .";
            	header("location: add_client.php");
            }else{
                if ($file_size > 2097152 ) {
                $_SESSION['error'] = "Your file size is ". $convert_float ." MB . please upload file size mustbe 2MB or lower .";
    	        header("location: add_client.php");
                }else{
                move_uploaded_file($file_tmp, "assets/images/upload/".$file_name);  
                }

            }
    }
    	$field_names="client_img,clientid,name,email,mobail,password,designation,company_name,company_email,company_contact,company_address,created_at,created_by,status";
    	$values=" '$file_name','$client_id','$name','$email','$mobile','$pass','$designation','$company_name','$company_email','$company_mobile','$company_address','$date','$created_by',1";
    	$result=insert('clients',$field_names,$values);
    	if ($result) {
            $_SESSION['success'] ='New Client Add Successfull';
            echo "<script>window.location.href='all_client.php';</script>";
    	}else{
    		$_SESSION['success'] ='New Client Add Faield';
            echo "<script>window.location.href='all_client.php';</script>";
    	}
    }
  }
    
}
?>
