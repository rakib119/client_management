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
    $client_id = get_safe_value($_SESSION["LOGIN_ID"]);
    //  campaignId
    $checkbal=mysqli_fetch_assoc(select("clients","*","id=".$client_id));
    $old_balance=$checkbal['balance'];
            
    if($old_balance >=$selling_price){
    if ($_POST['campaign_id']) {
        $campaign_id = get_safe_value($_POST['campaign_id']);
    } else {
        $campaign_id = "";
    }
    if ($flag == 0) {
        $created_at = date("Y-m-d H:i:s");
        $created_by = $_SESSION["LOGIN_ID"];
        $column_name = "sub_cat_id,cat_id,service_id,client_id,campaign_id,service_amount,discount_amount,selling_price,created_at,created_by,role,status";
        $values = "$subcatid,$catid,'$service_id','$client_id','$campaign_id','$service_amount','$discount_amount','$selling_price','$created_at','$created_by',0,0";
        if (insert("test", $column_name, $values)) {
            $new_blance=$old_balance - $selling_price;
            $update_balance=update("clients","balance='".$new_blance."'","id=".$client_id);
            $_SESSION['success'] = "Your Purchased Now Pending";
            header('location: index.php');
        }else {
         $_SESSION['error'] = "Services purchased Faield";
        header("location: buy_now.php?id=$service_id&task=purchase");
    }
        
    } else {
        header("location: buy_now.php?id=$service_id&task=purchase");
    }
    }else{
        $_SESSION['error']="Not enough Balance";
        header("location: buy_now.php?id=$service_id&task=purchase");
    }
}
