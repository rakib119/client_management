<?php
if (isset($_POST['edit_client'])){
    require_once 'inc/functions.inc.php';
    $getid=get_safe_value($_POST['id']);
    $updated_by=$_SESSION['LOGIN_ID'];
    $name=name_format($_POST['name']);
    $mobile=get_safe_value($_POST['mobile']);
    $designation=get_safe_value($_POST['designation']);
    $company_name=name_format($_POST['cname']);
    $company_email=email_format($_POST['cemail']);
    $company_mobile=get_safe_value($_POST['cmobile']);
    $company_address=message_format($_POST['caddress']);
    $date=date('Y-m-d h:i:s');
    $file_name=get_safe_value($_POST['old_img']);
    if (empty($name)) {
    	$_SESSION['error']='please enter valid name';
    	header('location: edit_client.php?id_no='.$getid);
    }elseif (empty($mobile)) {
        $_SESSION['error']='please enter valid mobile number';
    	header('location: edit_client.php?id_no='.$getid);
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
               	header('location: edit_client.php?id_no='.$getid);
            }else{
                if ($file_size > 2097152 ) {
                $_SESSION['size_error'] = "Your file size is ". $convert_float ." MB . please upload file size mustbe 2MB or lower .";
                header('location: edit_client.php?id_no='.$getid);
                }else{
                $condition1="id = $getid";
                $selectdata=select("test","*",$condition1);
                $singlegetdata=mysqli_fetch_assoc($selectdata);
                if ($singlegetdata['client_img'] !== 'set_profile.jpeg') {
                    $path="assets/images/upload/".$singlegetdata['client_img'];
                    unlink($path);
                }
                move_uploaded_file($file_tmp, "assets/images/upload/".$file_name);  
                }

            }
    }
    
    	$condition="id = $getid ";
    	$values="client_img='$file_name',name='$name',mobail='$mobile',designation='$designation',company_name='$company_name',company_email='$company_email',company_contact='$company_mobile',company_address='$company_address',updated_at='$date',updated_by='updated_by' ";
    	$result=Update('clients',$values,$condition);
    	if ($result) {
            $_SESSION['success'] ="Client Info Update Successfull";
        echo '<script>window.location.href="all_client.php";</script>';
    	}else{
            $_SESSION['error'] ="Client Info Update Faield";
          	header('location: edit_client.php?id_no='.$getid);
    	}
    
  }
    
}
?>