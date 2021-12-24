<?php 
require_once 'inc/functions.inc.php';

if (isset($_GET['id_no'])) {
    $getid= get_safe_value($_GET['id_no']); 
    $condition="id = $getid ";
    $value="status = 1 ";
    $update=update('campaigns',$value,$condition);
    if ($update) {
        $_SESSION['success'] ="Campaign Active Successfull";
        header("location: campaign.php");
    }else{
        $_SESSION['error'] ="Campaign Active Faield";
        header("location: campaign.php");
    }
    }  
?>