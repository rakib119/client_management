<?php
if (isset($_POST['add_deposit'])){
    require_once 'inc/functions.inc.php';
   $getid=get_safe_value($_POST['id']);
    $updated_by=$_SESSION['LOGIN_ID'];
    $client_id=get_safe_value($_POST['clientId']);
    $transaction_id=get_safe_value($_POST['transactionId']);
    $campaign_id=get_safe_value($_POST['campaignId']);
    $transaction_date=get_safe_value($_POST['depositDate']);
    $deposit_method=get_safe_value($_POST['depositMethod']);
    $deposit_amount=get_safe_value($_POST['depositAmount']);
    $file_name='';

    $date=date('Y-m-d h:i:s');
    
    if(!empty($campaign_id)) {
        $selectcampaign=select("campaigns","*","id='$campaign_id'");
            $data=mysqli_fetch_assoc($selectcampaign);
            $offer_amount=$data['offer_amount'];
            if ($data['percentage'] == "on") {
                $cam_amount=($offer_amount / 100) * $deposit_amount ;
            }elseif ($data['percentage'] == "") {
                $cam_amount= $offer_amount;
            }
               $total_amount= $deposit_amount + $cam_amount;
            }else{
                $total_amount=$deposit_amount;
            } 
    $checkoldinfo=mysqli_fetch_assoc(select("test","*","id=".$getid));
    $old_client_id=$checkoldinfo['client_id'];
    $old_total_amount=$checkoldinfo['total_amount'];
    
    
    $checkoldclient=mysqli_fetch_assoc(select("clients","*","id=".$old_client_id));
    $old_balance=$checkoldclient['balance'];
    
    if($old_total_amount > $total_amount ){
       $creaditbal= $old_total_amount - $total_amount;
       if($old_balance >= $creaditbal){
         $yes='';  
       }else{
          $_SESSION['error'] = "Not Enough Balance in Old client wallet";
          header("location: edit_deposit.php?id_no=$getid"); 
          die();
       }
    }else if($old_total_amount < $total_amount){
        $debitbal=$total_amount - $old_total_amount ;
    }
   
    if (empty($client_id)) {
        $_SESSION['clientid_error'] = "please enter valid cliend id";
        header("location: edit_deposit.php?id_no=$getid");
    }elseif (empty($transaction_id)) {
        $_SESSION['txid_error'] = "please enter valid transaction id";
        header("location: edit_deposit.php?id_no=$getid");
    }elseif (empty($deposit_method)) {
        $_SESSION['method_error'] = "please enter valid deposit method";
        header("location: edit_deposit.php?id_no=$getid");
    }elseif (empty($deposit_amount)) {
        $_SESSION['deposit_error'] = "please enter deposit amount";
        header("location: edit_deposit.php?id_no=$getid");
    }elseif (!empty($_FILES['voucher'] ['name'])) {

            $file_name=date("d_m_Y_h_i_s") . $_FILES['voucher'] ['name'];
            $file_size= $_FILES['voucher'] ['size'];
            $convert_mb= $file_size / 1048576 ;
            $convert_float= round($convert_mb , 2);
            $file_tmp= $_FILES['voucher'] ['tmp_name'];
            $file_type= $_FILES['voucher'] ['type'];
            $file_ext=explode('.' , $file_name);
            $result=end($file_ext);

            $extentions= array("jpeg","jpg","png" ,"JPEG","PNG","JPG");
            if (in_array($result , $extentions) === false) {
                $_SESSION['error'] = "This file is not allowed . please upload jpg or png image .";
                header("location: edit_deposit.php?id_no=$getid");
            }else{
                if ($file_size > 2097152 ) {
                $_SESSION['error'] = "Your file size is ". $convert_float ." MB . please upload file size mustbe 2MB or lower .";
                header("location: edit_deposit.php?id_no=$getid");
                }else{
                $condition1="id = $getid";
                $selectdata=select("test","*",$condition1);
                $singlegetdata=mysqli_fetch_assoc($selectdata);
                if (!empty($singlegetdata['deposit_voucher'])) {
                    $path="assets/images/upload/deposit_voucher/".$singlegetdata['deposit_voucher'];
                    unlink($path);
                }
                move_uploaded_file($file_tmp, "assets/images/upload/deposit_voucher/".$file_name);
                $condition="id= $getid";
    	        $values="client_id='$client_id',transaction_id='$transaction_id',deposit_method='$deposit_method',deposit_voucher='$file_name',deposit_amount='$deposit_amount',deposit_date='$transaction_date',campaign_id='$campaign_id',campaign_amount='$cam_amount',total_amount='$total_amount',updated_at='$date',updated_by='$updated_by'";
    	        $result=update('test',$values,$condition);
    	        if ($result) {
    	       if($old_client_id !== $client_id){
    	       $new_up_balance= $old_balance - $total_amount;
    	       $update=update("clients","balance='".$new_up_balance."'","id=".$old_client_id);
    	       
    	        $checknewclient=mysqli_fetch_assoc(select("clients","*","id=".$client_id));
                $old_balance_newc=$checknewclient['balance'];
    	       
    	       $new_up_balance= $old_balance_newc + $total_amount;
    	       $update=update("clients","balance='".$new_up_balance."'","id=".$client_id); 
            }
            
            if($old_total_amount > $total_amount){
                $new_up_balance= $old_balance - $creaditbal;
    	        $update=update("clients","balance='".$new_up_balance."'","id=".$client_id);
            }else if($old_total_amount < $total_amount){
                $new_up_balance= $old_balance + $debitbal;
    	        $update=update("clients","balance='".$new_up_balance."'","id=".$client_id); 
            }
                $_SESSION['success'] = "Deposit Update Successfull";
                header("location: balance_deposit.php");
    	        }else{
    		    $_SESSION['error'] = "Deposit Update Failed";
                header("location: edit_deposit.php?id_no=$getid");
    	            }
                }

            }
    }else{
        $condition="id= $getid";
    	$values="client_id='$client_id',transaction_id='$transaction_id',deposit_method='$deposit_method',deposit_amount='$deposit_amount',deposit_date='$transaction_date',campaign_id='$campaign_id',campaign_amount='$cam_amount',total_amount='$total_amount',updated_at='$date',updated_by='$updated_by'";
    	$result=update('test',$values,$condition);
    	if ($result) {
    	    if($old_client_id !== $client_id){
    	       $new_up_balance= $old_balance - $total_amount;
    	       $update=update("clients","balance='".$new_up_balance."'","id=".$old_client_id);
    	       
    	        $checknewclient=mysqli_fetch_assoc(select("clients","*","id=".$client_id));
                $old_balance_newc=$checknewclient['balance'];
    	       
    	       $new_up_balance= $old_balance_newc + $total_amount;
    	       $update=update("clients","balance='".$new_up_balance."'","id=".$client_id); 
            }
            
            if($old_total_amount > $total_amount){
                $new_up_balance= $old_balance - $creaditbal;
    	        $update=update("clients","balance='".$new_up_balance."'","id=".$client_id);
            }else if($old_total_amount < $total_amount){
                $new_up_balance= $old_balance + $debitbal;
    	        $update=update("clients","balance='".$new_up_balance."'","id=".$client_id); 
            }
        $_SESSION['success'] = "Deposit Update Successfull";
        header("location: balance_deposit.php");
    	}else{
    		$_SESSION['error'] = "Deposit Update Failed";
            header("location: edit_deposit.php?id_no=$getid");
    	}
    
  }
    
}
?>