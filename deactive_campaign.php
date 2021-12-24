<?php 
require_once 'inc/functions.inc.php';

if (isset($_GET['id_no'])) {
    $getid= get_safe_value($_GET['id_no']); 
    $condition="id = $getid ";
    $value="status = 0 ";
    $update=update('campaigns',$value,$condition);
    if ($update) {
        $_SESSION['success'] ="Campaign Deactive Successfull";
        header("location: campaign.php");
    }else{
        $_SESSION['error'] ="Campaign Deactive Faield";
        header("location: campaign.php");
    }
    }  
?>