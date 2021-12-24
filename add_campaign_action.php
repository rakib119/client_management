<?php
if (isset($_POST['add_campaign'])){
    require_once 'inc/functions.inc.php';
    $created_by=$_SESSION['LOGIN_ID'];
    $campaignName=get_safe_value($_POST['campaignName']);
    $campaignCatagorys=get_safe_value($_POST['campaignCatagorys']);
    $offerAmount=get_safe_value($_POST['offerAmount']);
    $startDate=get_safe_value($_POST['startDate']);
    $endDate=get_safe_value($_POST['endDate']);
    if (isset($_POST['checkbtn'])) {
        $checkbtn=get_safe_value($_POST['checkbtn']);
    }else{
        $checkbtn="";
    }
    $file_name='';
    $date=date('Y-m-d h:i:s');
    $_SESSION['old_campaignName']=$campaignName;
    $_SESSION['old_campaignCatagorys']=$campaignCatagorys;
    $_SESSION['old_offerAmount']=$offerAmount;
    $_SESSION['old_startDate']=$startDate;
    $_SESSION['old_endDate']=$endDate;

    if (empty($campaignName)) {
        $_SESSION['campaignName_error'] = "please enter Campaign Name";
        header("location: add_campaign.php");
    }elseif (empty($campaignCatagorys)) {
        $_SESSION['campaignCatagorys_error'] = "please enter campaign catagorys";
        header("location: add_campaign.php");
    }elseif (empty($offerAmount)) {
        $_SESSION['campaignid_error'] = "please enter campaign amount offer";
        header("location: add_campaign.php");
    }elseif (empty($startDate)) {
        $_SESSION['method_error'] = "please enter campaign satrt date";
        header("location: add_campaign.php");
    }elseif (empty($endDate)) {
        $_SESSION['date_error'] = "please enter campaign end date";
        header("location: add_campaign.php");
    }else{
        
    if (!empty($_FILES['offerImage'] ['name'])) {

            $file_name=date("d_m_Y_h_i_s") . $_FILES['offerImage'] ['name'];
            $file_size= $_FILES['offerImage'] ['size'];
            $convert_mb= $file_size / 1048576 ;
            $convert_float= round($convert_mb , 2);
            $file_tmp= $_FILES['offerImage'] ['tmp_name'];
            $file_type= $_FILES['offerImage'] ['type'];
            $file_ext=explode('.' , $file_name);
            $result=end($file_ext);

            $extentions= array("jpeg","jpg","png" ,"JPEG","PNG","JPG");
            if (in_array($result , $extentions) === false) {
                $_SESSION['old_image']=$file_name;
                $_SESSION['ext_error'] = "This file is not allowed . please upload jpg or png image .";
                header("location: add_deposit.php");
            }else{
                if ($file_size > 2097152 ) {
                $_SESSION['old_image']=$file_name;
                $_SESSION['size_error'] = "Your file size is ". $convert_float ." MB . please upload file size mustbe 2MB or lower .";
                header("location: add_deposit.php");
                }else{
                move_uploaded_file($file_tmp, "assets/images/upload/campaign/".$file_name);
                }

            }
       }
  
    	$field_names="name,campain_category,offer_amount,starting_date,ending_date,image,created_at,created_by,percentage";
    	$values="'$campaignName','$campaignCatagorys','$offerAmount','$startDate','$endDate','$file_name','$date','$created_by','$checkbtn' ";
    	$result=insert('campaigns',$field_names,$values);
    	if ($result) {
        $_SESSION['success'] = "Campaign Add Successfull";
        header("location: campaign.php");
    	}else{
    		$_SESSION['error'] = "Campaign Add Failed";
            header("location: campaign.php");
    	}
    
    
  }
    
}
?>