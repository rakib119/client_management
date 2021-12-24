<?php 
require_once 'inc/functions.inc.php';

if (isset($_GET['id_no'])) {
    $getid= get_safe_value($_GET['id_no']); 
    $condition="id = $getid ";
    $checkpurchase=select("test","*","id=".$getid);
    if(mysqli_num_rows($checkpurchase) > 0){
      $fetch=mysqli_fetch_assoc($checkpurchase);
      $client_id=$fetch['client_id'];
      $amount=$fetch['selling_price'];
      $check_client=mysqli_fetch_assoc(select("clients","*","id=".$client_id));
      $old_balance=$check_client['balance'];
      $new_balance= $old_balance + $amount;
    $update=delete('test',$condition);
    if ($update) {
        $updatebal=update("clients","balance='".$new_balance."'","id=".$client_id);
        $_SESSION['success'] ="Purchase Delete Success";
        header("location: pending_purchase.php");
    }else{
        $_SESSION['error'] ="Purchase Delete Faield";
        header("location: pending_purchase.php");
    }
    }
    }  
?>