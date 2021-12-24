<?php
if (isset($_POST['add_deposit'])) {
    require_once 'inc/functions.inc.php';
    $created_by = $_SESSION['LOGIN_ID'];
    $client_id = get_safe_value($_POST['clientId']);
    $transaction_id = get_safe_value($_POST['transactionId']);
    $campaign_id = get_safe_value($_POST['campaignId']);
    $transaction_date = get_safe_value($_POST['depositDate']);
    $deposit_method = get_safe_value($_POST['depositMethod']);
    $deposit_amount = get_safe_value($_POST['depositAmount']);
    $file_name = '';
    $date = date('Y-m-d h:i:s');
    $_SESSION['old_transaction_date'] = $transaction_date;
    $_SESSION['old_deposit_method'] = $deposit_method;
    $_SESSION['old_campaign_id'] = $campaign_id;
    $_SESSION['old_transaction_id'] = $transaction_id;
    $_SESSION['old_client_id'] = $client_id;
    $_SESSION['old_deposit_amount'] = $deposit_amount;
    if (!empty($campaign_id)) {
        $selectcampaign = select("campaigns", "*", "id='$campaign_id'");
        $data = mysqli_fetch_assoc($selectcampaign);
        $offer_amount = $data['offer_amount'];
        if ($data['percentage'] == "on") {
            $cam_amount = ($offer_amount / 100) * $deposit_amount;
        } elseif ($data['percentage'] == "") {
            $cam_amount = $offer_amount;
        }
        $total_amount = $deposit_amount + $cam_amount;
    } else {
        $total_amount = $deposit_amount;
    }

    if (empty($client_id)) {
        $_SESSION['clientid_error'] = "please enter valid cliend id";
        header("location: add_deposit.php");
    } elseif (empty($transaction_id)) {
        $_SESSION['txid_error'] = "please enter valid transaction id";
        header("location: add_deposit.php");
    } elseif (empty($deposit_method)) {
        $_SESSION['method_error'] = "please enter valid deposit method";
        header("location: add_deposit.php");
    } elseif (empty($deposit_amount)) {
        $_SESSION['deposit_error'] = "please enter deposit amount";
        header("location: add_deposit.php");
    } else{
        if (!empty($_FILES['voucher']['name'])){

            $file_name = date("d_m_Y_h_i_s") . $_FILES['voucher']['name'];
            $file_size = $_FILES['voucher']['size'];
            $convert_mb = $file_size / 1048576;
            $convert_float = round($convert_mb, 2);
            $file_tmp = $_FILES['voucher']['tmp_name'];
            $file_type = $_FILES['voucher']['type'];
            $file_ext = explode('.', $file_name);
            $result = end($file_ext);
    
            $extentions = array("jpeg", "jpg", "png", "JPEG", "PNG", "JPG");
            if (in_array($result, $extentions) === false) {
                $_SESSION['old_name'] = $file_name;
                $_SESSION['ext_error'] = "This file is not allowed . please upload jpg or png image .";
                header("location: add_deposit.php");
            } else {
                if ($file_size > 2097152) {
                    $_SESSION['old_name'] = $_FILES['voucher']['name'];
                    $_SESSION['size_error'] = "Your file size is " . $convert_float . " MB . please upload file size mustbe 2MB or lower .";
                    header("location: add_deposit.php");
                } else {
                    move_uploaded_file($file_tmp, "assets/images/upload/deposit_voucher/" . $file_name);
                }
            }
        }
     
        $field_names = "client_id,transaction_id,deposit_method,deposit_amount,deposit_voucher,deposit_date,campaign_id,campaign_amount,total_amount,created_at,created_by";
        $values = "'$client_id','$transaction_id','$deposit_method','$deposit_amount','$file_name','$transaction_date','$campaign_id','$cam_amount','$total_amount','$date','$created_by'";
        $result = insert('test', $field_names, $values);
        if ($result) {
            $checkbal=mysqli_fetch_assoc(select("clients","*","id=".$client_id));
            $old_balance=$checkbal['balance'];
            $new_blance=$old_balance + $total_amount;
            $update_balance=update("clients","balance='".$new_blance."'","id=".$client_id);
            $_SESSION['success'] = "Deposit Add Successfull";
            header("location: balance_deposit.php");
        } else {
            $_SESSION['error'] = "Deposit Add Failed";
            header("location: balance_deposit.php");
        }
    }
}