<?php 
require_once 'inc/functions.inc.php';

if (isset($_GET['id_no'])) {
    $getid= get_safe_value($_GET['id_no']); 
    $condition="id = $getid ";
    $value="status =0 ";
    $update=update('clients',$value,$condition);
    if ($update) {
        $_SESSION['success'] ="Clients Deactive Success";
        header("location: all_client.php");
    }else{
        $_SESSION['error'] ="Clients Deactive Faield";
        header("location: all_client.php");
    }
    }  
?>