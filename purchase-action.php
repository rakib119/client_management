<?php
require_once "inc/functions.inc.php";
if (isset($_POST['submit_service'])) {
    $flag = 0;
    $cat_id = get_safe_value($_POST['cat_id']);
    $sub_cat_id = get_safe_value($_POST['sub_cat_id']);
    $service_id = get_safe_value($_POST['service_id']);
    $client_id = get_safe_value($_POST['client_id']);
    $campaign_id = get_safe_value($_POST['campaign_id']);
    $service_amount = get_safe_value($_POST['service_amount']);
    $selling_price = get_safe_value($_POST['selling_price']);
    
    $checkbal=mysqli_fetch_assoc(select("clients","*","id=".$client_id));
    $old_balance=$checkbal['balance'];
            
    if($old_balance >= $selling_price){
    //  cat_id
    if (!$_POST['cat_id']) {
        $_SESSION['cat_id_error'] = "Please select a category";
        $flag = 1;
    }
    //  sub_cat_id
    if (!$_POST['sub_cat_id']) {
        $_SESSION['sub_cat_id_error'] = "Please select a sub category";
        $flag = 1;
    }
    //  service_id
    if (!$_POST['service_id']) {
        $_SESSION['service_id_error'] = "Please select a Service";
        $flag = 1;
    }

    //  client_id
    if (!$_POST['client_id']) {
        $_SESSION['client_id_error'] = "Please select a Client";
        $flag = 1;
    }
    //  selling_price
    if (!$_POST['service_amount']) {
        $_SESSION['service_amount_error'] = "service amount Error";
        $flag = 1;
    }
    //  service_amount
    if (!$_POST['service_amount']) {
        $_SESSION['service_amount_error'] = "Price Error";
        $flag = 1;
    }

    if ($flag == 0) {
        $discount_amount = $service_amount - $selling_price;
        $created_at = date("Y-m-d H:i:s");
        $created_by = $_SESSION["LOGIN_ID"];
        $column_name = "cat_id,sub_cat_id,service_id,client_id,campaign_id,service_amount,selling_price,discount_amount,created_at,created_by";
        $values = "'$cat_id','$sub_cat_id','$service_id','$client_id','$campaign_id','$service_amount','$selling_price','$discount_amount','$created_at','$created_by'";
        if (insert("test", $column_name, $values)) {
            $new_blance=$old_balance - $selling_price;
            $update_balance=update("clients","balance='".$new_blance."'","id=".$client_id);
            $_SESSION['success'] = "Services purchased successfully";
            header('location: purchase.php');
        }
    } else {
        header("location: buy-service.php");
    }
}else{
    $_SESSION['error'] = "Not Enough Balance";
    header("location: buy-service.php");
}
}


// edit Purchase
if (isset($_POST['edit_purchase'])) {
 
    $flag = 0;
    $id = get_safe_value($_POST['id']);
    $cat_id = get_safe_value($_POST['cat_id']);
    $sub_cat_id = get_safe_value($_POST['sub_cat_id']);
    $service_id = get_safe_value($_POST['service_id']);
    $client_id = get_safe_value($_POST['client_id']);
    $campaign_id = get_safe_value($_POST['campaign_id']);
    $service_amount = get_safe_value($_POST['service_amount']);
    $selling_price = get_safe_value($_POST['selling_price']);
    
    $checkbal=mysqli_fetch_assoc(select("clients","*","id=".$client_id));
    $old_balance=$checkbal['balance'];
    
    $selecttest=mysqli_fetch_assoc(select("test","*","id=".$id));
    $old_sid=$selecttest['service_id'];
    $old_client_id=$selecttest['client_id'];
    $old_selling_price=$selecttest['selling_price'];
    
    $select_old_pclient=mysqli_fetch_assoc(select("clients","*","id=".$old_client_id));
    $old_pabalance=$select_old_pclient['balance'];
   
    //  cat_id
    if (!$_POST['cat_id']) {
        $_SESSION['cat_id_error'] = "Please select a category";
        $flag = 1;
    }
    //  sub_cat_id
    if (!$_POST['sub_cat_id']) {
        $_SESSION['sub_cat_id_error'] = "Please select a sub category";
        $flag = 1;
    }
    //  service_id
    if (!$_POST['service_id']) {
        $_SESSION['service_id_error'] = "Please select a Service";
        $flag = 1;
    }

    //  client_id
    if (!$_POST['client_id']) {
        $_SESSION['client_id_error'] = "Please select a Client";
        $flag = 1;
    }
    //  selling_price
    if (!$_POST['service_amount']) {
        $_SESSION['service_amount_error'] = "service amount Error";
        $flag = 1;
    }
    //  service_amount
    if (!$_POST['service_amount']) {
        $_SESSION['service_amount_error'] = "Price Error";
        $flag = 1;
    }
  if($old_client_id !== $client_id){
    if($old_balance >= $selling_price){
                $yes='';
    }else{
        $_SESSION['error'] = "Not Enough Balance";
        header("location: edit_purchase.php?id=$id&task=update");
        die();
    }
}else{
        if($service_id !== $old_sid){
        if($old_selling_price > $selling_price){
            $udeposit_amount= $old_selling_price - $selling_price;
        }else if($old_selling_price < $selling_price){
            $ucredit_amount= $selling_price - $old_selling_price;
            if($old_balance >= $ucredit_amount){
                $yes='';
            }else{
            $_SESSION['error'] = "Not Enough Balance";
            header("location: edit_purchase.php?id=$id&task=update");
            die();
            }
        }
    }
    }
    if ($flag == 0) {
        $discount_amount = $service_amount - $selling_price;
        $updated_at = date("Y-m-d H:i:s");
        $updated_by = $_SESSION["LOGIN_ID"];
        $column_name = "cat_id,sub_cat_id,service_id,client_id,campaign_id,service_amount,selling_price,discount_amount,created_at,created_by";
        $values = "cat_id='$cat_id',sub_cat_id='$sub_cat_id',service_id='$service_id',client_id='$client_id',campaign_id='$campaign_id',service_amount='$service_amount',selling_price='$selling_price',discount_amount='$discount_amount',updated_at='$updated_at',updated_by='$updated_by'";
        if (update("test", $values, "id='$id'")) {
         if($old_client_id !== $client_id){
    	       $new_up_balance= $select_old_pclient['balance'] + $selling_price;
    	       $update=update("clients","balance='".$new_up_balance."'","id=".$old_client_id);
    	       
    	       $new_up_balance= $old_balance - $selling_price;
    	       $update=update("clients","balance='".$new_up_balance."'","id=".$client_id); 
            }
        if($service_id !== $old_sid){
        if($old_selling_price > $selling_price){
            $newbal=$old_balance + $udeposit_amount;
            $updatebal=update("clients","balance='".$newbal."'","id=".$client_id);
        }else if($old_selling_price < $selling_price){
            $newbal=$old_balance - $ucredit_amount;
            $updatebal=update("clients","balance='".$newbal."'","id=".$client_id);
        }
    }
            
            $_SESSION['success'] = "Purchased successfully updated";
            header('location: purchase.php');
        }
    } else {
        header("location: edit_purchase.php?id=$id&task=update");
    }
}
