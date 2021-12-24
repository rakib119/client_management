<?php
require_once "inc/functions.inc.php";
if (isset($_POST['purchase_service'])) {
    $flag = 0;
    $catid = get_safe_value($_POST['catid']);
    $subcatid = get_safe_value($_POST['subcatid']);
    $service_id = get_safe_value($_POST['service_id']);
    $service_amount = get_safe_value($_POST['service_amount']);
    $selling_price = get_safe_value($_POST['final_price']);
    $discount_amount = $service_amount - $selling_price;
    
    //  client_id
    if (!$_POST['client_id']) {
        $_SESSION['client_id_error'] = "Please select a client";
        $flag = 1;
    } else {
        $client_id = get_safe_value($_POST['client_id']);
    }
    //  campaignId
    if ($_POST['campaign_id']) {
        $campaign_id = get_safe_value($_POST['campaign_id']);
    } else {
        $campaign_id = "";
    }
    if ($flag == 0) {
        
    $checkbal=mysqli_fetch_assoc(select("clients","*","id=".$client_id));
    $old_balance=$checkbal['balance'];
            
    if($old_balance >= $selling_price){
        
        $created_at = date("Y-m-d H:i:s");
        $created_by = $_SESSION["LOGIN_ID"];
        $image = $new_file_name;
        $column_name = "sub_cat_id,cat_id,service_id,client_id,campaign_id,service_amount,discount_amount,selling_price,created_at,created_by";
        $values = "$subcatid,$catid,'$service_id','$client_id','$campaign_id','$service_amount','$discount_amount','$selling_price','$created_at','$created_by'";
        if (insert("test", $column_name, $values)) {
            $new_blance=$old_balance - $selling_price;
            $update_balance=update("clients","balance='".$new_blance."'","id=".$client_id);
            $_SESSION['success'] = "Services purchased successfully";
            header('location: purchase.php');
        }
        
    }else{
    $_SESSION['error'] = "Not Enough Balance";
    header("location: purchase_now.php?id=".$service_id."&&task=purchase");
}
        
    } else {
        header("location: purchase_now.php?id=".$service_id."&&task=purchase");
    }
    

}
