<?php 
require_once 'inc/functions.inc.php';

if (isset($_GET['id_no'])) {
    $getid= get_safe_value($_GET['id_no']); 
    $condition="id = $getid ";
    $value="status =1 ";
    $update=update('test',$value,$condition);
    if ($update) {
        $_SESSION['success'] ="Purchase Approve Success";
        header("location: pending_purchase.php");
    }else{
        $_SESSION['error'] ="Purchase Approve Faield";
        header("location: pending_purchase.php");
    }
    }  
?>